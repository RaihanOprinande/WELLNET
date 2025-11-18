<?php

namespace App\Http\Controllers;

use App\Models\UserChildren;
use Illuminate\Http\Request;

class ChildVerificationController extends Controller
{
private $deepLinkScheme = '/login';
    private $deepLinkPath = 'auth/child-verified';

    public function verifyAndRedirect(Request $request, $id, $hash)
    {
        // Signed Middleware sudah memverifikasi keaslian URL.
        // Cek hash dan ID
        $child = UserChildren::findOrFail($id);

        // Cek jika hash email tidak cocok, atau sudah terverifikasi
        if (! hash_equals((string) $hash, sha1($child->email))) {
            $message = 'Verifikasi tidak valid atau link rusak.';
            return redirect('/verification/error?message=Token%20tidak%20valid.');
        }

        if ($child->email_verified_at) {
            $message = 'Akun sudah terverifikasi sebelumnya.';
            // Redirect ke aplikasi dengan status OK, tidak perlu token baru
            return redirect('/dashboard?status=already_verified');
        }

        // --- Verifikasi Berhasil ---
        $child->email_verified_at = now();
        $child->save();

        // Optional: Buat Token Sanctum jika Child langsung Login setelah verifikasi
        // $childToken = $child->createToken('child-session')->plainTextToken;

        // Redirect Akhir ke Deep Link Aplikasi Mobile
       return redirect('/dashboard?status=success&child_id=' . $child->id);
    }
}
