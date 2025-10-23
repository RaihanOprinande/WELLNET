@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password (biarkan kosong jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="personal" {{ $user->role == 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="parent" {{ $user->role == 'parent' ? 'selected' : '' }}>Parent</option>
            </select>
        </div>

        <div class="mb-3">
                <label for="profile" class="form-label">Foto Profil (Opsional)</label>
                @if ($user->profile)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile"
                            width="100" class="rounded">
                    </div>
                @endif
                <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                @error('profile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
