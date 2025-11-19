@extends('layouts.main')

@section('title', 'Dashboard')
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

        <!-- Header -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Selamat Datang, {{ Auth::user()->username ?? Auth::user()->email }}</h3>
                    <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong>.</p>
                </div>

                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Statistik -->
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple"><i class="lni lni-users"></i></div>
                    <div class="content">
                        <h6 class="mb-10">Jumlah Pengguna</h6>
                        <h3 class="text-bold mb-10">{{ $JumlahPengguna ?? '-' }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary"><i class="lni lni-alarm-clock"></i></div>
                    <div class="content">
                        <h6 class="mb-10">Rata-rata Pemakaian</h6>
                        <h3 class="text-bold mb-10">4,5 jam</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary"><i class="lni lni-laptop-phone"></i></div>
                    <div class="content">
                        <h6 class="mb-10">Aplikasi Favorit Users</h6>
                        <h3 class="text-bold mb-10">Instagram</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon orange"><i class="lni lni-user"></i></div>
                    <div class="content">
                        <h6 class="mb-10">Top Skor User</h6>
                        <h3 class="text-bold mb-10">{{ $namaPengguna ?? '-' }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Mingguan -->
        <div class="row">
            <div class="col-lg-7">
                <div class="card-style mb-30">
                    <h5 class="mb-3">Grafik Pelanggaran Mingguan</h5>
                    <div class="chart-container-sm">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Lencana -->
            <div class="col-lg-5">
                <div class="card-style mb-30">
                    <h5 class="mb-3">Distribusi Lencana Pengguna</h5>
                    <div class="chart-container-sm">
                        <canvas id="badgeChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
    <div class="card-style mb-30">
        <h5 class="mb-3">Pelanggaran Per Kategori (Bulanan)</h5>
        <div class="chart-container-sm">
            <canvas id="kategoriChart"></canvas>
        </div>
    </div>
</div>

        </div>

    </div>
</section>

<script>
    /** ====================
     *  GRAFIK PELANGGARAN
     * ===================== */
    const data = @json($chartData);
    const label = data.map(item => item.label);
    const pelanggaran = data.map(item => item.value);

    new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Jumlah Pelanggaran',
                data: pelanggaran,
                backgroundColor: 'rgba(255, 206, 86, 0.5)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true },
            }
        }
    });

    /** ====================
     *  GRAFIK LENCA
     * ===================== */
    const badgeLabels = @json($lencanaLabels);
    const badgeValues = @json($lencanaValues);

    new Chart(document.getElementById('badgeChart'), {
        type: 'doughnut',
        data: {
            labels: badgeLabels,
            datasets: [{
                data: badgeValues,
                backgroundColor: [
                    '#6C5CE7',
                    '#00B894',
                    '#0984E3',
                    '#FD79A8',
                    '#E17055',
                    '#74B9FF',
                    '#55EFC4'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%', // tampilan lebih modern
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 15 }
                }
            }
        }
    });

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
            label: 'Jumlah Pelanggaran',
            data: kategoriValues,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y', // BAR CHART HORIZONTAL (lebih enak dibaca)
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
