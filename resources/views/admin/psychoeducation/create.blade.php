@extends('layouts.main')

@section('title', 'Tambah Psychoeducation')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30 mb-3">
                <h2>Tambah Psychoeducation</h2>
            </div>

            <div class="card-style mb-30">
                <form action="{{ route('psychoeducation.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Gambar Sampul</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Link YouTube (opsional)</label>
                            <input type="text" name="link_yt" class="form-control" value="{{ old('link_yt') }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Konten</label>
                            <div id="editor-container" style="height: 250px;">{!! old('content') !!}</div>
                            <input type="hidden" name="content" id="content">
                        </div>


                        <div class="col-12 text-end">
                            <a href="{{ route('psychoeducation.index') }}"
                                class="main-btn light-btn btn-hover me-2">Batal</a>
                            <button type="submit" class="main-btn primary-btn btn-hover">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Tambahkan TinyMCE (atau Summernote) --}}
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Type something...',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['clean']
                    ]
                }
            });

            // Simpan isi Quill ke input hidden sebelum submit
            var form = document.querySelector('form');
            form.onsubmit = function() {
                document.querySelector('#content').value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
