<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    protected function getAbilities(string $role): array
    {
        if ($role === 'parent') return ['read:own', 'create:child'];
        if ($role === 'personal') return ['read:own', 'create:log'];
        return ['read:public'];
    }

    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin(Request $request)
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            Log::error("Socialite Callback Failed: " . $e->getMessage());
            return redirect()->away(
                "wellnet://login-error?message=" . urlencode("Otentikasi gagal")
            );
        }

        $user = User::where('google_id', $socialUser->getId())
                    ->orWhere('email', $socialUser->getEmail())
                    ->first();

        $roleDefault = 'parent';
        if (!$user) {
            $user = User::create([
                'username' => $socialUser->getName() ?? 'User Baru',
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(32)),
                'role' => $roleDefault,
                'google_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]);
        }

        $abilities = $this->getAbilities($user->role);
        $token = $user->createToken('social-session', $abilities)->plainTextToken;

        // Redirect ke aplikasi dengan deep link
        $deepLink = "wellnet://login-success?token={$token}&user_id={$user->id}&role={$user->role}";
        return redirect()->away($deepLink);
    }
}
