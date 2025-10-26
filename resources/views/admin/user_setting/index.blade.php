@extends('layouts.main')

@section('title', 'User Setting')

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

            {{-- Header --}}
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>User Setting</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb active">
                                    <li class="breadcrumb-item">
                                        <a href="#">User Management</a>
                                    </li>
                                    <li class="breadcrumb-item active">User Setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">

                            {{-- Header Title and Buttons --}}
                            <div class="row align-items-center">
                                <div class="title d-flex justify-content-between">
                                    <div class="left">
                                        <h6 class="mb-10">Daftar User Setting</h6>
                                    </div>
                                    {{-- <div class="right">
                                        <a href="{{ route('user_setting.createPersonal') }}"
                                            class="main-btn btn-sm primary-btn btn-hover mb-20 me-2">
                                            <i class="lni lni-user"></i> Tambah Personal
                                        </a>
                                        <a href="{{ route('user_setting.createChildren') }}"
                                            class="main-btn btn-sm success-btn btn-hover mb-20">
                                            <i class="lni lni-users"></i> Tambah Children
                                        </a>
                                    </div> --}}
                                </div>
                            </div>

                            {{-- Table --}}
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
                                                <h6>Email</h6>
                                            </th>
                                            <th>
                                                <h6>Jenis Kelamin</h6>
                                            </th>
                                            <th>
                                                <h6>Umur</h6>
                                            </th>
                                            <th>
                                                <h6>Skor</h6>
                                            </th>
                                            <th>
                                                <h6>Lencana</h6>
                                            </th>
                                            <th>
                                                <h6>Downtime</h6>
                                            </th>
                                            <th>
                                                <h6>Sleep Schedule</h6>
                                            </th>
                                            <th>
                                                <h6>Digital Freetime</h6>
                                            </th>
                                            <th class="col-aksi">
                                                <h6 class="col-aksi">Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($settings as $i => $setting)
                                            @php
                                                $user = $setting->user;
                                                $children = $user->children ?? [];
                                            @endphp
                                            <tr>
                                                <td>
                                                    <h6>{{ $i + 1 }}</h6>
                                                </td>

                                                {{-- Username --}}
                                                <td>
                                                    {{-- @if ($user->role === 'personal') --}}
                                                    <p>{{ $user->name }}</p>
                                                    {{-- @elseif ($user->role === 'parent')
                                                        @if (count($children) > 0)
                                                            @foreach ($children as $child)
                                                                <p>{{ $child->name }}</p>
                                                            @endforeach
                                                        @else
                                                            <em class="text-muted">Tidak ada anak</em>
                                                        @endif
                                                    @endif --}}
                                                </td>

                                                {{-- Email --}}
                                                <td>
                                                    @if ($user->role === 'personal')
                                                        <p>{{ $user->email }}</p>
                                                    @elseif ($user->role === 'parent')
                                                        @if (count($children) > 0)
                                                            @foreach ($children as $child)
                                                                <p>{{ $child->email }} <br><small class="text-muted">email
                                                                        orang tua: {{ $user->email }}</small></p>
                                                            @endforeach
                                                        @else
                                                            <em class="text-muted">-</em>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td>
                                                    <p>{{ $setting->jenis_kelamin ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $setting->umur ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $setting->skor ?? '-' }}</p>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info text-dark">
                                                        {{ $setting->lencana ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <p>{{ $setting->downtime ? $setting->downtime . ' menit' : '-' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $setting->sleep_schedule_start }} -
                                                        {{ $setting->sleep_schedule_end }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $setting->digital_freetime_start }} -
                                                        {{ $setting->digital_freetime_end }}</p>
                                                </td>

                                                {{-- Aksi --}}
                                                <td class="col-aksi">
                                                    <a href="{{ route('user_setting.edit', $setting->id) }}"
                                                        class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('user_setting.destroy', $setting->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-danger p-1 rounded hover-bg-danger transition"
                                                            style="background: transparent; border: none; font-size: 1.2rem;"
                                                            onclick="return confirm('Yakin hapus data ini?')">
                                                            <i class="lni lni-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> {{-- End Table --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
