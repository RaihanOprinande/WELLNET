@extends('layouts.main')

@section('title', 'Edit Psychoeducation')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Edit Psychoeducation</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('psychoeducation.index') }}">Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="card-style mb-30 p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Perhatian!</strong> Ada kesalahan input:<br>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="formEditPsychoeducation" action="{{ route('psychoeducation.update', $psychoeducation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Judul</label>
                            <input type="text" name="title" placeholder="Masukkan judul" required value="{{ old('title', $psychoeducation->title) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Gambar Sampul</label>
                            <input type="file" name="image" accept="image/*">
                            @if ($psychoeducation->image)
                                <small class="text-muted d-block mt-1">Gambar saat ini:</small>
                                <img src="{{ asset('storage/' . $psychoeducation->image) }}" alt="Preview" width="200" class="mt-2 rounded">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label>Link YouTube (opsional)</label>
                            <input type="text" name="link_yt" placeholder="Masukkan link YouTube" value="{{ old('link_yt', $psychoeducation->link_yt) }}">
                        </div>
                    </div>
                </div>

                {{-- Konten Quill --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Konten</label>
                            <div id="quill-editor" style="height: 250px; background: #fff; border: 1px solid #ccc;"></div>
                            <input type="hidden" name="content" id="content" value="{{ old('content', $psychoeducation->content) }}">
                        </div>
                    </div>
                </div>

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

{{-- Import Quill.js --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // === Inisialisasi Quill ===
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

    // === Tampilkan konten lama jika ada ===
    var oldContent = document.getElementById('content').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // === Sinkronkan isi ke hidden input ===
    quill.on('text-change', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    // Validasi konten kosong saat submit
    const form = document.getElementById('formEditPsychoeducation');
    form.addEventListener('submit', function(e) {
        const plain = quill.getText().trim();
        if (!plain) {
            e.preventDefault();
            alert('Kolom konten tidak boleh kosong.');
            return false;
        }
        document.getElementById('content').value = quill.root.innerHTML;
    });
});
</script>
@endsection
