<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserChildren;
use App\Models\User;
use Illuminate\Http\Request;

class UserChildrenController extends Controller
{
    public function index()
    {
        $children = UserChildren::with('parent')->get();
        return view('admin.user_children.index', compact('children'));
    }

    public function create()
    {
        // Ambil semua user dengan role 'parent'
        $parents = User::where('role', 'parent')->get();
        return view('admin.user_children.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user_children,email',
        ]);

        // Pastikan parent_id benar-benar user dengan role 'parent'
        $parent = User::find($validated['parent_id']);
        if ($parent->role !== 'parent') {
            return back()->withErrors(['parent_id' => 'User yang dipilih bukan parent yang valid.'])->withInput();
        }

        UserChildren::create($validated);

        return redirect()->route('user_children.index')->with('success', 'Data anak berhasil ditambahkan!');
    }

    public function show(UserChildren $user_child)
    {
        $user_child->load('parent');
        return view('admin.user_children.show', compact('user_child'));
    }

    public function edit(UserChildren $user_child)
    {
        $parents = User::where('role', 'parent')->get();
        return view('admin.user_children.edit', compact('user_child', 'parents'));
    }

    public function update(Request $request, UserChildren $user_child)
    {
        $validated = $request->validate([
            'parent_id' => 'required|exists:users,id',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user_children,email,' . $user_child->id,
        ]);

        // Pastikan parent_id valid dan ber-role parent
        $parent = User::find($validated['parent_id']);
        if ($parent->role !== 'parent') {
            return back()->withErrors(['parent_id' => 'User yang dipilih bukan parent yang valid.'])->withInput();
        }

        $user_child->update($validated);

        return redirect()->route('user_children.index')->with('success', 'Data anak berhasil diperbarui!');
    }

    public function destroy(UserChildren $user_child)
    {
        $user_child->delete();
        return redirect()->route('user_children.index')->with('success', 'Data anak berhasil dihapus!');
    }
}
