<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
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
            $googleUser = Socialite::driver('google')->user();

            // Find or create user
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'username' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user);

            // Generate API token for mobile app
            $token = $user->createToken('google-login')->plainTextToken;

            // Return token and user data as JSON
            return response()->json([
                'success' => true,
                'message' => 'Google login successful',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'username' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                ]
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google login failed: ' . $e->getMessage()
            ], 401);
        }
    }
        public function mobileGoogleLogin(Request $request)
    {
        $validated = $request->validate([
            'google_id' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string',
            'avatar' => 'nullable|string',
        ]);

        try {
            $user = User::updateOrCreate(
                ['email' => $validated['email']],
                [
                    'username' => $validated['username'],
                    'google_id' => $validated['google_id'],
                    'avatar' => $validated['avatar'],
                    'email_verified_at' => now(),
                ]
            );

            $token = $user->createToken('mobile-google-login')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed: ' . $e->getMessage()
            ], 401);
        }
    }
}
