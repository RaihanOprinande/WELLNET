<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Models\UserChildren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function akun()
    {
        // Ambil user dengan role parent dan personal
        $users = User::whereIn('role', ['parent', 'personal'])
            ->select('id', 'username', 'email', 'role')
            ->get();

        // Ambil data anak dari tabel user_children, beri role children
        $children = \DB::table('user_children')
            ->select(
                'id',
                'username',
                'email',
                \DB::raw("'children' as role")
            )
            ->get();

        // Gabungkan semua data menjadi satu koleksi
        $accounts = $users->concat($children);

        return view('admin.users.admin', compact('accounts'));
    }

    public function index()
    {
        $users = User::where('role', 'admin')->get();
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
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role' => 'required|in:admin,personal,parent',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Tambah validasi profile
            ]);

            $data = $request->only(['username', 'email', 'role']);
            $data['password'] = Hash::make($request->password);

            // 🔹 Simpan profile jika ada
            if ($request->hasFile('profile')) {
                $path = $request->file('profile')->store('profiles', 'public');
                $data['profile'] = $path;
            }

            User::create($data);

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
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|in:admin,personal,parent',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Tambah validasi profile
            ]);

            $data = $request->only(['username', 'email', 'role']);
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            // 🔹 Update profile jika diupload baru
            if ($request->hasFile('profile')) {
                // Hapus file lama jika ada
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                // Simpan file baru
                $path = $request->file('profile')->store('profiles', 'public');
                $data['profile'] = $path;
            }

            $user->update($data);

            return redirect()->route('users.index')->with([
                'status' => 'success_modal',
                'message' => 'Data berhasil disimpan!',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'status' => 'failed_modal',
                'message' => 'Gagal mengupdate data: ' . $e->getMessage(),
            ]);
        }
    }
    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Update profile user yang sedang login
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:6',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->only(['username', 'email']);

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            // Update profile jika ada upload baru
            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $path = $request->file('profile')->store('profiles', 'public');
                $data['profile'] = $path;
            }

            $user->update($data);

            return redirect()->route('users.profile')->with([
                'status' => 'success_modal',
                'message' => 'Profile berhasil diperbarui!',
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'status' => 'failed_modal',
                'message' => 'Gagal memperbarui profile: ' . $e->getMessage(),
            ]);
        }
    }

    public function destroy(User $user)
    {
        // 🔹 Hapus file profile jika ada
        if ($user->profile && Storage::disk('public')->exists($user->profile)) {
            Storage::disk('public')->delete($user->profile);
        }

        $user->delete();
        return redirect()->back()->with([
            'status' => 'success_modal',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
