@extends('layouts.main')

@section('title', 'Edit Tema Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Tema Quiz</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('tema_quiz.index') }}">Tema Quiz</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <h2 class="mb-25">Form Edit Tema Quiz</h2>

                        <form action="{{ route('tema_quiz.update', $tema->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Atau PATCH, sesuai definisi Route Resource --}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Judul</label>
                                        <input name="title" type="text" placeholder="Masukkan judul" required value="{{ old('title', $tema->title) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Minggu</label>
                                        <input name="week" type="number" placeholder="Masukkan minggu ke" required value="{{ old('week', $tema->week) }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Topik</label>
                                        <input name="topik" type="text" placeholder="Masukkan topik" value="{{ old('topik', $tema->topik) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Materi Relevan</label>
                                        <input name="materi_relevan" type="text" placeholder="Masukkan materi relevan" value="{{ old('materi_relevan', $tema->materi_relevan) }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-style-1">
                                        <label>Deskripsi</label>
                                        <textarea name="description" placeholder="Masukkan deskripsi" rows="5">{{ old('description', $tema->description) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Gambar Sampul Saat Ini</label>
                                        @if ($tema->image)
    @php
        // Path file di storage
        $storagePath = 'storage/' . $tema->image;
        $publicFilePath = public_path($storagePath);

        // Jika file ada di storage/app/public
        if (file_exists($publicFilePath)) {
            $imgUrl = asset($storagePath);
        } else {
            // Jika file ada di public/
            $imgUrl = asset($tema->image);
        }
    @endphp

    <img src="{{ $imgUrl }}" width="150" class="rounded mb-2" alt="Gambar Sampul">
    <p class="text-muted">Upload gambar baru untuk mengganti gambar di atas.</p>

@else
    <p class="text-muted">Belum ada gambar sampul.</p>
@endif


                                        <div class="update-image">
                                            <input type="file" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="button-group d-flex justify-content-end flex-wrap">
                                    <a href="{{ route('tema_quiz.index') }}" class="main-btn danger-btn-outline btn-hover m-2">
                                        <i class="lni lni-cross-circle"></i> Batal
                                    </a>
                                    <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                        <i class="lni lni-checkmark-circle"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
