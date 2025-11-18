@extends('layouts.main')

@section('title', 'Edit Psychoeducation')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Psychoeducation</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('psychoeducation.index') }}">Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <form id="formEditPsychoeducation" action="{{ route('psychoeducation.update', $psychoeducation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Judul</label>
                            <input type="text" name="title" required placeholder="Masukkan judul"
                                   value="{{ old('title', $psychoeducation->title) }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Sub Judul</label>
                            <input type="text" name="topik" required placeholder="Masukkan subjudul"
                                   value="{{ old('topik', $psychoeducation->topik) }}">
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
                            <input type="file" name="image" accept="image/*">

                            @if ($psychoeducation->image)
                                <small class="text-muted d-block mt-1">Gambar saat ini:</small>
                                <img src="{{ asset('storage/' . $psychoeducation->image) }}" alt="Preview" width="200" class="mt-2 rounded">
                            @endif

                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Link YouTube (opsional)</label>
                            <input type="text" name="link_yt" placeholder="Masukkan link YouTube"
                                   value="{{ old('link_yt', $psychoeducation->link_yt) }}">
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

                            <div id="quill-editor" style="height: 250px; background:#fff; border:1px solid #ccc;"></div>

                            <input type="hidden" name="content" id="content"
                                   value="{{ old('content', $psychoeducation->content) }}">

                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="main-btn primary-btn btn-hover me-2">
                        <i class="lni lni-checkmark-circle"></i> Update
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
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Edit konten psychoeducation di sini...',
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

    // Muat konten lama
    var oldContent = document.getElementById('content').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Sinkronkan ke input hidden
    quill.on('text-change', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    // Validasi konten tidak kosong
    document.getElementById('formEditPsychoeducation').addEventListener('submit', function(e) {
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
