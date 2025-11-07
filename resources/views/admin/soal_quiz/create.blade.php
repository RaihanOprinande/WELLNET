@extends('layouts.main')

@section('title', 'Tambah Soal Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Tambah Soal Quiz</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('soal_quiz.index') }}">Soal Quiz</a>
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

            <form id="formSoalQuiz" action="{{ route('soal_quiz.store') }}" method="POST">
                @csrf

                {{-- Pilih Tema Quiz --}}
                <div class="row mb-3">
                        <div class="input-style-1">
                            <label>Tema Quiz</label>
                            <select name="temaquiz_id" class="form-select" required>
                                <option value="">-- Pilih Tema --</option>
                                @foreach ($tema_quiz as $tema)
                                    <option value="{{ $tema->id }}">
                                        {{ $tema->title }} (Week {{ $tema->week }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                </div>

                {{-- Pertanyaan --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Pertanyaan</label>
                            <div id="quill-editor" style="height: 200px; background: #fff; border: 1px solid #ccc;"></div>
                            <input type="hidden" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan') ?? '' }}">
                        </div>
                    </div>
                </div>

                {{-- Opsi Jawaban --}}

                            <label>Opsi Jawaban</label>
                            <div id="opsi-container">
                                <div class="d-flex align-items-center mb-2">
                                    <input type="radio" name="jawaban_benar" value="0" class="me-2" required>
                                    <input type="text" name="opsi[]" class="form-control" placeholder="Opsi 1" required>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <input type="radio" name="jawaban_benar" value="1" class="me-2">
                                    <input type="text" name="opsi[]" class="form-control" placeholder="Opsi 2" required>
                                </div>
                            </div>
                            <button type="button" id="tambah-opsi" class="btn btn-sm btn-secondary mt-2">+ Tambah Opsi</button>


                {{-- Tombol --}}
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="main-btn primary-btn btn-hover me-2">
                        <i class="lni lni-checkmark-circle"></i> Save
                    </button>
                    <a href="{{ route('soal_quiz.index') }}" class="main-btn danger-btn-outline">
                        <i class="lni lni-cross-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- Quill.js --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Tulis pertanyaan di sini...',
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

    var oldPertanyaan = document.getElementById('pertanyaan').value;
    if (oldPertanyaan) quill.root.innerHTML = oldPertanyaan;

    quill.on('text-change', function() {
        document.getElementById('pertanyaan').value = quill.root.innerHTML;
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const html = quill.root.innerHTML;
        const plain = quill.getText().trim();
        if (!plain) {
            e.preventDefault();
            alert('Kolom pertanyaan tidak boleh kosong.');
            return false;
        }
        document.getElementById('pertanyaan').value = html;
    });

    // Tambah opsi
    document.getElementById('tambah-opsi').addEventListener('click', function() {
        const container = document.getElementById('opsi-container');
        const index = container.querySelectorAll(':scope > div').length;
        const div = document.createElement('div');
        div.classList.add('d-flex', 'align-items-center', 'mb-2');
        div.innerHTML = `
            <input type="radio" name="jawaban_benar" value="${index}" class="me-2">
            <input type="text" name="opsi[]" class="form-control" placeholder="Opsi ${index + 1}" required>
            <button type="button" class="btn btn-sm btn-danger ms-2 hapus-opsi">&times;</button>
        `;
        container.appendChild(div);
    });

    // Hapus opsi dan re-index
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus-opsi')) {
            e.target.closest('div').remove();
            const items = document.querySelectorAll('#opsi-container > div');
            items.forEach(function(item, idx) {
                const radio = item.querySelector('input[type="radio"]');
                if (radio) radio.value = idx;
                const text = item.querySelector('input[type="text"]');
                if (text) text.placeholder = `Opsi ${idx + 1}`;
            });
        }
    });
});
</script>
@endsection
