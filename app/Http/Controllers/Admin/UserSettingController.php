<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use App\Models\User;
use App\Models\UserChildren;
use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    public function index()
    {
        $settings = UserSetting::with(['user', 'child'])->get();
        return view('admin.user_setting.index', compact('settings'));
    }

    // ------------------- CREATE PERSONAL -------------------
    public function createPersonal()
    {
        $users = User::where('role', 'personal')->get();
        return view('admin.user_setting.create_personal', compact('users'));
    }

    // ------------------- CREATE CHILDREN -------------------
    public function createChildren()
    {
        // Ambil semua parent dan anak-anaknya
        $parents = User::where('role', 'parent')->get();
        $children = UserChildren::with('parent')->get();

        return view('admin.user_setting.create_children', compact('parents', 'children'));
    }

    // ------------------- STORE -------------------
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'child_id' => 'nullable|exists:user_children,id',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'umur' => 'nullable|integer|min:1',
            'skor' => 'nullable|integer|min:0',
            'lencana' => 'nullable|in:Seedling,Sprout,Explorer,Trailblazer,Mountaineer,Skywalker,Digital Sage',
            'downtime' => 'nullable|integer|min:0',
            'sleep_schedule' => 'nullable|date_format:H:i',
            'digital_freetime' => 'nullable|date_format:H:i',
        ]);

        // Simpan data
        UserSetting::create([
            'user_id' => $request->user_id,
            'child_id' => $request->child_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'skor' => $request->skor,
            'lencana' => $request->lencana,
            'downtime' => $request->downtime,
            'sleep_schedule' => $request->sleep_schedule,
            'digital_freetime' => $request->digital_freetime,
        ]);

        return redirect()->route('user_setting.index')->with('success', 'User setting berhasil ditambahkan!');
    }

    // ------------------- EDIT -------------------
    public function edit(UserSetting $user_setting)
{
    $users = User::all();
    $children = UserChildren::all();

    return view('admin.user_setting.edit', compact('user_setting', 'users', 'children'));
}

public function update(Request $request, UserSetting $user_setting)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'child_id' => 'nullable|exists:user_children,id',
        'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        'umur' => 'nullable|integer|min:1',
        'skor' => 'nullable|integer|min:0',
        'lencana' => 'nullable|in:Seedling,Sprout,Explorer,Trailblazer,Mountaineer,Skywalker,Digital Sage',
        'downtime' => 'nullable|integer|min:0',
        'sleep_schedule' => 'nullable|date_format:H:i',
        'digital_freetime' => 'nullable|date_format:H:i',
    ]);

    $user_setting->update($validated);

    return redirect()
        ->route('user_setting.index')
        ->with('success', 'User setting berhasil diperbarui!');
}


    public function show(UserSetting $user_setting)
    {
        // Menampilkan detail user setting

        return view('admin.user_setting.show', compact('user_setting'));

    }

    // ------------------- DESTROY -------------------
    public function destroy(UserSetting $user_setting)
    {
        $user_setting->delete();
        return redirect()->route('user_setting.index')->with('success', 'User setting berhasil dihapus!');
    }
}
