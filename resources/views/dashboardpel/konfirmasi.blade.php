@extends('layout.index')
@section('title', 'Konfirmasi Penyewaan')
@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-5">Konfirmasi Penyewaan</h1>

    <div class="alert alert-success" role="alert">
        Penyewaan mobil telah berhasil dilakukan! Terima kasih atas pemesanan Anda.
    </div>

    <h2>Detail Penyewaan:</h2>
    <ul>
        <li><strong>Tanggal Mulai:</strong> {{ $penyewaan->tanggal_mulai }}</li>
        <li><strong>Tanggal Pengembalian:</strong> {{ $penyewaan->tanggal_pengembalian }}</li>
        <li><strong>Nama:</strong> {{ $penyewaan->nama }}</li>
        <li><strong>Email:</strong> {{ $penyewaan->email }}</li>
        <li><strong>Telepon:</strong> {{ $penyewaan->telepon }}</li>
        <!-- Tambahkan detail lainnya sesuai kebutuhan -->
    </ul>
</div>

@endsection
