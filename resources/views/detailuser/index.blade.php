@extends('layout.index')
@section('title', 'Detail Pengguna')
@section('content')

<h2>Detail Pengguna</h2>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Nama: {{ $user->username }}</h5>
        <p class="card-text">Email: {{ $user->email }}</p>
        <p class="card-text">Foto Profil: <img src="{{ asset('profile_images/'.$user->profile_image) }}" alt="Profile Image" style="max-width: 200px;"></p>
    </div>
</div>

<h2>Edit Pengguna</h2>

<form method="POST" action="{{ route('admin.users.update', $user->username) }}" id="userForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="username">Nama:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->username }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="form-group">
        <label for="profile_image">Foto Profil:</label>
        <input type="file" class="form-control-file" id="profile_image" name="profile_image">
        <small id="profileImageHelpBlock" class="form-text text-muted">
            Gambar harus memiliki format .jpg, .jpeg, atau .png dan ukuran file maksimal 2MB.
        </small>
    </div>
    <!-- Tambahkan field lainnya sesuai kebutuhan -->
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection