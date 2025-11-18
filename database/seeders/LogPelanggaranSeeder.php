<?php

namespace Database\Seeders;

use App\Models\LogPelanggaran;
use App\Models\UserSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Peringatan: Pastikan tabel UserSetting sudah terisi data.
        if (UserSetting::count() === 0) {
            echo "⚠️ PERINGATAN: Tabel UserSetting kosong. Harap jalankan UserSettingSeeder terlebih dahulu.\n";
            return;
        }

        // Jumlah data log yang akan dibuat
        $count = 100;

        // Buat 100 data Log Pelanggaran acak menggunakan Factory
        LogPelanggaran::factory()->count($count)->create();

        echo "✅ Berhasil membuat {$count} data Log Pelanggaran acak.\n";
    }

}
