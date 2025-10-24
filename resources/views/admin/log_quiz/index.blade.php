@extends('layouts.main')

@section('title', 'Log Quiz')

@section('content')
    <section class="section">
        <div class="container-fluid">

            {{-- Header --}}
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Log Quiz User</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item"><a href="#">Quiz & Psychoeducation</a></li>
                                    <li class="breadcrumb-item active">Log Quiz</li>
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
                                        <h6 class="mb-10">Log Quiz</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="table" class="table align-middle nowrap" style="width: 100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Pertanyaan</th>
                                            <th>Week</th>
                                            <th>Tema Quiz</th>
                                            <th>Jawaban User</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($log_quiz as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $item->user->name ?? '-' }}</td>
                                                {{-- <td class="text-truncate" style="max-width: 300px;"> --}}
                                                <td>
                                                    {{ Str::limit(strip_tags($item->soal->pertanyaan), 30) ?? '-' }}
                                                </td>
                                                <td>{{ $item->tema->week ?? '-' }}</td>
                                                <td>{{ $item->tema->title ?? '-' }}</td>
                                                <td>{{ $item->jawaban_user }}</td>
                                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
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
