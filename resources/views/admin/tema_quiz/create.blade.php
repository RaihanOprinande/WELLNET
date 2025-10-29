@extends('layouts.main')

@section('title', 'Tambah Tema Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Tambah Tema Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('tema_quiz.index') }}">Tema Quiz</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="card-style mb-30 p-4">
            <form id="formTemaQuiz" action="{{ route('tema_quiz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Gambar</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Minggu</label>
                            <input name="week" type="number" placeholder="Masukkan minggu ke" required />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Judul</label>
                            <input name="title" type="text" placeholder="Masukkan judul" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Topik</label>
                            <input name="topik" type="text" placeholder="Masukkan topik" />
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="input-style-1">
                            <label>Materi Relevan</label>
                            <input name="materi_relevan" type="text" placeholder="Masukkan materi relevan" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Deskripsi</label>
                            <textarea name="description" placeholder="Masukkan deskripsi" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="main-btn primary-btn btn-hover me-2">
                        <i class="lni lni-checkmark-circle"></i> Save
                    </button>
                    <a href="{{ route('tema_quiz.index') }}" class="main-btn danger-btn-outline">
                        <i class="lni lni-cross-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
