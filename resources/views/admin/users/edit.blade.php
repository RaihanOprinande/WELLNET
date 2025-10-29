@extends('layouts.main')

@section('title', 'Edit User')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Edit User</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.index') }}">Users Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Form --}}
        <div class="form-layout-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30 p-4">
                        <h2 class="mb-25">Form Edit User</h2>

                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                {{-- Username --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"
                                               placeholder="Masukkan username" value="{{ old('username', $user->username) }}" required>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Masukkan email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Password <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                    </div>
                                </div>

                                {{-- Role --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Role</label>
                                        <select name="role" class="form-select" required>
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="personal" {{ old('role', $user->role) == 'personal' ? 'selected' : '' }}>Personal</option>
                                            <option value="parent" {{ old('role', $user->role) == 'parent' ? 'selected' : '' }}>Parent</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Profile --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Profile</label>
                                        <div class="mb-2 text-center">
                                            <img id="profilePreview"
                                                 src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/default-avatar.png') }}"
                                                 alt="Profile" class="rounded-circle" style="width:120px; height:120px; object-fit:cover;">
                                        </div>
                                        <input type="file" name="profile" class="form-control" accept="image/*" onchange="previewProfile(event)">
                                    </div>
                                </div>

                            </div>

                            {{-- Button --}}
                            <div class="col-12 mt-4">
                                <div class="button-group d-flex justify-content-end flex-wrap">
                                    <a href="{{ route('users.index') }}" class="main-btn danger-btn-outline btn-hover m-2">
                                        <i class="lni lni-cross-circle"></i> Batal
                                    </a>
                                    <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                        <i class="lni lni-checkmark-circle"></i> Update
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Preview Image Script --}}
<script>
function previewProfile(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('profilePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
