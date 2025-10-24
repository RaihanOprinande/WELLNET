@extends('layouts.main')

@section('title', 'Psychoeducation')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Psychoeducation</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item">
                                        <a href="#">Quiz & Psychoeducation</a>
                                    </li>
                                    <li class="breadcrumb-item active">Psychoeducation</li>
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
                                        <h6 class="mb-10">Daftar Psychoeducation</h6>
                                    </div>
                                    <div class="right">
                                        <a href="{{ route('psychoeducation.create') }}"
                                            class="main-btn btn-sm primary-btn btn-hover mb-20">
                                            <i class="lni lni-plus"></i> Tambah Data
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="table" class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>No</h6>
                                            </th>
                                            <th>
                                                <h6>Gambar</h6>
                                            </th>
                                            <th>
                                                <h6>Judul</h6>
                                            </th>
                                            <th>
                                                <h6>Link YouTube</h6>
                                            </th>
                                            <th>
                                                <h6>Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($psychoeducation as $i => $item)
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
                                                    <p>{{ $item->summary }}</p>
                                                </td>
                                                <td>
                                                    @if ($item->link_yt)
                                                        <a href="{{ $item->link_yt }}" target="_blank"
                                                            class="text-truncate d-block mb-2" style="max-width: 250px;">
                                                            {{ $item->link_yt }}
                                                        </a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- Tombol Show --}}
                                                    <a href="{{ route('psychoeducation.show', $item->id) }}"
                                                        class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-eye"></i>
                                                    </a>

                                                    {{-- Tombol Edit --}}
                                                    <a href="{{ route('psychoeducation.edit', $item->id) }}"
                                                        class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>

                                                    {{-- Tombol Hapus --}}
                                                    <button type="button"
                                                        class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{ $item->id }}"
                                                        data-base-url="{{ route('psychoeducation.destroy', ['psychoeducation' => 0]) }}"
                                                        style="background: transparent; border: none; font-size: 1.2rem;">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> {{-- end table-responsive --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $title }} --}}
    </section>
@endsection
