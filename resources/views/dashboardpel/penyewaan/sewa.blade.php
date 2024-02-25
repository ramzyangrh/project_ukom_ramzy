@extends('layout.index')
@section('title', 'Formulir Penyewaan')
@section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-5">Formulir Penyewaan</h1>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('penyewaan.store', $mobil->id_mobil) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai Penyewaan:</label>
                <input type="date" required class="form-control" id="tanggal_mulai" name="tanggal_mulai">
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Pengembalian:</label>
                <input type="date" required class="form-control" id="tanggal_selesai" name="tanggal_selesai">
            </div>
            <h1 class="text-center mt-3">Detail mobil yang akan disewa</h1>
            <div class="w-100 h-25">
                <img src="{{ asset('images/' . $mobil->image) }}" class="rounded-top-5  shadow d-block mx-auto w-auto h-100"
                    alt="Gambar Mobil">
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $mobil->merek }}</h5>
                    <p class="card-text">{{ $mobil->tipe }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('detailmobilpel.index', $mobil->id_mobil) }}"
                                class="btn btn-sm btn-outline-info">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-block w-100">Sewa</button>
        </form>
    </div>

@endsection
