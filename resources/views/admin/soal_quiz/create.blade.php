@extends('layouts.main')

@section('title', 'Tambah Soal Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <h2>Tambah Soal Quiz</h2>
        </div>

        {{-- Form Tambah Soal --}}
        <div class="card-style mb-30">
            <form action="{{ route('soal_quiz.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- Tema Quiz --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Tema Quiz</label>
                        <select name="temaquiz_id" class="form-control" required>
                            <option value="">-- Pilih Tema Quiz --</option>
                            @foreach($tema_quiz as $tema)
                                <option value="{{ $tema->id }}">
                                    Minggu {{ $tema->week }} : {{ $tema->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pertanyaan --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <div id="editor-container" style="height: 200px;">{!! old('pertanyaan') !!}</div>
                        <input type="hidden" name="pertanyaan" id="pertanyaan">
                    </div>

                    {{-- Opsi Jawaban --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Opsi Jawaban</label>
                        <div id="opsi-container">
                            {{-- Opsi 1 --}}
                            <div class="d-flex mb-2 align-items-center">
                                <input type="radio" name="jawaban_benar" value="0" class="me-2" required>
                                <input type="text" name="opsi[]" class="form-control" placeholder="Isi opsi 1">
                            </div>
                            {{-- Opsi 2 --}}
                            <div class="d-flex mb-2 align-items-center">
                                <input type="radio" name="jawaban_benar" value="1" class="me-2">
                                <input type="text" name="opsi[]" class="form-control" placeholder="Isi opsi 2">
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-primary" id="add-opsi">Tambah Opsi</button>
                            <button type="button" class="btn btn-sm btn-danger" id="remove-opsi">Hapus Opsi</button>
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="col-12 text-end mt-3">
                        <a href="{{ route('soal_quiz.index') }}" class="main-btn light-btn btn-hover me-2">Batal</a>
                        <button type="submit" class="main-btn primary-btn btn-hover">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
{{-- === Quill Editor === --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Quill
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Tulis pertanyaan di sini...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['link', 'image'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['clean']
            ]
        }
    });

    // Simpan isi Quill ke hidden input sebelum submit
    var form = document.querySelector('form');
    form.onsubmit = function() {
        document.querySelector('#pertanyaan').value = quill.root.innerHTML;
    };
});
</script>

{{-- === Tambah / Hapus Opsi Dinamis === --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const opsiContainer = document.getElementById('opsi-container');
    const addBtn = document.getElementById('add-opsi');
    const removeBtn = document.getElementById('remove-opsi');

    addBtn.addEventListener('click', function() {
        let index = opsiContainer.querySelectorAll('.d-flex').length;
        let newInput = document.createElement('div');
        newInput.classList.add('d-flex', 'mb-2', 'align-items-center');
        newInput.innerHTML = `
            <input type="radio" name="jawaban_benar" value="${index}" class="me-2">
            <input type="text" name="opsi[]" class="form-control" placeholder="Isi opsi ${index + 1}">
        `;
        opsiContainer.appendChild(newInput);
    });

    removeBtn.addEventListener('click', function() {
        let opsiInputs = opsiContainer.querySelectorAll('.d-flex');
        if (opsiInputs.length > 2) {
            opsiInputs[opsiInputs.length - 1].remove();
        }
    });
});
</script>
@endsection
