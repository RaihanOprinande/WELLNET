@extends('layouts.main')

@section('title', 'Edit Psychoeducation')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 mb-3">
            <h2>Edit Psychoeducation</h2>
        </div>

        <div class="card-style mb-30">
            <form action="{{ route('psychoeducation.update', $psychoeducation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Judul -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $psychoeducation->title) }}" required>
                    </div>

                    <!-- Gambar -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Gambar Sampul</label>
                        <input type="file" name="image" class="form-control">
                        @if($psychoeducation->image)
                            <small class="text-muted d-block mt-1">
                                Gambar saat ini:
                                <a href="{{ asset('storage/' . $psychoeducation->image) }}" target="_blank">Lihat</a>
                            </small>
                        @endif
                    </div>

                    <!-- Link YouTube -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Link YouTube (opsional)</label>
                        <input type="text" name="link_yt" class="form-control"
                               value="{{ old('link_yt', $psychoeducation->link_yt) }}">
                    </div>

                    <!-- Konten -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Konten</label>
                        <div id="editor-container" style="height: 250px;">{!! old('content', $psychoeducation->content) !!}</div>
                        <input type="hidden" name="content" id="content">
                    </div>

                    <!-- Tombol -->
                    <div class="col-12 text-end">
                        <a href="{{ route('psychoeducation.index') }}" class="main-btn light-btn btn-hover me-2">Batal</a>
                        <button type="submit" class="main-btn primary-btn btn-hover">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Type something...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['link'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['clean']
            ]
        }
    });

    // Saat halaman dimuat, pastikan isi lama tersimpan
    var existingContent = `{!! old('content', $psychoeducation->content) !!}`;
    quill.root.innerHTML = existingContent;

    // Simpan isi editor ke input hidden sebelum submit
    var form = document.querySelector('form');
    form.onsubmit = function() {
        document.querySelector('#content').value = quill.root.innerHTML;
    };
});
</script>
@endsection
