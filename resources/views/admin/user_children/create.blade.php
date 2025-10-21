@extends('layouts.main')

@section('title', 'Tambah Anak')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 mb-3">
            <h2>Tambah Data Anak</h2>
        </div>

        <div class="card p-4">
            <form action="{{ route('user_children.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Pilih Parent</label>
                    <select name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Parent --</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                {{ $parent->username }} ({{ $parent->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Nama Anak</label>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" placeholder="Masukkan nama anak" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Anak</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Masukkan email anak" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('user_children.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

