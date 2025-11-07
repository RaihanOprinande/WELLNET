@extends('layouts.main')

@section('title', 'Detail Soal Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Soal Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('soal_quiz.index') }}">Soal Quiz</a>
                                </li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card --}}
        <div class="card-style mb-30 p-4">

            {{-- Tema Quiz --}}
            <div class="row mb-3">
                <div class="col-12">
                    <label class="fw-bold">Tema Quiz:</label>
                    <p class="mb-0">Minggu {{ $soal_quiz->tema->week ?? '-' }} - {{ $soal_quiz->tema->title ?? '-' }}</p>
                </div>
            </div>

            {{-- Pertanyaan --}}
            <div class="row mb-3">
                <div class="col-12">
                    <label class="fw-bold">Pertanyaan:</label>
                    <div class="border p-3 rounded" style="background-color:#f9f9f9; word-break: break-word; overflow-wrap: break-word;">
                        {!! $soal_quiz->pertanyaan !!}
                    </div>
                </div>
            </div>

            {{-- Opsi Jawaban --}}
            <div class="row mb-3">
                <div class="col-12">
                    <label class="fw-bold">Opsi Jawaban:</label>
                    <ul class="list-group mt-2">
                        @foreach ($soal_quiz->opsi as $opsi)
                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                style="word-break: break-word; overflow-wrap: break-word;">
                                {{ $opsi->opsi }}
                                @if ($opsi->is_correct)
                                    <span class="badge bg-success">Benar</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Tombol aksi --}}
            <div class="row mt-4">
                <div class="col-12 text-end">
                    <a href="{{ route('soal_quiz.index') }}" class="main-btn light-btn btn-hover me-2">
                        <i class="lni lni-arrow-left-circle"></i> Kembali
                    </a>
                    <a href="{{ route('soal_quiz.edit', $soal_quiz->id) }}" class="main-btn primary-btn btn-hover">
                        <i class="lni lni-pencil"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
