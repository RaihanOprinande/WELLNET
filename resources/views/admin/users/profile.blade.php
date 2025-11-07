@extends('layouts.main')

@section('title', 'Profile Saya')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Profile Saya</h2>
                </div>
            </div>
        </div>

        <div class="card-style mb-30 p-4">
            <form action="{{ route('users.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Password (Kosongkan jika tidak ingin ganti)</label>
                            <input type="password" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Foto Profile</label>
                            <input type="file" name="profile" accept="image/*">
                            @if($user->profile)
                                <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile" class="mt-2 rounded" width="100">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="main-btn primary-btn btn-hover">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
