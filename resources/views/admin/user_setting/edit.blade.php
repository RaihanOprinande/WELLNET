@extends('layouts.main')

@section('title', 'Edit User Setting')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit User Setting</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user_setting.index') }}">User Setting</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-layout-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <h2 class="mb-25">Form Edit User Setting</h2>

                        <form action="{{ route('user_setting.update', $user_setting->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- User & Anak --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Pilih Pengguna (Parent / Personal)</label>
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">-- Pilih User --</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id', $user_setting->user_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->username }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Pilih Anak (Opsional)</label>
                                        <select name="child_id" class="form-control @error('child_id') is-invalid @enderror">
                                            <option value="">-- Pilih Anak --</option>
                                            @foreach($children as $child)
                                                <option value="{{ $child->id }}" {{ old('child_id', $user_setting->child_id) == $child->id ? 'selected' : '' }}>
                                                    {{ $child->username ?? 'Anak #' . $child->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Jenis Kelamin & Umur --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $user_setting->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $user_setting->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Umur</label>
                                        <input type="number" name="umur" class="form-control" placeholder="Masukkan umur" value="{{ old('umur', $user_setting->umur) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Skor & Lencana --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Skor</label>
                                        <input type="number" name="skor" class="form-control" value="{{ old('skor', $user_setting->skor) }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Lencana</label>
                                        <select name="lencana" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            @foreach(['Seedling','Sprout','Explorer','Trailblazer','Mountaineer','Skywalker','Digital Sage'] as $badge)
                                                <option value="{{ $badge }}" {{ old('lencana', $user_setting->lencana) == $badge ? 'selected' : '' }}>
                                                    {{ $badge }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Waktu Tidur --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Waktu Tidur (Mulai)</label>
                                        <input type="time" name="sleep_schedule_start" class="form-control" value="{{ old('sleep_schedule_start', $user_setting->sleep_schedule_start ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Waktu Tidur (Selesai)</label>
                                        <input type="time" name="sleep_schedule_end" class="form-control" value="{{ old('sleep_schedule_end', $user_setting->sleep_schedule_end ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Digital Freetime --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Digital Freetime (Mulai)</label>
                                        <input type="time" name="digital_freetime_start" class="form-control" value="{{ old('digital_freetime_start', $user_setting->digital_freetime_start ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Digital Freetime (Selesai)</label>
                                        <input type="time" name="digital_freetime_end" class="form-control" value="{{ old('digital_freetime_end', $user_setting->digital_freetime_end ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Downtime --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-style-1">
                                        <label>Downtime (menit)</label>
                                        <input type="number" name="downtime" class="form-control" value="{{ old('downtime', $user_setting->downtime) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Submit --}}
                            <div class="col-12 mt-4">
                                <div class="button-group d-flex justify-content-end flex-wrap">
                                    <a href="{{ route('user_setting.index') }}" class="main-btn danger-btn-outline btn-hover m-2">
                                        <i class="lni lni-cross-circle"></i> Batal
                                    </a>
                                    <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                        <i class="lni lni-checkmark-circle"></i> Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
