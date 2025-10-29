@extends('layouts.main')

@section('title', 'Edit Data Anak')

@section('content')
<section class="section">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="title-wrapper pt-30 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Edit Data Anak</h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb active">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user_children.index') }}">Users Anak</a>
                                </li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Form --}}
        <div class="form-layout-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30 p-4">
                        <h2 class="mb-25">Form Edit Data Anak</h2>

                        <form action="{{ route('user_children.update', $user_child->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                {{-- Parent --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Pilih Parent</label>
                                        <select name="parent_id" class="form-select" required>
                                            <option value="">-- Pilih Parent --</option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}" {{ old('parent_id', $user_child->parent_id) == $parent->id ? 'selected' : '' }}>
                                                    {{ $parent->fullname ?? $parent->username }} ({{ $parent->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Username --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Nama Anak</label>
                                        <input type="text" name="username" class="form-control"
                                               placeholder="Masukkan nama anak" value="{{ old('username', $user_child->username) }}" required>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Email Anak</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Masukkan email" value="{{ old('email', $user_child->email) }}" required>
                                    </div>
                                </div>

                                {{-- Profile --}}
                                <div class="col-md-6">
                                    <div class="input-style-1 mb-3">
                                        <label>Foto Profil <small class="text-muted">(Opsional)</small></label>
                                        <div class="mb-2 text-center">
                                            <img id="profilePreview"
                                                 src="{{ $user_child->profile ? asset('storage/' . $user_child->profile) : asset('images/default-avatar.png') }}"
                                                 alt="Profile" class="rounded-circle" style="width:120px; height:120px; object-fit:cover;">
                                        </div>
                                        <input type="file" name="profile" class="form-control" accept="image/*" onchange="previewProfile(event)">
                                    </div>
                                </div>

                            </div>

                            {{-- Buttons --}}
                            <div class="col-12 mt-4">
                                <div class="button-group d-flex justify-content-end flex-wrap">
                                    <a href="{{ route('user_children.index') }}" class="main-btn danger-btn-outline btn-hover m-2">
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

{{-- Preview Image Script --}}
<script>
function previewProfile(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('profilePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
