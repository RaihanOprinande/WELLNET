@extends('layouts.main')

@section('title', 'User Setting')

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
                        <h2>User Setting</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="#">Users</a>
                                </li>
                                <li class="breadcrumb-item active">User Setting</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="row align-items-center">
                            <div class="title d-flex justify-content-between">
                                <div class="left">
                                    <h6 class="mb-10">Daftar User Setting</h6>
                                </div>
                                {{-- <div class="right">
                                    <a href="{{ route('user_setting.createPersonal') }}"
                                        class="main-btn btn-sm primary-btn btn-hover mb-20 me-2">
                                        <i class="lni lni-plus"></i> Tambah Personal
                                    </a>
                                    <a href="{{ route('user_setting.createChildren') }}"
                                        class="main-btn btn-sm primary-btn btn-hover mb-20">
                                        <i class="lni lni-plus"></i> Tambah Children
                                    </a>
                                </div> --}}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table" class="table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><h6>No</h6></th>
                                        <th><h6>Username</h6></th>
                                        <th><h6>Email</h6></th>
                                        <th><h6>Role</h6></th>
                                        <th><h6>Jenis Kelamin</h6></th>
                                        <th><h6>Umur</h6></th>
                                        <th><h6>Skor</h6></th>
                                        <th><h6>Lencana</h6></th>
                                        <th><h6>Downtime</h6></th>
                                        <th><h6>Sleep Schedule</h6></th>
                                        <th><h6>Digital Freetime</h6></th>
                                        <th class="col-aksi"><h6>Aksi</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $i => $setting)
                                        @php
                                            $user = $setting->user;
                                            $child = $setting->child;
                                        @endphp

                                        {{-- Hanya tampilkan personal dan children --}}
                                        @if ($user && $user->role === 'personal')
                                            <tr>
                                                <td><h6>{{ $i + 1 }}</h6></td>
                                                <td><p>{{ $user->username }}</p></td>
                                                <td><p>{{ $user->email }}</p></td>
                                                <td><span class="badge bg-primary">Personal</span></td>
                                                <td><p>{{ $setting->jenis_kelamin ?? '-' }}</p></td>
                                                <td><p>{{ $setting->umur ?? '-' }}</p></td>
                                                <td><p>{{ $setting->skor ?? '-' }}</p></td>
                                                <td>
                                                    <span class="badge bg-info text-dark">
                                                        {{ $setting->lencana ?? '-' }}
                                                    </span>
                                                </td>
                                                <td><p>{{ $setting->downtime ? $setting->downtime . ' menit' : '-' }}</p></td>
                                                <td><p>{{ $setting->sleep_schedule_start ?? '-' }} - {{ $setting->sleep_schedule_end ?? '-' }}</p></td>
                                                <td><p>{{ $setting->digital_freetime_start ?? '-' }} - {{ $setting->digital_freetime_end ?? '-' }}</p></td>
                                                <td class="col-aksi">
                                                    <a href="{{ route('user_setting.show', $setting->id) }}"
                                                        class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-eye"></i>
                                                    </a>
                                                    <a href="{{ route('user_setting.edit', $setting->id) }}"
                                                        class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{ $setting->id }}"
                                                        data-base-url="{{ route('user_setting.destroy', ['user_setting' => 0]) }}"
                                                        style="background: transparent; border: none; font-size: 1.2rem;">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        @elseif ($child)
                                            <tr>
                                                <td><h6>{{ $i + 1 }}</h6></td>
                                                <td><p>{{ $child->username ?? '-' }}</p></td>
                                                <td>
                                                    <p>{{ $child->email ?? '-' }}</p>
                                                    <small class="text-muted">(Parent: {{ $child->parent->email ?? '-' }})</small>
                                                </td>
                                                <td><span class="badge bg-success">Children</span></td>
                                                <td><p>{{ $setting->jenis_kelamin ?? '-' }}</p></td>
                                                <td><p>{{ $setting->umur ?? '-' }}</p></td>
                                                <td><p>{{ $setting->skor ?? '-' }}</p></td>
                                                <td>
                                                    <span class="badge bg-info text-dark">
                                                        {{ $setting->lencana ?? '-' }}
                                                    </span>
                                                </td>
                                                <td><p>{{ $setting->downtime ? $setting->downtime . ' menit' : '-' }}</p></td>
                                                <td><p>{{ $setting->sleep_schedule_start ?? '-' }} - {{ $setting->sleep_schedule_end ?? '-' }}</p></td>
                                                <td><p>{{ $setting->digital_freetime_start ?? '-' }} - {{ $setting->digital_freetime_end ?? '-' }}</p></td>
                                                <td class="col-aksi">
                                                    <a href="{{ route('user_setting.show', $setting->id) }}"
                                                        class="text-info p-1 me-1 rounded hover-bg-info transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-eye"></i>
                                                    </a>
                                                    <a href="{{ route('user_setting.edit', $setting->id) }}"
                                                        class="text-warning p-1 me-1 rounded hover-bg-warning transition"
                                                        style="font-size: 1.2rem;">
                                                        <i class="lni lni-pencil"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="delete-button text-danger p-1 me-1 rounded hover-bg-danger transition"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{ $setting->id }}"
                                                        data-base-url="{{ route('user_setting.destroy', ['user_setting' => 0]) }}"
                                                        style="background: transparent; border: none; font-size: 1.2rem;">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
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
