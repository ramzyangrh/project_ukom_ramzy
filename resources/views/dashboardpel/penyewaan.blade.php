@extends('layout.index')
@section('title', 'Formulir Penyewaan')
@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-5">Formulir Penyewaan</h1>

    <form action="{{ route('penyewaan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai Penyewaan:</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" class="form-control" id="telepon" name="telepon">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
