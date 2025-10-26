<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserChildren;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(30)->create();



        $this->call(LogQuizSeeder::class);

    }
}
