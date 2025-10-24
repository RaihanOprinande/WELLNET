<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ✅ Hanya allow role super_admin & admin
            if (in_array($user->role, ['super_admin', 'admin'])) {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, ' . ucfirst($user->role) . '!');
            }

            // ❌ Role lain langsung logout
            Auth::logout();
            return back()->withErrors(['email' => 'Akses ditolak! Anda bukan admin.']);
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
