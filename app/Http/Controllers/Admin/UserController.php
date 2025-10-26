<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::where('role','admin')->get();
        return view('admin.users.admin', compact('users'));
    }

    public function index(){
        $users = User::where('role', 'parent')->orwhere('role','personal')->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role' => 'required|in:admin,personal,parent',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,personal,parent',
            ]);

            $data = $request->only(['name', 'email', 'role']);
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            return redirect()->route('users.index')->with([
                'status' => 'success_modal',
                'message' => 'Data berhasil disimpan!',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'status' => 'failed_modal',
                'message' => 'Gagal mengupdate data',$e->getMessage(),
            ]);
        }

    }

    public function destroy(User $user)
    {
        if ($user->profile && Storage::disk('public')->exists($user->profile)) {
            Storage::disk('public')->delete($user->profile);
        }

        $user->delete();
            return redirect()->back()->with([
                'status' => 'success_modal',
                'message' => 'Data berhasil disimpan!',
            ]);
    }
}
