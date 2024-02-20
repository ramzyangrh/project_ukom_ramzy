@extends('layout.index')
@section('title', 'Detail Pengguna')
@section('content')

<h2>Detail Pengguna</h2>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Nama: {{ $user->username }}</h5>
        <p class="card-text">Email: {{ $user->email }}</p>
        <p class="card-text">Role: {{ $user->role }}</p>
        <p class="card-text">Foto Profil: <img src="{{ $user->profileImageUrl }}" alt="Profile Image" style="max-width: 200px;"></p>
    </div>
</div>

<a href="{{ route('admin.users.edit', $user->username) }}" class="btn btn-sm btn-outline-primary">Edit</a>

@endsection