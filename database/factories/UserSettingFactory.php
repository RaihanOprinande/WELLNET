<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserChildren;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetting>
 */
class UserSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
        // 1. Dapatkan user_id (Wajib diisi dan harus role 'personal')
        // Jika tidak ada user 'personal', ini bisa menyebabkan error, jadi pastikan data seeding User sudah benar.
        $personalUser = User::where('role', 'personal')->inRandomOrder()->first();
        $userId = $personalUser ? $personalUser->id : User::inRandomOrder()->value('id');

        // 2. Tentukan child_id (Nullable)
        $childId = null;

        // 50% dari data akan diisi child_id, 50% akan NULL
        if ($this->faker->boolean(50)) {
            $childId = UserChildren::inRandomOrder()->value('id');
        }

        // --- Data Acak Lainnya (Sama seperti sebelumnya) ---
        $sleepStartHour = $this->faker->numberBetween(20, 23);
        $sleepEndHour = $this->faker->numberBetween(4, 7);
        $digitalFreetimeStartHour = $this->faker->numberBetween(15, 17);
        $digitalFreetimeEndHour = $this->faker->numberBetween(18, 20);

        return [
            // Kolom Relasi yang sudah diatur
            'user_id' => $userId,
            'child_id' => $childId, // Bisa NULL atau berisi ID anak

            // Data Acak Lainnya
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'perempuan']),
            'umur' => $this->faker->numberBetween(8, 65),
            'skor' => $this->faker->numberBetween(100, 15000),
            'lencana' => $this->faker->randomElement(['Seedling','Sprout','Explorer','Trailblazer','Mountaineer','Skywalker','Digital Sage']),
            'downtime' => $this->faker->numberBetween(30, 180),
            'sleep_schedule_start' => sprintf('%02d:00:00', $sleepStartHour),
            'sleep_schedule_end' => sprintf('%02d:00:00', $sleepEndHour),
            'digital_freetime_start' => sprintf('%02d:00:00', $digitalFreetimeStartHour),
            'digital_freetime_end' => sprintf('%02d:00:00', $digitalFreetimeEndHour),
        ];
    }
}
