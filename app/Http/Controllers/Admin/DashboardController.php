<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserChildren;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $pengguna = User::whereIn('role',['personal','parent'])->count();
        $children = UserChildren::count();

        $JumlahPengguna = $pengguna + $children;

        $settingTertinggi = UserSetting::orderBy('skor', 'desc')->first();

        $namaPengguna = 'N/A';
        $skorTertinggi = 0;
        $rolePengguna = 'Tidak Ada';

        if ($settingTertinggi) {
            $skorTertinggi = $settingTertinggi->skor;

            if ($settingTertinggi->child_id !== null) {
                $child = UserChildren::find($settingTertinggi->child_id);
                if ($child) {
                    $namaPengguna = $child->username;
                    $rolePengguna = 'Anak';
                }
            } elseif ($settingTertinggi->user_id !== null) {
                $user = User::find($settingTertinggi->user_id);
                if ($user) {
                    $namaPengguna = $user->name;
                    $rolePengguna = $user->role;
                }
            }
        }

        return view('welcome',compact('JumlahPengguna','namaPengguna'));
    }
}
