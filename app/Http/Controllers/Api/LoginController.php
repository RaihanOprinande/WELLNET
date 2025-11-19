<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    protected function getAbilities(string $role): array
    {
        // Mendefinisikan izin token berdasarkan role
        if ($role === 'super admin' || $role === 'admin') {
            // Admin tidak boleh login via API mobile.
            return ['blocked'];
        } elseif ($role === 'parent') {
            return ['read:own', 'update:own', 'create:child', 'read:child-setting'];
        } elseif ($role === 'child') {
             return ['read:content', 'create:log', 'update:progress'];
        } else {
            return ['read:public'];
        }
    }

public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Ambil kredensial
        $credentials = $request->only('email', 'password');

        // 2. Coba Otentikasi
        if (Auth::attempt($credentials)) {
            // Otentikasi Berhasil
            $user = Auth::user();

            // 3. Buat Token Sanctum
            // 'auth_token' adalah nama token yang bisa Anda ubah
            // $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil.',
                'user' => [
                    'id' => $user->id,
                    // 'token' => $token,
                    'name' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
                // 'token' => $token
            ], 200);

        } else {
            // Otentikasi Gagal
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.'
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
{
        // 1. Memastikan user terotentikasi (dilakukan oleh middleware)
        if ($request->user()) {

            // 2. Revoke (Hapus) token yang digunakan untuk request saat ini dari database
            // currentAccessToken() adalah method yang disediakan oleh HasApiTokens trait
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil. Sesi token telah diakhiri.'
            ], 200); // HTTP 200 OK
        }

        // Ini hanya sebagai fallback, karena middleware sudah seharusnya menangkap ini
        return response()->json([
            'status' => 'error',
            'message' => 'Tidak ada sesi aktif atau user tidak terotentikasi.'
        ], 401); // HTTP 401 Unauthorized
    }
    }
}
