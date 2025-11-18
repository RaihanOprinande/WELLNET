@extends('layouts.main')

@section('title', 'Tambah Psychoeducation')

@section('content')
    <section class="section">
        <div class="container-fluid">
            {{-- Header --}}
            <div class="title-wrapper pt-30 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Tambah Psychoeducation</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('psychoeducation.index') }}">Psychoeducation</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tambah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </section>

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

        <form id="formPsychoeducation" action="{{ route('psychoeducation.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label>Judul</label>
                        <input type="text" name="title" placeholder="Masukkan judul" required
                            value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label>Topik</label>
                        <input type="text" name="topik" placeholder="Masukkan Topik" required
                            value="{{ old('topik') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label>Gambar Sampul</label>
                        <input type="file" name="image" accept="image/*" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label>Link YouTube (opsional)</label>
                        <input type="text" name="link_yt" placeholder="Masukkan link YouTube"
                            value="{{ old('link_yt') }}">
                    </div>
                </div>
            </div>

            {{-- Konten Quill --}}
            <div class="row mb-3">
                <div class="col-12">
                    <div class="input-style-1">
                        <label>Konten</label>
                        <div id="quill-editor" style="height: 250px; background: #fff; border: 1px solid #ccc;"></div>
                        <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                    </div>
                </div>
            </div>

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

    {{-- Import Quill.js --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // === Inisialisasi Quill ===
            var quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Tulis konten psychoeducation di sini...',
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'image', 'code-block'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        ['clean']
                    ]
                }
            });

            // === Tampilkan old('content') jika ada ===
            var oldContent = document.getElementById('content').value;
            if (oldContent) {
                quill.root.innerHTML = oldContent;
            }

            // === Sinkronkan Quill ke input hidden ===
            quill.on('text-change', function() {
                document.getElementById('content').value = quill.root.innerHTML;
            });

            // Validasi kosong saat submit
            const form = document.getElementById('formPsychoeducation');
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
