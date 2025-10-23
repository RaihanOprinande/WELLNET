@extends('layouts.main')

@section('title', 'Detail Soal Quiz')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30 mb-3">
                <h2>Detail Soal Quiz</h2>
            </div>

            <div class="card-style mb-30">
                <div class="mb-3">
                    <strong>Tema Quiz:</strong>
                    <p>Minggu {{ $soal_quiz->tema->week ?? '-' }} - {{ $soal_quiz->tema->title ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <strong>Pertanyaan:</strong>
                    <div class="border p-3 rounded"
                        style="background-color:#f9f9f9 word-break: break-word; overflow-wrap: break-word;">
                        {!! $soal_quiz->pertanyaan !!}
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Opsi Jawaban:</strong>
                    <ul class="list-group mt-2">
                        @foreach ($soal_quiz->opsi as $opsi)
                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                style=" word-break: break-word; overflow-wrap: break-word;">
                                {{ $opsi->opsi }}
                                @if ($opsi->is_correct)
                                    <span class="badge bg-success">Benar</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-3 text-end">
                    <a href="{{ route('soal_quiz.index') }}" class="main-btn light-btn btn-hover me-2">Kembali</a>
                    <a href="{{ route('soal_quiz.edit', $soal_quiz->id) }}" class="main-btn primary-btn btn-hover">Edit</a>
                </div>
            </div>
        </div>
    </section>
@endsection
