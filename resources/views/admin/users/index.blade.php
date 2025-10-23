@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Daftar User</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    @if($item->profile)
    <img src="{{ asset('storage/' . $item->profile) }}" alt="Profile" width="80" class="rounded-circle">
@else
    <img src="{{ asset('images/default-avatar.png') }}" alt="Default" width="80" class="rounded-circle">
@endif
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ ucfirst($item->role) }}</td>
                <td>
                    <a href="{{ route('users.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
