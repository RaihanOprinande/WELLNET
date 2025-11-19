@extends('layouts.main')

@section('title', 'Detail Log Pelanggaran')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Detail Log Pelanggaran</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="#">Monitoring</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('log_pelanggaran.index') }}">Log Pelanggaran</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Detail --}}
        <div class="card-style mb-30">
            <div class="title mb-3">
                <h6>Informasi Detail Log Pelanggaran</h6>
            </div>

            <div class="row">
                {{-- Username / Nama Anak --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Username / Nama Anak:</label>
                    <p class="text-dark">
                        @if ($log->setting && $log->setting->child)
                            {{ $log->setting->child->username }}
                        @elseif ($log->setting && $log->setting->user)
                            {{ $log->setting->user->username }}
                        @else
                            -
                        @endif
                    </p>
                </div>

                {{-- Jenis --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Jenis:</label>
                    <p class="text-dark">
                        @if ($log->setting && $log->setting->child_id)
                            Anak
                        @else
                            Personal
                        @endif
                    </p>
                </div>

                {{-- Jenis Pelanggaran --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Jenis Pelanggaran:</label>
                    <p class="text-dark">{{ $log->pelanggaran ?? '-' }}</p>
                </div>

                {{-- Waktu Kejadian --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Waktu Kejadian:</label>
                    <p class="text-dark">{{ $log->created_at ? $log->created_at->format('Y-m-d H:i:s') : '-' }}</p>
                </div>

                {{-- Pelanggaran Detail --}}
                {{-- <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Deskripsi Pelanggaran:</label>
                    <div class="border rounded p-3 bg-light">
                        <p class="mb-0">{{ $log->pelanggaran ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                </div> --}}
            </div>

            <div class="mt-4">
                <a href="{{ route('log_pelanggaran.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
