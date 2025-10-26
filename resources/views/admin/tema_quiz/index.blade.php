@extends('layouts.main')

@section('title', 'Tema Quiz')

@section('content')
    <section class="section">
        <div class="container-fluid">
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
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Tema Quiz</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item">
                                        <a href="#">Quiz & Psychoeducation</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tema Quiz</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div class="row align-items-center">
                                <div class="title d-flex justify-content-between">
                                    <div class="left">
                                        <h6 class="mb-10">Daftar Tema Quiz</h6>
                                    </div>
                                    <div class="right">
                                        <button class="main-btn btn-sm primary-btn btn-hover mb-20" data-bs-toggle="modal"
                                            data-bs-target="#createModaltemaQuiz">
                                            <i class="lni lni-plus"></i> Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="table" class="table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>No</h6>
                                            </th>
                                            <th>
                                                <h6>Gambar Sampul</h6>
                                            </th>
                                            <th>
                                                <h6>Judul</h6>
                                            </th>
                                            <th>
                                                <h6>Topik</h6>
                                            </th>
                                            <th>
                                                <h6>Materi Relevan</h6>
                                            </th>
                                            <th>
                                                <h6>Minggu</h6>
                                            </th>
                                            <th class="col-aksi">
                                                <h6 class="col-aksi">Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tema_quiz as $i => $item)
                                            <tr>
                                                <td>
                                                    <h6>{{ $i + 1 }}</h6>
                                                </td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" width="70"
                                                            class="rounded" alt="gambar">
                                                    @else
                                                        <span class="text-muted">Tidak ada</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p>{{ Str::limit(strip_tags($item->title), 30) }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ Str::limit(strip_tags($item->topik), 30) }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ Str::limit(strip_tags($item->materi_relevan), 30) }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->week }}</p>
                                                </td>
                                                <td class="col-aksi">
                                                    {{-- Tombol Edit: Ikon polos --}}
                                                    <a href="{{ route('tema_quiz.edit', $item->id) }}"
                                                        class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>

                                                    {{-- Tombol Hapus: Pemicu modal dengan placeholder ID --}}
                                                    <button type="button"
                                                        class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{ $item->id }}"
                                                        data-base-url="{{ route('tema_quiz.destroy', ['tema_quiz' => 0]) }}"
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

    {{-- Memanggil modal form create (Form ini tetap di sini) --}}
    @include('admin.tema_quiz.create')

@endsection
