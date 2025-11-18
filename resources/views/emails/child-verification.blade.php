@component('mail::message')
    # Akun Anak Dibuat

    Halo {{ $username }},

    Kamu telah didaftarkan oleh orang tuamu pada aplikasi Wellnet. Untuk mengaktifkan akunmu, silakan klik tombol
    Verifikasi.

    @component('mail::button', ['url' => $verificationUrl])
        Verifikasi & Buka Aplikasi
    @endcomponent

    **Penting:** Tombol ini hanya valid selama 60 menit.

    Terima kasih, Wellnet Team
    {{-- {{ config('app.name') }} --}}
@endcomponent
