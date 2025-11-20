<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ChildVerificationEmail;
use App\Models\EmailVerification;
use App\Models\User;
use App\Models\UserChildren;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
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
    public function store(Request $request)
    {
        // 1. Validasi Input (Dilakukan di luar try-catch karena ini harus gagal cepat)
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:90',
            'email' => 'required|string|email|max:90|unique:users', // Email harus unik
            'password' => 'required|string|confirmed', // Pastikan ada field password_confirmation
            'role' => 'required|in:personal,parent', // Batasi role yang boleh didaftarkan
            // ... aturan validasi ...
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            // 2. Logika Utama (Potensi terjadinya Error)

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            // $token = $user->createToken('auth_token')->plainTextToken;

            // 3. Respon Sukses
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil.',
                'user' => $user,
                // 'token' => $token
            ], 201);

        } catch (Exception $e) {

            // 4. Penanganan Error

            // Opsional: Catat error penuh ke log file Laravel
            Log::error("API Register Error: " . $e->getMessage() . " on line " . $e->getLine());

            // Kembalikan respon error JSON yang informatif
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server saat memproses pendaftaran.',
                // Di lingkungan produksi, jangan tampilkan $e->getMessage()
                'debug_message' => $e->getMessage(),
            ], 500);
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

    public function child(Request $request)
    {
        DB::beginTransaction();
        $validator = Validator::make($request->all(), [
            'parent_id' => 'required|integer|exists:users,id',
            'username' => 'required|string|max:90',
            'email' => 'required|string|email|max:90|unique:users',
            'profile' => 'nullable|string',

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
        try {

            $child = UserChildren::create([
                'parent_id' => $request->parent_id,
                'username' => $request->username,
                'email' => $request->email,
                'profile' => $request->profile,
            ]);

            $token = Str::random(64);
            EmailVerification::create([
                'child_id' => $child->id,
                'token' => $token,
                'expires_at' => now()->addHours(24),
            ]);
        // $verificationUrl = URL::temporarySignedRoute('child.verify.deep_link', now()->addMinutes(60), ['id' => $child->id, 'hash' => sha1($child->email)]);

        Mail::to($child->email)->send(new ChildVerificationEmail($child, $token));
        DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registration successful. Please check your email to verify your account.',
                'user_id' => $child->id,
            ], 201);

        } catch (Exception $e) {
        DB::rollBack();
            return response()->json([
            'success' => false,
            'messages' => 'gagal menambahkan akun anak'.$e->getMessage(),
            // 'data' => $child,
        ]);
        }
    }

    public function verifyEmail($token)
    {
        try {
            $verification = EmailVerification::where('token', $token)
                ->where('expires_at', '>', now())
                ->first();

            if (!$verification) {
                return view('emails.verify-error', [
                    'message' => 'Invalid or expired verification token'
                ]);
            }

            $user = User::find($verification->user_id);

            // Mark email as verified
            $user->update(['email_verified_at' => now()]);
            $verification->delete();

            // Create auth token for mobile
            $authToken = $user->createToken('email-verified')->plainTextToken;

            // Redirect to mobile app with token
            $deepLink = 'wellnet://verified?token=' . $authToken . '&user_id=' . $user->id;

            return view('emails.verify-success', [
                'message' => 'Email verified successfully!',
                'deepLink' => $deepLink,
                'username' => $user->username,
            ]);

        } catch (Exception $e) {
            return view('emails.verify-error', [
                'message' => 'Verification failed: ' . $e->getMessage()
            ]);
        }
    }
}
