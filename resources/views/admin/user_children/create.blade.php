@extends('layouts.main')

@section('title', 'Tambah Data Anak')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Tambah Data Anak</h4>

        <form action="{{ route('user_children.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="parent_id" class="form-label">Pilih Parent</label>
                <select name="parent_id" id="parent_id" class="form-select" required>
                    <option value="">-- Pilih Parent --</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
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
                    value="{{ old('username') }}" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Anak</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="profile" class="form-label">Foto Profil (Opsional)</label>
                <input type="file" name="profile" id="profile" class="form-control" accept="image/*">
                @error('profile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('user_children.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
