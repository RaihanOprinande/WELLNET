@extends('layouts.main')

@section('title', 'Detail Tema Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Tema Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('tema_quiz.index') }}">Tema Quiz</a>
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

            {{-- Gambar Sampul --}}
            <div class="text-center mb-4">
                <img src="{{ $tema_quiz->image ? asset('storage/' . $tema_quiz->image) : asset('images/default-image.png') }}"
                     alt="Gambar Tema Quiz"
                     class="rounded shadow-sm"
                     style="width: 200px; height: 200px; object-fit: cover;">
            </div>

            {{-- Informasi --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Judul</label>
                        <input type="text" class="form-control" value="{{ $tema_quiz->title ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Topik</label>
                        <input type="text" class="form-control" value="{{ $tema_quiz->topik ?? '-' }}" disabled>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="input-style-1 mb-3">
                        <label>Materi Relevan</label>
                        <input type="text" class="form-control" value="{{ $tema_quiz->materi_relevan ?? '-' }}" disabled>
                    </div>
                    <div class="input-style-1 mb-3">
                        <label>Minggu</label>
                        <input type="text" class="form-control" value="{{ $tema_quiz->week ?? '-' }}" disabled>
                    </div>
                </div>
                 <div class="input-style-1 mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="6" disabled>{{ $tema_quiz->description ?? '-' }}</textarea>
                    </div>
            </div>

            {{-- Actions --}}
            <div class="col-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('tema_quiz.edit', $tema_quiz->id) }}" class="main-btn primary-btn btn-hover me-2">
                    <i class="lni lni-pencil"></i> Edit
                </a>
                <a href="{{ route('tema_quiz.index') }}" class="main-btn light-btn btn-hover">
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
</style>
@endsection
