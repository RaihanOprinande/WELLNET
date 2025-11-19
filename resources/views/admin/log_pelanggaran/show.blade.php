@extends('layouts.main')

@section('title', 'Detail Log Pelanggaran')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Log Pelanggaran</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('log_pelanggaran.index') }}">Log Pelanggaran</a>
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

            <div class="row">

                {{-- Username --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Username / Nama Anak</label>
                        <input type="text" class="form-control"
                            value="{{ $log->setting->child->username
                                    ?? $log->setting->user->username
                                    ?? '-' }}"
                            disabled>
                    </div>
                </div>

                {{-- Jenis --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Jenis</label>
                        <input type="text" class="form-control"
                            value="{{ $log->setting && $log->setting->child_id ? 'Anak' : 'Personal' }}"
                            disabled>
                    </div>
                </div>

                {{-- Jenis Pelanggaran --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Jenis Pelanggaran</label>
                        <input type="text" class="form-control"
                            value="{{ $log->pelanggaran ?? '-' }}"
                            disabled>
                    </div>
                </div>

                {{-- Waktu --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Waktu Kejadian</label>
                        <input type="text" class="form-control"
                            value="{{ $log->created_at ? $log->created_at->format('Y-m-d H:i:s') : '-' }}"
                            disabled>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="col-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('log_pelanggaran.index') }}" class="main-btn light btn-hover">
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
</style>
@endsection
