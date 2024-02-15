@extends('layout.index')
@section('title', 'Edit Pengguna')
@section('content')

<h2>Edit Pengguna</h2>

<form method="POST" action="{{ route('admin.users.update', $user->id) }}" id="userForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
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