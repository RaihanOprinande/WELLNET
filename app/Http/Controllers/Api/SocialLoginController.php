<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Google\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

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


    public function googleredirect(){
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin(Request $request)
{
    try {
        // WAJIB: Menggunakan stateless() sesuai dokumentasi
        /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
        $socialUser = Socialite::driver('google')->stateless()->user();
    } catch (Exception $e) {
        Log::error("Socialite Callback Failed: " . $e->getMessage());
        // Jika gagal otentikasi, redirect ke Deep Link error aplikasi mobile
        // return redirect()->away("wellnet://auth-failure?message=Otentikasi%20dibatalkan");
    return response()->json([
        'status' => false,
        'message' => 'Otentikasi gagal'.$e->getMessage(),
        // 'data' => [
        //     'token' => $token,
        //     'user_id' => $user->id,
        // ]
    ]);

    }

    // --- 1. Cari atau Buat User ---
    $user = User::where('google_id', $socialUser->getId())
                    ->orWhere('email', $socialUser->getEmail())
                    ->first();

    $roleDefault = 'parent';

    if (!$user) {
        $user = User::create([
            'username' => $socialUser->getName() ?? 'User Baru', // Pastikan field ini ada
            'email' => $socialUser->getEmail(),
            'password' => Hash::make(Str::random(32)),
            'role' => $roleDefault,
            'google_id' => $socialUser->getId(),
            'email_verified_at' => now(),
        ]);
    }

    // --- 2. Buat Token Sanctum ---
    // (Asumsi $this->getAbilities() didefinisikan)
    $abilities = $this->getAbilities($user->role);
    $token = $user->createToken('social-session', $abilities)->plainTextToken;

    // --- 3. Redirect Akhir ke Deep Link Aplikasi Mobile ---
    // Menggunakan redirect()->away() adalah benar untuk URL eksternal/schemes kustom
    // return redirect()->away("wellnet://auth-success?token={$token}&user_id={$user->id}");
    return response()->json([
        'status' => true,
        'message' => 'Otentikasi berhasil',
        'data' => [
            'token' => $token,
            'user_id' => $user->id,
        ]
    ]);
}
}
