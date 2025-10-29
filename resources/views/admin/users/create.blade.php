@extends('layouts.main')

@section('title', 'Tambah User')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Tambah User</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.index') }}">Users Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah</li>
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
                        <h2 class="mb-25">Form Tambah User</h2>

                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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

                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Masukkan username" class="form-control" value="{{ old('username') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Masukkan email" class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Masukkan password" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Role</label>
                                        <select name="role" class="form-select" required>
                                            <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="personal" {{ old('role')=='personal' ? 'selected' : '' }}>Personal</option>
                                            <option value="parent" {{ old('role')=='parent' ? 'selected' : '' }}>Parent</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Profile (Opsional)</label>
                                        <input type="file" name="profile" class="form-control" accept="image/*">
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 mt-4">
                                <div class="button-group d-flex justify-content-end flex-wrap">
                                    <a href="{{ route('users.index') }}" class="main-btn danger-btn-outline btn-hover m-2">
                                        <i class="lni lni-cross-circle"></i> Batal
                                    </a>
                                    <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                        <i class="lni lni-checkmark-circle"></i> Simpan
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
@endsection
