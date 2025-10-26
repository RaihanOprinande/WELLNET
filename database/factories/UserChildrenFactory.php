<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserChildren>
 */
class UserChildrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
{
        // Ambil ID dari user yang ada secara acak
        $parentId = User::where('role','parent')->inRandomOrder()->value('id');

        // Pastikan ada parent ID yang ditemukan
        if (!$parentId) {

            $parentId = 1;
        }

        return [

            'parent_id' => $parentId,

            'username' => $this->faker->unique()->userName . $this->faker->randomNumber(2),


            'email' => $this->faker->unique()->safeEmail(),

        ];
    }
    }
}
