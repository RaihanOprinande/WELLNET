@extends('layouts.main')

@section('title', 'Log Quiz')

@section('content')
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>User</h2>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                {{-- <li class="breadcrumb-item active">Log Quiz</li> --}}
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
                                    <h6 class="mb-10">Users</h6>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table" class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ ucfirst($item->role) }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $item->id) }}"
                                                    class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                    style="font-size: 1.2rem;">
                                                    <i class="lni lni-eye"></i>
                                                </a>
                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                    style="font-size: 1.2rem;">
                                                    <i class="lni lni-pencil"></i>
                                                </a>

                                                <button type="button"
                                                    class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-id="{{ $item->id }}"
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
@endsection
