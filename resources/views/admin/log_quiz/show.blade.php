@extends('layouts.main')

@section('title', 'Detail Log Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Detail Log Quiz</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="#">Quiz & Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('log_quiz.index') }}">Log Quiz</a>
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
                <h6>Informasi Detail Log Quiz</h6>
            </div>

            <div class="row">
                {{-- Username / Nama Anak --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Username / Nama Anak:</label>
                    <p class="text-dark">
                        @if ($log_quiz->setting && $log_quiz->setting->child)
                            {{ $log_quiz->setting->child->nama_anak }}
                        @elseif ($log_quiz->setting && $log_quiz->setting->user)
                            {{ $log_quiz->setting->user->username }}
                        @else
                            -
                        @endif
                    </p>
                </div>

                {{-- Tema --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tema Quiz:</label>
                    <p class="text-dark">{{ $log_quiz->tema->title ?? '-' }}</p>
                </div>

                {{-- Week --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Week:</label>
                    <p class="text-dark">{{ $log_quiz->tema->week ?? '-' }}</p>
                </div>

                {{-- Waktu --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Waktu Pengerjaan:</label>
                    <p class="text-dark">{{ $log_quiz->created_at->format('Y-m-d H:i:s') }}</p>
                </div>

                {{-- Pertanyaan --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Pertanyaan:</label>
                    <div class="border rounded p-3 bg-light">
                        {!! $log_quiz->soal->pertanyaan ?? '-' !!}
                    </div>
                </div>

                {{-- Jawaban User --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Jawaban User:</label>
                    <div class="border rounded p-3 bg-light">
                        <p class="mb-0">{{ $log_quiz->jawaban_user ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('log_quiz.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
