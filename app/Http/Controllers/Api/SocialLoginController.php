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
            // Ambil user dari Socialite (stateless)
            $socialUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Jika otentikasi gagal (e.g., user membatalkan), redirect ke Deep Link error
            return redirect('admin/dashboard');
        }

        // --- 1. Cari atau Buat User ---
        $user = User::where('google_id', $socialUser->getId())
                    ->orWhere('email', $socialUser->getEmail())
                    ->first();

        $roleDefault = 'parent'; // Role default untuk yang login sosial

        if (!$user) {
            // Registrasi User Baru
            $user = User::create([
                'username' => $socialUser->getName() ?? 'User Baru',
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(32)),
                'role' => $roleDefault,
                'google_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]);
        }

        // --- 2. Buat Token Sanctum ---
        $abilities = $this->getAbilities($user->role);
        $token = $user->createToken('social-session', $abilities)->plainTextToken;

        // --- 3. Redirect Akhir ke Deep Link Aplikasi Mobile ---
        // Sertakan Token Sanctum dan ID User di Deep Link
        Auth::login($user);
        return redirect('/admin/dashboard');
    }
}
