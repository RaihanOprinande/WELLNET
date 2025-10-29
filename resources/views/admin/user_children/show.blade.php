@extends('layouts.main')

@section('title', 'Detail Data Anak')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail User</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.akun') }}">Users</a>
                                </li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Detail --}}
        <div class="card-style mb-30 p-4">
            {{-- Profile --}}
            <div class="text-center mb-4">
                <img src="{{ $user_child->profile ? asset('storage/' . $user_child->profile) : asset('images/default-avatar.png') }}"
                     alt="Profile" class="rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                <h3 class="mt-3">{{ $user_child->username }}</h3>
                <span class="badge bg-info">Children</span>
            </div>

            {{-- Informasi --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" value="{{ $user_child->username }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user_child->email }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Parent</label>
                        <input type="text" class="form-control"
                               value="{{ $user_child->parent?->username ?? '-' }} ({{ $user_child->parent?->email ?? 'Tidak Ditemukan' }})"
                               disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Tanggal Dibuat</label>
                        <input type="text" class="form-control" value="{{ $user_child->created_at->format('d M Y H:i') }}" disabled>
                    </div>
                </div>
            </div>

            {{-- Optional Actions --}}
            <div class="col-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('user_children.edit', $user_child->id) }}" class="main-btn primary-btn btn-hover me-2">
                    <i class="lni lni-pencil"></i> Edit
                </a>
                 @php
    $cancelRoute = Auth::user()->role === 'super_admin'
        ? route('users.index')
        : route('users.akun');
@endphp

<a href="{{ $cancelRoute }}" class="main-btn light btn-hover">
    <i class="lni lni-cross-circle"></i> Kembali
</a>
            </div>
        </div>
    </div>
</section>

{{-- Style tambahan --}}
<style>
    .card-style {
        border-radius: 12px;
        background-color: #fff;
    }
    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    .badge {
        padding: 0.4em 0.8em;
        font-size: 0.85rem;
    }
</style>
@endsection
