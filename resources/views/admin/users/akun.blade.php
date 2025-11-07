@extends('layouts.main')

@section('title', 'Users & Children')

@section('content')
<section class="section">
    <div class="container-fluid">
        <style>
            .col-aksi {
                min-width: 80px; /* lebar minimum untuk tombol aksi */
                white-space: nowrap; /* jangan pecah baris */
                overflow: hidden; /* konten overflow tersembunyi */
            }
        </style>

        {{-- Header --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Akun Pengguna</h2>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active">Akun Pengguna</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="row align-items-center">
                            <div class="title d-flex justify-content-between">
                                <div class="left">
                                    <h6 class="mb-10">Daftar Akun Pengguna</h6>
                                </div>
                                {{-- <div class="right">
                                    <a href="{{ route('users.create') }}"
                                       class="main-btn btn-sm primary-btn btn-hover mb-20">
                                        <i class="lni lni-plus"></i> Tambah Data
                                    </a>
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
                                        <th class="col-aksi"><h6>Aksi</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $i => $item)
                                        <tr>
                                            <td><h6>{{ $i + 1 }}</h6></td>
                                            <td>{{ $item->username ?? $item->name ?? '-' }}</td>
                                            <td>{{ $item->email ?? '-' }}</td>
                                            <td>{{ ucfirst($item->role) }}</td>
                                            <td class="col-aksi">
                                                @php
                                                    $isChild = $item->role === 'children';
                                                    $showRoute = $isChild 
                                                        ? route('user_children.show', $item->id) 
                                                        : route('users.show', $item->id);
                                                    $editRoute = $isChild 
                                                        ? route('user_children.edit', $item->id) 
                                                        : route('users.edit', $item->id);
                                                    $destroyRoute = $isChild 
                                                        ? route('user_children.destroy', ['user_child' => 0]) 
                                                        : route('users.destroy', ['user' => 0]);
                                                @endphp

                                                {{-- Tombol Show --}}
                                                <a href="{{ $showRoute }}"
                                                   class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                   style="font-size: 1.2rem;">
                                                    <i class="lni lni-eye"></i>
                                                </a>

                                                {{-- Tombol Edit --}}
                                                <a href="{{ $editRoute }}"
                                                   class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                   style="font-size: 1.2rem;">
                                                    <i class="lni lni-pencil"></i>
                                                </a>

                                                {{-- Tombol Delete --}}
                                                <button type="button"
                                                        class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        data-id="{{ $item->id }}"
                                                        data-base-url="{{ $destroyRoute }}"
                                                        style="background: transparent; border: none; font-size: 1.2rem;">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end card-style -->
                </div>
            </div>
        </div> <!-- end tables-wrapper -->
    </div>  
</section>
@endsection
