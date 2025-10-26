<?php

namespace Database\Seeders;

use App\Models\UserChildren;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserChildren::factory()->count(30)->create();
    }
}
