@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit User Setting</h4>
        </div>

        <div class="card-body">
            {{-- Pesan Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Update --}}
            <form action="{{ route('user_setting.update', $user_setting->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Pilih User --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label fw-semibold">Pilih Pengguna (Parent / Personal)</label>
                    <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $user_setting->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->username ?? $user->username }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilih Anak --}}
                <div class="mb-3">
                    <label for="child_id" class="form-label fw-semibold">Pilih Anak (jika setting untuk anak)</label>
                    <select name="child_id" id="child_id" class="form-select @error('child_id') is-invalid @enderror">
                        <option value="">-- Pilih Anak (Opsional) --</option>
                        @foreach($children as $child)
                            <option value="{{ $child->id }}"
                                {{ old('child_id', $user_setting->child_id) == $child->id ? 'selected' : '' }}>
                                {{ $child->username ?? 'Anak #' . $child->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('child_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field Lain --}}
                @include('admin.user_setting.form_fields', ['user_setting' => $user_setting])

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('user_setting.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
