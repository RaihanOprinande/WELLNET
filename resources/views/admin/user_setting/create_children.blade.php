@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3>Tambah User Setting (Children)</h3>

    <form action="{{ route('user_setting.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Pilih Orang Tua</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Pilih Orang Tua --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="child_id" class="form-label">Pilih Anak</label>
            <select name="child_id" id="child_id" class="form-select" required>
                <option value="">-- Pilih Anak --</option>
                @foreach($children as $child)
                    <option value="{{ $child->id }}">
                        {{ $child->username }} (Parent: {{ $child->parent->username ?? 'Tidak Diketahui' }})
                    </option>
                @endforeach
            </select>
        </div>

        @include('admin.user_setting.form_fields')

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
