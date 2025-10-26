@extends('layouts.main')

@section('title', 'Daftar Anak')

@section('content')
    <section class="section">
        <div class="container-fluid">

            {{-- Header --}}
            <div class="title-wrapper pt-30 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Daftar Anak</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('user_children.create') }}" class="btn btn-primary">
                            <i class="lni lni-plus"></i> Tambah Anak
                        </a>
                    </div>
                </div>
            </div>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tabel data anak --}}
            <div class="card p-3">
                <div class="table-responsive">
                    <table id="table" class="table" style="width: 100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Profile</th>
                                <th>Nama Anak</th>
                                <th>Email</th>
                                <th>Parent</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($children as $index => $child)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($child->profile)
                                            <img src="{{ asset('storage/' . $child->profile) }}" alt="Profile"
                                                width="80" class="rounded-circle">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default"
                                                width="80" class="rounded-circle">
                                        @endif

                                    <td>{{ $child->username }}</td>
                                    <td>{{ $child->email }}</td>
                                    <td>{{ $child->parent?->name ?? '-' }}</td>
                                    <td>{{ $child->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('user_children.show', $child->id) }}"
                                            class="text-info p-1 me-1 rounded hover-bg-info transition"
                                            style="font-size: 1.2rem;">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <a href="{{ route('user_children.edit', $child->id) }}"
                                            class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                            style="font-size: 1.2rem;">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <button type="button"
                                            class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            data-id="{{ $child->id }}"
                                            data-base-url="{{ route('user_children.destroy', ['user_child' => 0]) }}"
                                            style="background: transparent; border: none; font-size: 1.2rem;">
                                            <i class="lni lni-trash-can"></i>
                                        </button>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
