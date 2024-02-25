@extends('layout.index')
@section('title', 'Mobil yang Anda Sewa')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Daftar Mobil yang Anda Sewa</h1>
        <div class="row">
            @foreach ($sewa as $s)
                <div class="col-sm-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('images/' . $s->mobil->image) }}" alt="{{ $s->mobil->merek }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('detailmobilpel.index', $s->mobil->id_mobil) }}">
                                    {{ $s->mobil->merek }}
                                </a>
                            </h5>
                            <p class="card-text">
                                Kode Penyewaan:
                                <span class="fw-bold">
                                    {{ $s->id_penyewaan }}
                                </span>
                            </p>
                            <a href="{{ route('penyewaan.detail', $s->id_penyewaan) }}" class="btn btn-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
