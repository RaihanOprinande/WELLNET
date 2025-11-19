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
                        <div class="icon primary"><i class="lni lni-trash-can"></i></div>
                        <div class="content">
                            <h6 class="mb-10">Pelanggaran Terbanyak</h6>
    <h3 class="text-bold mb-10">{{ $pelanggaranTerbanyakNama }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success"><i class="lni lni-laptop-phone"></i></div>
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
                        <h5 class="mb-3">Grafik Pelanggaran Pengguna Mingguan</h5>
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

                <!-- Top 5 Aplikasi (Pie Chart) -->
<div class="col-lg-4">
    <div class="card-style mb-30">
        <h5 class="mb-3">Top 5 Aplikasi Paling Sering Dipakai</h5>
        <div class="chart-container-sm">
            <canvas id="topAppChart"></canvas>
        </div>
    </div>
</div>

                <!-- Grafik Mingguan Quiz -->
<div class="col-lg-8">
    <div class="card-style mb-30">
        <h5 class="mb-3">Grafik Pengguna Mengerjakan Quiz Mingguan</h5>
        <div class="chart-container-sm">
            <canvas id="quizChart"></canvas>
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
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
 *  GRAFIK QUIZ HARIAN
 * ===================== */
const quizDailyData = @json($quizChartData);
const quizDailyLabels = quizDailyData.map(item => item.label);
const quizDailyValues = quizDailyData.map(item => item.value);

const ctxQuiz = document.getElementById('quizChart').getContext('2d');

new Chart(ctxQuiz, {
    type: 'bar',
    data: {
        labels: quizDailyLabels,
        datasets: [{
            label: 'Jumlah User Mengerjakan Quiz',
            data: quizDailyValues,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah User' }
            }
        }
    }
});


    /** ====================
     *  TOP 5 APLIKASI (PIE CHART)
     * ===================== */
    const topAppLabels = @json($topAppLabels);
    const topAppValues = @json($topAppValues);

    new Chart(document.getElementById('topAppChart'), {
        type: 'pie',
        data: {
            labels: topAppLabels,
            datasets: [{
                data: topAppValues,
                backgroundColor: [
                    '#6C5CE7',
                    '#00B894',
                    '#0984E3',
                    '#FD79A8',
                    '#E17055'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });



    </script>

    @endsection
