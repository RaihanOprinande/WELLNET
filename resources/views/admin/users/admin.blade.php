@extends('layouts.main')

@section('title', 'Daftar Akun Pengguna')

@section('content')
<section class="section">
    <div class="container-fluid">
        <style>
            .col-aksi {
                min-width: 80px;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>

        {{-- Header dan Breadcrumb --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Daftar Akun Pengguna</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="#">Manajemen Pengguna</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Daftar Akun</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="row align-items-center">
                            <div class="title d-flex justify-content-between">
                                <div class="left">
                                    <h6 class="mb-10">Data Akun Pengguna</h6>
                                </div>
                                {{-- <div class="right">
                                    <button class="main-btn btn-sm primary-btn btn-hover mb-20" data-bs-toggle="modal"
                                        data-bs-target="#createModalUser">
                                        <i class="lni lni-plus"></i> Tambah Akun
                                    </button>
                                </div> --}}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table" class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><h6>No</h6></th>
                                        <th><h6>Username</h6></th>
                                        <th><h6>Email</h6></th>
                                        <th><h6>Role</h6></th>
                                        <th class="col-aksi"><h6 class="col-aksi">Aksi</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $i => $user)
                                        <tr>
                                            <td><h6>{{ $i + 1 }}</h6></td>
                                            <td><p>{{ $user->username }}</p></td>
                                            <td><p>{{ $user->email ?? '-' }}</p></td>
                                            <td class="text-capitalize"><p>{{ $user->role }}</p></td>
                                            <td class="col-aksi">
                                                {{-- Tombol View --}}
                                                <a href="{{ route('users.show', $user->id) }}"
                                                   class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                   style="font-size: 1.2rem;">
                                                    <i class="lni lni-eye"></i>
                                                </a>

                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                   class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                   style="font-size: 1.2rem;">
                                                    <i class="lni lni-pencil"></i>
                                                </a>

                                                {{-- Tombol Hapus --}}
                                                <button type="button"
                                                    class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-id="{{ $user->id }}"
                                                    data-base-url="{{ route('users.destroy', ['user' => 0]) }}"
                                                    style="background: transparent; border: none; font-size: 1.2rem;">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
