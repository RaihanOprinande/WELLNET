@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Detail User</h2>

    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $user->id }}</td></tr>
        @if($user->profile)
    <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile" width="80" class="rounded-circle">
@else
    <img src="{{ asset('images/default-avatar.png') }}" alt="Default" width="80" class="rounded-circle">
@endif
        <tr><th>Username</th><td>{{ $user->username }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <tr><th>Role</th><td>{{ ucfirst($user->role) }}</td></tr>
    </table>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
