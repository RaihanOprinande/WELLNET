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
// Kosongkan tabel UserSetting untuk menghindari duplikat ID jika Anda menjalankan seeder berulang
        UserSetting::truncate();

        $parentUsers = User::where('role', 'parent')->get();
        $personalUsers = User::where('role', 'personal')->get();
        $children = UserChildren::get();

        // 1. Membuat Setting untuk setiap USER PERSONAL (child_id: NULL)
        foreach ($personalUsers as $user) {
            UserSetting::factory()
                ->isPersonal($user->id) // Menggunakan state isPersonal
                ->create();
        }

        // 2. Membuat Setting untuk setiap CHILD (user_id: Parent, child_id: Terisi)
        // Logika: Setiap anak harus memiliki setting, dan setting ini terikat pada Parent-nya.
        foreach ($children as $child) {
            // Asumsi: Setiap anak memiliki Parent ID yang valid di tabel UserChildren
            $parentId = $child->parent_id;

            // Pastikan parent_id adalah user dengan role 'parent'
            $isParent = User::where('id', $parentId)->where('role', 'parent')->exists();

            if ($isParent) {
                 UserSetting::factory()
                    ->isParent($parentId) // Menggunakan state isParent
                    ->state(['child_id' => $child->id]) // Menimpa child_id spesifik
                    ->create();
            }
        }
    }
}
