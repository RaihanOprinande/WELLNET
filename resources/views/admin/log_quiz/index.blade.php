@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Log Quiz User</h4>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Pertanyaan</th>
                        <th>Week</th>
                        <th>Tema Quiz</th>
                        <th>Jawaban User</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log_quiz as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->soal->pertanyaan ?? '-' }}</td>
                            <td>{{ $item->tema->week ?? '-' }}</td>
                            <td>{{ $item->tema->title ?? '-' }}</td>
                            <td>{{ $item->jawaban_user }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "pageLength": 10,
            "ordering": true
        });
    });
</script>
@endpush
@endsection
