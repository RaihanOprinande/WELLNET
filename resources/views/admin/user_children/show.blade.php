@extends('layouts.main')

@section('title', 'Detail Data Anak')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30 mb-3">
            <h2>Detail Data Anak</h2>
        </div>

        <div class="card p-4">
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Anak</label>
                <p class="form-control-plaintext">{{ $user_child->username }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email Anak</label>
                <p class="form-control-plaintext">{{ $user_child->email }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Parent</label>
                <p class="form-control-plaintext">
                    {{ $user_child->parent?->username ?? '-' }} ({{ $user_child->parent?->email ?? 'Tidak Ditemukan' }})
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Dibuat Pada</label>
                <p class="form-control-plaintext">{{ $user_child->created_at->format('d M Y H:i') }}</p>
            </div>

            <div class="text-end">
                <a href="{{ route('user_children.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('user_children.edit', $user_child->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</section>
@endsection
