@extends('layouts.main')

@section('title', 'Edit Data Anak')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Edit Data Anak</h4>

        <form action="{{ route('user_children.update', $user_child->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="parent_id" class="form-label">Pilih Parent</label>
                <select name="parent_id" id="parent_id" class="form-select" required>
                    <option value="">-- Pilih Parent --</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{ $user_child->parent_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->fullname ?? $parent->username }} ({{ $parent->email }})
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Nama Anak</label>
                <input type="text" name="username" id="username" class="form-control"
                    value="{{ old('username', $user_child->username) }}" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Anak</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user_child->email) }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="profile" class="form-label">Foto Profil (Opsional)</label>
                @if ($user_child->profile)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $user_child->profile) }}" alt="Profile"
                            width="100" class="rounded">
                    </div>
                @endif
                <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                @error('profile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('user_children.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
