@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3>Tambah User Setting (Personal)</h3>

    <form action="{{ route('user_setting.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>User (Personal)</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->fullname }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        @include('admin.user_setting.form_fields')

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
