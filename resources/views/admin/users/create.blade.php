@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Tambah User</h2>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="personal">Personal</option>
                <option value="parent">Parent</option>
            </select>
        </div>

        <div class="mb-3">
                <label for="profile" class="form-label">Foto Profil (Opsional)</label>
                <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                @error('profile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
