@extends('layouts.main')

@section('title', 'Edit Soal Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <h2>Edit Soal Quiz</h2>
        </div>

        {{-- Form Edit --}}
        <div class="card-style mb-30">
            <form action="{{ route('soal_quiz.update', $soal_quiz->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    {{-- Tema Quiz --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Tema Quiz</label>
                        <select name="temaquiz_id" class="form-control" required>
                            @foreach($tema_quiz as $tema)
                                <option value="{{ $tema->id }}" {{ $soal_quiz->temaquiz_id == $tema->id ? 'selected' : '' }}>
                                    Minggu {{ $tema->week }} : {{ $tema->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pertanyaan --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Pertanyaan</label>
                        <div id="editor-container" style="height: 200px;">{!! $soal_quiz->pertanyaan !!}</div>
                        <input type="hidden" name="pertanyaan" id="pertanyaan">
                    </div>

                    {{-- Opsi Jawaban --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Opsi Jawaban</label>
                        <div id="opsi-container">
                            @foreach($soal_quiz->opsi as $index => $opsi)
                        <div class="d-flex mb-2 align-items-center">
                            <input type="radio" name="jawaban_benar" value="{{ $index }}"
                                class="me-2" {{ $opsi->is_correct ? 'checked' : '' }}>
                            <input type="text" name="opsi[]" class="form-control"
                                value="{{ $opsi->opsi }}" placeholder="Isi opsi {{ $index + 1 }}">
                        </div>
                        @endforeach

                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-primary" id="add-opsi">Tambah Opsi</button>
                            <button type="button" class="btn btn-sm btn-danger" id="remove-opsi">Hapus Opsi</button>
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="col-12 text-end mt-3">
                        <a href="{{ route('soal_quiz.index') }}" class="main-btn light-btn btn-hover me-2">Batal</a>
                        <button type="submit" class="main-btn primary-btn btn-hover">Update</button>
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
    var quill = new Quill('#editor-container', {
        theme: 'snow',
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
