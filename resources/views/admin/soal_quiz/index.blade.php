@extends('layouts.main')

@section('title', 'Soal Quiz')

@section('content')

    <section class="section">
        <style>
            .col-aksi {
                /* Lebar minimum untuk menampung dua ikon dan padding, misalnya 80px */
                min-width: 80px;
                /* Memastikan konten di dalam <td> TIDAK PERNAH memecah baris */
                white-space: nowrap;
                /* Menghentikan konten meluber keluar (opsional, tergantung tema) */
                overflow: hidden;
            }
        </style>
        <div class="container-fluid">

            {{-- Header Judul & Breadcrumb --}}
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Soal Quiz</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item"><a href="#">Quiz & Psychoeducation</a></li>
                                    <li class="breadcrumb-item active">Soal Quiz</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Data --}}
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6>Daftar Soal Quiz</h6>
                                <a href="{{ route('soal_quiz.create') }}" class="main-btn btn-sm primary-btn btn-hover">
                                    <i class="lni lni-plus"></i> Tambah Data
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="table" class="table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>No</h6>
                                            </th>
                                            <th>
                                                <h6>Tema Quiz</h6>
                                            </th>
                                            <th>
                                                <h6>Minggu Ke-</h6>
                                            </th>
                                            <th>
                                                <h6>Pertanyaan</h6>
                                            </th>
                                            <th>
                                                <h6>Jawaban Benar</h6>
                                            </th>
                                            <th class="col-aksi">
                                                <h6 class="col-aksi">Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($soal_quiz as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $item->tema->title ?? '-' }}</td>
                                                <td>{{ $item->tema->week ?? '-' }}</td>
                                                <td>{{ Str::limit(strip_tags($item->pertanyaan), 40) }}</td>
                                                <td>{{ Str::limit(strip_tags($item->jawaban_benar), 20) }}</td>
                                                <td class="col-aksi">
                                                    {{-- Tombol Show: Ikon biru polos --}}
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
