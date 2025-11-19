@extends('layouts.main')

@section('title', 'Log Pelanggaran')

@section('content')

<style>
    /* Perbaikan ukuran grafik badge agar tidak terlalu besar */
    #badgeChart {
        max-height: 300px !important;
        margin: 0 auto;
        padding: 20px;
    }

    .chart-container-sm {
        position: relative;
        height: 300px;
        width: 100%;
    }
</style>
<section class="section">
    <div class="container-fluid">
        <style>
            .col-aksi {
                min-width: 100px;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>

            {{-- Header --}}
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Log Pelanggaran User</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item">
                                        <a href="#">Monitoring</a>
                                    </li>
                                    <li class="breadcrumb-item active">Log Pelanggaran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

         <div class="col-lg-12">
    <div class="card-style mb-30">
        <h5 class="mb-3">Grafik Pelanggaran Per Kategori (Bulanan)</h5>
        <div class="chart-container-sm">
            <canvas id="kategoriChart"></canvas>
        </div>
    </div>
</div>

        {{-- Tabel --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-10">Daftar Log Pelanggaran</h6>
                            </div>

                        <div class="table-responsive">
                            <table id="table" class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><h6>No</h6></th>
                                        <th><h6>Nama User / Anak</h6></th>
                                        <th><h6>Pelanggaran</h6></th>
                                        <th><h6>Jenis</h6></th>
                                        <th><h6>Waktu</h6></th>
                                        <th class="col-aksi"><h6 class="col-aksi">Aksi</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $i => $log)
                                    <tr>
                                        <td><h6>{{ $i + 1 }}</h6></td>
                                        <td>
                                            <p>
                                                @if ($log->setting && $log->setting->child)
                                                    {{ $log->setting->child->username }}
                                                @elseif ($log->setting && $log->setting->user)
                                                    {{ $log->setting->user->username }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td><p>{{ $log->pelanggaran }}</p></td>
                                        <td>
                                            <p>
                                                @if ($log->setting && $log->setting->child_id)
                                                    Anak
                                                @else
                                                    Personal
                                                @endif
                                            </p>
                                        </td>
                                        <td><p>{{ $log->created_at->format('Y-m-d H:i:s') }}</p></td>
                                        <td class="col-aksi">
                                            <a href="{{ route('log_pelanggaran.show', $log->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                            {{-- <a href="{{ route('log_pelanggaran.edit', $log->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('log_pelanggaran.destroy', $log->id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                            </form> --}}
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
    </div>
</section>

<script>
    /** ====================
     *  GRAFIK PELANGGARAN PER KATEGORI
     * ===================== */
    const kategoriLabels = @json($kategoriLabels);
    const kategoriValues = @json($kategoriValues);

    new Chart(document.getElementById('kategoriChart'), {
        type: 'bar',
        data: {
            labels: kategoriLabels,
            datasets: [{
                label: 'Jumlah Pelanggaran Bulan Ini',
                data: kategoriValues,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // Horizontal bar chart agar mudah dibaca
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

@endsection
