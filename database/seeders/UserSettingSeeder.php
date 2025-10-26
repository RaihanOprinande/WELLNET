<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserChildren;
use App\Models\UserSetting;
use Illuminate\Support\Facades\Hash;

class UserSettingSeeder extends Seeder
{
    public function run(): void{

        UserSetting::factory()->count(40)->create();
    }
}
