<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Google\Client; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    /**
     * Tentukan kemampuan (abilities) default berdasarkan role pengguna.
     */
    protected function getAbilities(string $role): array
    {
        if ($role === 'parent') {
            return ['read:own', 'create:child'];
        } elseif ($role === 'personal') {
            return ['read:own', 'create:log'];
        }
        return ['read:public'];
    }

    /**
     * Menangani login menggunakan ID Token Google.
     * Endpoint: POST /api/social-login/google
     */
    public function googleLogin(Request $request)
    {
        // 1. Validasi ID Token
        $validator = Validator::make($request->all(), [
            'id_token' => 'required|string', // Token ID Google dari client
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Token ID Google wajib ada.'], 422);
        }

        try {
            // 2. Verifikasi Token dengan Google Server
            $client = new Client(['client_id' => env('GOOGLE_CLIENT_ID')]); // Gunakan GOOGLE_CLIENT_ID
            $payload = $client->verifyIdToken($request->id_token);

            if (!$payload) {
                return response()->json(['success' => false, 'message' => 'Token ID Google tidak valid.'], 401);
            }

            $email = $payload['email'];
            $googleId = $payload['sub'];
            $name = $payload['name'];
            $roleDefault = 'personal'; // Tetapkan role default untuk yang login mandiri

            // 3. Cari atau Buat User di Database Lokal
            $user = User::where('email', $email)->first();

            if (!$user) {
                // User Baru: Buat akun baru dengan role default
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make(Str::random(32)), // Password hash random
                    'role' => $roleDefault,
                    'google_id' => $googleId,
                    'email_verified_at' => now(), // Verifikasi dianggap berhasil oleh Google
                ]);
            } else {
                 // User Lama: Update google_id jika belum terisi
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleId]);
                }
            }

            // 4. Buat Token API Sanctum dengan Abilities yang Sesuai
            $abilities = $this->getAbilities($user->role);
            $token = $user->createToken('google-session', $abilities);

            return response()->json([
                'success' => true,
                'message' => 'Login Google berhasil.',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->role,
                    'abilities' => $abilities
                ],
                'token' => $token->plainTextToken
            ], 200);

        } catch (Exception $e) {
            Log::error("Google Login Error: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Kesalahan server saat otentikasi.'], 500);
        }
    }
}
