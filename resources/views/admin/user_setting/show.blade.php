@extends('layouts.main')

@section('title', 'Detail User Setting')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail User Setting</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user_setting.index') }}">User Setting</a>
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
            @php
                $user = $user_setting->user;
                $child = $user_setting->child;
            @endphp

            {{-- Profile --}}
            <div class="text-center mb-4">
                @if($child)
                    <img src="{{ $child->profile ? asset('storage/' . $child->profile) : asset('images/default-avatar.png') }}"
                         alt="Profile" class="rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                    <h3 class="mt-3">{{ $child->username ?? '-' }}</h3>
                    <span class="badge bg-success">Children</span>
                @elseif($user && $user->role === 'personal')
                    <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/default-avatar.png') }}"
                         alt="Profile" class="rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                    <h3 class="mt-3">{{ $user->username ?? '-' }}</h3>
                    <span class="badge bg-primary">Personal</span>
                @else
                    <img src="{{ asset('images/default-avatar.png') }}"
                         alt="Profile" class="rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                    <h3 class="mt-3">-</h3>
                    <span class="badge bg-secondary">-</span>
                @endif
            </div>

            {{-- Informasi --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" value="{{ $child->username ?? $user->username ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $child->email ?? $user->email ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $user_setting->jenis_kelamin ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Umur</label>
                        <input type="text" class="form-control" value="{{ $user_setting->umur ?? '-' }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Skor</label>
                        <input type="text" class="form-control" value="{{ $user_setting->skor ?? 0 }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Lencana</label>
                        <input type="text" class="form-control" value="{{ $user_setting->lencana ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Downtime</label>
                        <input type="text" class="form-control" value="{{ $user_setting->downtime ? $user_setting->downtime . ' menit' : '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Jadwal Tidur</label>
                        <input type="text" class="form-control" value="{{ $user_setting->sleep_schedule_start ?? '-' }} - {{ $user_setting->sleep_schedule_end ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Waktu Bebas Digital</label>
                        <input type="text" class="form-control" value="{{ $user_setting->digital_freetime_start ?? '-' }} - {{ $user_setting->digital_freetime_end ?? '-' }}" disabled>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="col-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('user_setting.edit', $user_setting->id) }}" class="main-btn primary-btn btn-hover me-2">
                    <i class="lni lni-pencil"></i> Edit
                </a>
                <a href="{{ route('user_setting.index') }}" class="main-btn light-btn btn-hover">
                    <i class="lni lni-arrow-left"></i> Kembali
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
