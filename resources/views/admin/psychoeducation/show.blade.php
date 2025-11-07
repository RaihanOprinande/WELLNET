@extends('layouts.main')

@section('title', 'Detail Psychoeducation')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Detail Psychoeducation</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('psychoeducation.index') }}">Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Detail --}}
        <div class="card-style mb-30 p-4">
            {{-- Gambar --}}
            <div class="row mb-4">
                <div class="col-12 text-center">
                    @if ($psychoeducation->image)
                        <img src="{{ asset('storage/' . $psychoeducation->image) }}"
                             alt="Gambar Psychoeducation"
                             class="rounded shadow" style="max-width: 400px;">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </div>
            </div>

            {{-- Judul & Link YouTube --}}
            <div class="row mb-3">
                <div class="col-12">
                    <h4>{{ $psychoeducation->title }}</h4>
                    @if ($psychoeducation->link_yt)
                        <p class="mt-2">
                            <strong>Link YouTube:</strong>
                            <a href="{{ $psychoeducation->link_yt }}" target="_blank">
                                {{ $psychoeducation->link_yt }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>

            {{-- Konten --}}
            <div class="row">
                <div class="col-12">
                    <h5>Konten</h5>
                    <div class="border rounded p-3 mt-2" style="background-color: #f9f9f9; word-break: break-word; overflow-wrap: break-word;">
                        {!! $psychoeducation->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
