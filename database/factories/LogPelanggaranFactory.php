<?php

namespace Database\Factories;

use App\Models\UserSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LogPelanggaran>
 */
class LogPelanggaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pelanggaranTypes = [
            'melewati downtime',
            'mengetikkan kata-kata kasar',
            'melewati app limit',
            'mengetikkan ujaran kebencian',
            'mengetikkan sara',
            'mengetikkan body shaming',
            'mengetikkan ancaman',
            'mengetikkan pelecehan verbal',
            'melewati sleep schedule',
        ];
        return [
            // Ambil ID dari user setting yang sudah ada secara acak
            'setting_id' => UserSetting::inRandomOrder()->value('id'),

            // Pilih salah satu jenis pelanggaran secara acak
            'pelanggaran' => $this->faker->randomElement($pelanggaranTypes),

            // Tambahkan waktu acak dalam rentang 30 hari terakhir
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'updated_at' => now(),
        ];
    }
}
