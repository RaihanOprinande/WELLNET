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
        // Default values untuk kolom jadwal, dll.
        $sleepStartHour = $this->faker->numberBetween(20, 23);
        $sleepEndHour = $this->faker->numberBetween(4, 7);
        $digitalFreetimeStartHour = $this->faker->numberBetween(15, 17);
        $digitalFreetimeEndHour = $this->faker->numberBetween(18, 20);

        return [
            // Dibuat NULL/Dummy di definition, akan ditimpa oleh state
            'user_id' => null,
            'child_id' => null,

            // Data Acak Lainnya
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'umur' => $this->faker->numberBetween(18, 65), // Default umur untuk user dewasa
            'skor' => $this->faker->numberBetween(100, 15000),
            'lencana' => $this->faker->randomElement(['Seedling','Sprout','Explorer','Trailblazer','Mountaineer','Skywalker','Digital Sage']),
            'downtime' => $this->faker->numberBetween(30, 180),
            'sleep_schedule_start' => sprintf('%02d:00:00', $sleepStartHour),
            'sleep_schedule_end' => sprintf('%02d:00:00', $sleepEndHour),
            'digital_freetime_start' => sprintf('%02d:00:00', $digitalFreetimeStartHour),
            'digital_freetime_end' => sprintf('%02d:00:00', $digitalFreetimeEndHour),
        ];
    }

    /**
     * State untuk User dengan role 'personal': child_id HARUS NULL
     */
    public function isPersonal(int $userId): Factory
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $userId, // User ID dari role 'personal'
            'child_id' => null,   // children_id HARUS NULL
            'umur' => $this->faker->numberBetween(18, 65), // Umur dewasa
        ]);
    }

    /**
     * State untuk User dengan role 'parent': child_id HARUS terisi ID anak
     */
    public function isParent(int $userId): Factory
    {
        // Ambil ID anak yang belum memiliki setting (atau secara acak)
        $childId = UserChildren::inRandomOrder()->value('id');

        return $this->state(fn (array $attributes) => [
            'user_id' => $userId,     // User ID dari role 'parent'
            'child_id' => $childId,   // children_id HARUS terisi
            'umur' => $this->faker->numberBetween(8, 17), // Umur disesuaikan untuk anak
        ]);
    }
}
