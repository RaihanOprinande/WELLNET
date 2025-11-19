@extends('layouts.main')

@section('title', 'Log Quiz')

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
                        <h2>Log Quiz User</h2>
                        <p class="text-muted">Analisis pengerjaan quiz per minggu</p>
                    </div>
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

        {{-- Grafik Progres Quiz --}}
<div class="card-style mb-30">
    <h6 class="mb-3">Progres & Akurasi Quiz per Minggu</h6>
    <canvas id="quizChart" height="120"></canvas>
</div>



        {{-- Tabel --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="row align-items-center">
                            <div class="title d-flex justify-content-between">
                                <div class="left">
                                    <h6 class="mb-10">Daftar Log Quiz</h6>
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
                                                <h6>Username</h6>
                                            </th>
                                            <th>
                                                <h6>Pertanyaan</h6>
                                            </th>
                                            <th>
                                                <h6>Week</h6>
                                            </th>
                                            <th>
                                                <h6>Tema Quiz</h6>
                                            </th>
                                            <th>
                                                <h6>Jawaban Pengguna</h6>
                                            </th>
                                            <th>
                                                <h6>Jawaban Benar</h6>
                                            </th>
                                            <th>
                                                <h6>Waktu</h6>
                                            </th>
                                            <th class="col-aksi">
                                                <h6 class="col-aksi">Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($log_quiz as $i => $item)
                                            <tr>
                                                <td>
                                                    <h6>{{ $i + 1 }}</h6>
                                                </td>

                                                {{-- Username / Nama Anak --}}
                                                <td>
                                                    <p>
                                                        @if ($item->setting && $item->setting->child)
                                                            {{ $item->setting->child->nama_anak }}
                                                        @elseif ($item->setting && $item->setting->user)
                                                            {{ $item->setting->user->username }}
                                                        @else
                                                            -
                                                        @endif
                                                    </p>
                                                </td>

                                                <td>
                                                    <p>{{ Str::limit(strip_tags($item->soal->pertanyaan), 30) ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->tema->week ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->tema->title ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->opsi->opsi }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $jawaban_benar_collection }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $item->created_at->format('Y-m-d H:i:s') }}</p>
                                                </td>
                                                <td class="col-aksi">
                                                    <a href="{{ route('log_quiz.show', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-3">
                            {{ $log_quiz->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json($labels->values());
    const completionData = @json(array_values($completion->toArray()));
    const accuracyData = @json(array_values($accuracy->toArray()));

    const ctx = document.getElementById('quizChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Jumlah User Selesai',
                    data: completionData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Akurasi (%)',
                    data: accuracyData,
                    type: 'line',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            scales: {
                y: {
                    type: 'linear',
                    position: 'left',
                    title: { display: true, text: 'Jumlah User' }
                },
                y1: {
                    type: 'linear',
                    position: 'right',
                    min: 0,
                    max: 100,
                    ticks: { callback: val => val + '%' },
                    title: { display: true, text: 'Akurasi (%)' },
                    grid: { drawOnChartArea: false }
                }
            }
        }
    });
</script>

@endsection
