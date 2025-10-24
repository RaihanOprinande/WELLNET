@extends('layouts.main')

@section('title', 'Detail Psychoeducation')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Detail Psychoeducation</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('psychoeducation.index') }}" class="main-btn light-btn btn-hover">
                            <i class="lni lni-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-style mb-30 p-4">
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        @if ($psychoeducation->image)
                            <img src="{{ asset('storage/' . $psychoeducation->image) }}" alt="Image"
                                class="rounded shadow" style="max-width: 400px;">
                        @else
                            <p class="text-muted">Tidak ada gambar</p>
                        @endif
                    </div>

                    <div class="mb-3" style="word-break: break-word; overflow-wrap: break-word;">
                        <h4>{{ $psychoeducation->title }}</h4>
                        @if ($psychoeducation->link_yt)
                            <p class="mt-2">
                                <strong>Link YouTube:</strong>
                                <a href="{{ $psychoeducation->link_yt }}"
                                    target="_blank">{{ $psychoeducation->link_yt }}</a>
                            </p>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <h5>Konten</h5>
                        <div class="border rounded p-3 mt-2">
                            {!! $psychoeducation->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
