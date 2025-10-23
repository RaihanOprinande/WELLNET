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
                <table id="table" class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
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
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($child->profile)
    <img src="{{ asset('storage/' . $child->profile) }}" alt="Profile" width="80" class="rounded-circle">
@else
    <img src="{{ asset('images/default-avatar.png') }}" alt="Default" width="80" class="rounded-circle">
@endif

                                <td>{{ $child->username }}</td>
                                <td>{{ $child->email }}</td>
                                <td>{{ $child->parent?->username ?? '-' }}</td>
                                <td>{{ $child->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('user_children.show', $child->id) }}" class="btn btn-sm btn-info">
                                        <i class="lni lni-eye"></i>
                                    </a>
                                    <a href="{{ route('user_children.edit', $child->id) }}" class="btn btn-sm btn-warning">
                                        <i class="lni lni-pencil"></i>
                                    </a>
                                    <form action="{{ route('user_children.destroy', $child->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="lni lni-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
