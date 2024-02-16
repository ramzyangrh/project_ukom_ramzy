@extends('layout.index')
@section('title', 'Tambah Pengguna Baru')
@section('content')

<h2>Tambah Pengguna Baru</h2>

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <small id="passwordHelpBlock" class="form-text text-muted">
            Password harus terdiri dari minimal 8 karakter.
        </small>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection