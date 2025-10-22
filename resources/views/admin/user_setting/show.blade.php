@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3>Detail User Setting</h3>

    <div class="card shadow-sm mt-3">
        <div class="card-body">

            <table class="table table-borderless">
                <tr>
                    <th>Pemilik Setting (User)</th>
                    <td>{{ $user_setting->user->username ?? 'Tidak diketahui' }} ({{ ucfirst($user_setting->user->role ?? '-') }})</td>
                </tr>

                <tr>
                    <th>Anak</th>
                    <td>{{ $user_setting->child->username ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $user_setting->jenis_kelamin ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Umur</th>
                    <td>{{ $user_setting->umur ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Skor</th>
                    <td>{{ $user_setting->skor ?? 0 }}</td>
                </tr>

                <tr>
                    <th>Lencana</th>
                    <td>{{ $user_setting->lencana ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Downtime</th>
                    <td>{{ $user_setting->downtime ?? '-' }} menit</td>
                </tr>

                <tr>
                    <th>Jadwal Tidur</th>
                    <td>
                        {{ $user_setting->sleep_schedule_start ?? '-' }} -
                        {{ $user_setting->sleep_schedule_end ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Waktu Bebas Digital</th>
                    <td>
                        {{ $user_setting->digital_freetime_start ?? '-' }} -
                        {{ $user_setting->digital_freetime_end ?? '-' }}
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('user_setting.edit', $user_setting->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('user_setting.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>
</div>
@endsection
