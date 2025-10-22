<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserChildren;
use App\Models\UserSetting;
use Illuminate\Support\Facades\Hash;

class UserSettingSeeder extends Seeder
{
    public function run(): void
    {
        // --- 1. Buat akun parent ---
        $parents = collect([
            [
                'username' => 'parent1',
                'email' => 'parent1@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'parent',
            ],
            [
                'username' => 'parent2',
                'email' => 'parent2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'parent',
            ],
        ])->map(fn($data) => User::create($data));

        // --- 2. Buat anak untuk setiap parent ---
        foreach ($parents as $index => $parent) {
            for ($i = 1; $i <= 2; $i++) {
                // Buat user role personal
                $child = User::create([
                    'username' => "child{$index}{$i}",
                    'email' => "child{$index}{$i}@gmail.com",
                    'password' => Hash::make('password'),
                    'role' => 'personal',
                ]);

                // Simpan relasi parent-child
                UserChildren::create([
                    'parent_id' => $parent->id,
                    'username' => $child->username,
                    'email' => $child->email,
                ]);

                // Buat user setting untuk anak
                UserSetting::create([
                    'user_id' => $child->id,
                    'jenis_kelamin' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
                    'umur' => rand(10, 18),
                    'skor' => rand(50, 100),
                    'lencana' => ['Seedling', 'Sprout', 'Explorer', 'Trailblazer', 'Mountaineer', 'Skywalker', 'Digital Sage'][rand(0, 6)],
                    'downtime' => rand(30, 120),
                    'sleep_schedule_start' => '22:00',
                    'sleep_schedule_end' => '06:00',
                    'digital_freetime_start' => '16:00',
                    'digital_freetime_end' => '18:00',
                ]);
            }

            // --- 3. Buat setting untuk parent sendiri (opsional) ---
            UserSetting::create([
                'user_id' => $parent->id,
                'jenis_kelamin' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
                'umur' => rand(30, 45),
                'skor' => rand(60, 100),
                'lencana' => ['Seedling', 'Sprout', 'Explorer', 'Trailblazer', 'Mountaineer', 'Skywalker', 'Digital Sage'][rand(0, 6)],
                'downtime' => rand(60, 180),
                'sleep_schedule_start' => '23:00',
                'sleep_schedule_end' => '05:30',
                'digital_freetime_start' => '19:00',
                'digital_freetime_end' => '21:00',
            ]);
        }

        // --- 4. Buat satu user personal tanpa parent ---
        $soloUser = User::create([
            'username' => 'personal_solo',
            'email' => 'personal_solo@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'personal',
        ]);

        UserSetting::create([
            'user_id' => $soloUser->id,
            'jenis_kelamin' => 'Laki-laki',
            'umur' => 22,
            'skor' => 88,
            'lencana' => 'Explorer',
            'downtime' => 60,
            'sleep_schedule_start' => '23:00',
            'sleep_schedule_end' => '06:30',
            'digital_freetime_start' => '17:00',
            'digital_freetime_end' => '19:00',
        ]);
    }
}
