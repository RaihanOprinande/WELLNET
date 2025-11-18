@extends('layouts.main')

@section('title', 'Tambah Psychoeducation')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Tambah Psychoeducation</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('psychoeducation.index') }}">Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card --}}
        <div class="card-style mb-30">
            <div class="row align-items-center">
                <div class="title d-flex justify-content-between">
                    <div class="left">
                        <h6 class="mb-10">Psychoeducation</h6>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            {{-- Error Handling --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Perhatian!</strong> Ada kesalahan input:<br>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form id="formPsychoeducation" action="{{ route('psychoeducation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
    <div class="col-md-6">
        <div class="input-style-1">
            <label>Judul</label>
            <input type="text" name="title" placeholder="Masukkan judul" required value="{{ old('title') }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-style-1">
            <label>Sub judul</label>
            <input type="text" name="topik" placeholder="Masukkan subjudul" required value="{{ old('topik') }}">
            @error('topik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="input-style-1">
            <label>Gambar Sampul</label>
            <input type="file" name="image" accept="image/*" required>
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-style-1">
            <label>Link YouTube (opsional)</label>
            <input type="text" name="link_yt" placeholder="Masukkan link YouTube" value="{{ old('link_yt') }}">
            @error('link_yt')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>


                {{-- Konten --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Konten</label>
                            <div id="quill-editor" style="height: 250px; background: #fff; border: 1px solid #ccc;"></div>
                            <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="main-btn primary-btn btn-hover me-2">
                        <i class="lni lni-checkmark-circle"></i> Save
                    </button>
                    <a href="{{ route('psychoeducation.index') }}" class="main-btn danger-btn-outline">
                        <i class="lni lni-cross-circle"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>

{{-- Quill --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Init Quill
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Tulis konten psychoeducation di sini...',
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['link', 'image', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['clean']
            ]
        }
    });

    // Isi ulang content lama
    var oldContent = document.getElementById('content').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Sync Quill ke input hidden
    quill.on('text-change', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    // Cek konten tidak kosong
    document.getElementById('formPsychoeducation').addEventListener('submit', function(e) {
        const plain = quill.getText().trim();
        const html = quill.root.innerHTML.trim();

        if (!plain || html === '<p><br></p>') {
            e.preventDefault();
            alert('Kolom konten tidak boleh kosong.');
        }
    });
});
</script>
@endsection
