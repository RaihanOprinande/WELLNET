@extends('layouts.main')

@section('title', 'Soal Quiz')

@section('content')
<section class="section">
    <div class="container-fluid">
        <style>
            .col-aksi {
                min-width: 80px;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>

        {{-- Header --}}
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Soal Quiz</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="#">Quiz & Psychoeducation</a>
                                </li>
                                <li class="breadcrumb-item active">Soal Quiz</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="row align-items-center">
                            <div class="title d-flex justify-content-between">
                                <div class="left">
                                    <h6 class="mb-10">Daftar Soal Quiz</h6>
                                </div>
                                <div class="right">
                                    <a href="{{ route('soal_quiz.create') }}"
                                        class="main-btn btn-sm primary-btn btn-hover mb-20">
                                        <i class="lni lni-plus"></i> Tambah Data
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table" class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><h6>No</h6></th>
                                        <th><h6>Tema Quiz</h6></th>
                                        <th><h6>Minggu Ke-</h6></th>
                                        <th><h6>Pertanyaan</h6></th>
                                        <th><h6>Jawaban Benar</h6></th>
                                        <th class="col-aksi"><h6 class="col-aksi">Aksi</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soal_quiz as $i => $item)
                                    <tr>
                                        <td><h6>{{ $i + 1 }}</h6></td>
                                        <td><p>{{ $item->tema->title ?? '-' }}</p></td>
                                        <td><p>{{ $item->tema->week ?? '-' }}</p></td>
                                        <td><p>{{ Str::limit(strip_tags($item->pertanyaan), 40) }}</p></td>
                                        <td><p>{{ Str::limit(strip_tags($item->jawaban_benar), 20) }}</p></td>
                                        <td class="col-aksi">
                                            {{-- Tombol Lihat --}}
                                            <a href="{{ route('soal_quiz.show', $item->id) }}"
                                                class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                style="font-size: 1.2rem;">
                                                <i class="lni lni-eye"></i>
                                            </a>

                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('soal_quiz.edit', $item->id) }}"
                                                class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                style="font-size: 1.2rem;">
                                                <i class="lni lni-pencil"></i>
                                            </a>

                                            {{-- Tombol Hapus --}}
                                            <button type="button"
                                                class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                data-id="{{ $item->id }}"
                                                data-base-url="{{ route('soal_quiz.destroy', ['soal_quiz' => 0]) }}"
                                                style="background: transparent; border: none; font-size: 1.2rem;">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
