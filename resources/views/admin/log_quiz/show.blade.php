@extends('layouts.main')

@section('title', 'Detail Log Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Log Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('log_quiz.index') }}" class="main-btn light-btn btn-hover">
                        <i class="lni lni-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        {{-- Card Detail --}}
        <div class="card-style mb-30 p-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h6>Username</h6>
                    <p>{{ $log_quiz->user->name ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <h6>Pertanyaan</h6>
                    <p>{{ $log_quiz->soal->pertanyaan ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <h6>Week</h6>
                    <p>{{ $log_quiz->tema->week ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <h6>Tema Quiz</h6>
                    <p>{{ $log_quiz->tema->title ?? '-' }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <h6>Jawaban User</h6>
                    <p>{{ $log_quiz->jawaban_user }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <h6>Waktu Submit</h6>
                    <p>{{ $log_quiz->created_at->format('Y-m-d H:i:s') }}</p>
                </div>

                @if($log_quiz->soal->image)
                <div class="col-md-12 mb-3">
                    <h6>Gambar Pertanyaan</h6>
                    <img src="{{ asset('storage/' . $log_quiz->soal->image) }}" alt="Gambar Soal"
                        class="rounded shadow" style="max-width: 400px;">
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
