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
                            <h3 class="text-bold mb-10">34567</h3>
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
                            <h6 class="mb-10">Top User</h6>
                            <h3 class="text-bold mb-10">Hydtech</h3>
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
                            <canvas id="Chart2"
                                style="width: 663px; height: 400px; margin-left: -35px; display: block; box-sizing: border-box;"
                                width="1326" height="800"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container -->
    </section>

@endsection
