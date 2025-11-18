@extends('layouts.main')

@section('title', 'Dashboard')
@section('content')

    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h3>Selamat Datang, {{ Auth::user()->username ?? Auth::user()->email }}</h3>
                            <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong>.</p>
                        </div>

                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-users"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Jumlah Pengguna</h6>
                            <h3 class="text-bold mb-10">{{ $JumlahPengguna ?? '-' }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-alarm-clock"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Rata-rata Pemakaian</h6>
                            <h3 class="text-bold mb-10">4,5 jam</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-laptop-phone"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Aplikasi Favorit Users</h6>
                            <h3 class="text-bold mb-10">Instagram</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Top Skor User</h6>
                            <h3 class="text-bold mb-10">{{ $namaPengguna ?? '-' }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-style mb-30">
                        <div class="chart">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container -->
    </section>
    <script>
        const data = @json($chartData);
        const label = data.map(item => item.label);
        const pelanggaran = data.map(item => item.value);


        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: pelanggaran,
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.5)',
                        // 'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // 'rgba(75, 192, 192, 0.5)',
                        // 'rgba(153, 102, 255, 0.5)',
                        // 'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Pelanggaran'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Hari'
                        }
                    }
                }
            }
        });
    </script>

@endsection
