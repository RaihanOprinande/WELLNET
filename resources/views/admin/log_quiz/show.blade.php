@extends('layouts.main')

@section('title', 'Detail Log Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Log Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('log_quiz.index') }}">Log Quiz</a>
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
                            value="{{ $log_quiz->setting->child->username
                                    ?? $log_quiz->setting->user->username
                                    ?? '-' }}"
                            disabled>
                    </div>
                </div>

                {{-- Tema --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Tema Quiz</label>
                        <input type="text" class="form-control"
                            value="{{ $log_quiz->tema->title ?? '-' }}"
                            disabled>
                    </div>
                </div>

                {{-- Week --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Week</label>
                        <input type="text" class="form-control"
                            value="{{ $log_quiz->tema->week ?? '-' }}"
                            disabled>
                    </div>
                </div>

                {{-- Waktu --}}
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Waktu Pengerjaan</label>
                        <input type="text" class="form-control"
                            value="{{ $log_quiz->created_at->format('Y-m-d H:i:s') }}"
                            disabled>
                    </div>
                </div>

                {{-- Pertanyaan --}}
                <div class="col-md-12">
                    <div class="input-style-1 mb-3">
                        <label>Pertanyaan</label>
                        <textarea class="form-control" rows="4" disabled>{{ strip_tags($log_quiz->soal->pertanyaan ?? '-') }}</textarea>
                    </div>
                </div>

                {{-- Jawaban User --}}
                <div class="col-md-12">
                    <div class="input-style-1 mb-3">
                        <label>Jawaban User</label>
                        <textarea class="form-control" rows="3" disabled>{{ $log_quiz->opsi->opsi ?? '-' }}</textarea>
                    </div>
                </div>

                {{-- Status Jawaban --}}
                <div class="col-md-12">
                    <div class="input-style-1 mb-3">
                        <label>Status Jawaban</label>
                        <input type="text" class="form-control"
                            value="{{ $log_quiz->is_correct ? 'Benar' : 'Salah' }}"
                            disabled>
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="col-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('log_quiz.index') }}" class="main-btn light btn-hover">
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
