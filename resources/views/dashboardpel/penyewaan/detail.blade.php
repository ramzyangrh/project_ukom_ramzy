@extends('layout.index')
@section('title', 'Mobil yang Anda Sewa')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">
            <a class="link-dark" href="{{ route('detailmobilpel.index', $sewa->mobil->id_mobil) }}">
                {{ $sewa->mobil->merek }}
            </a>
        </h1>
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('images/' . $sewa->mobil->image) }}" alt="{{ $sewa->mobil->merek }}"
                        class="card-img-top w-25 mx-auto shadow rounded-bottom-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            
                        </h5>
                        <div class="card-text">
                            Kode Penyewaan:
                            <span class="fw-bold">
                                {{ $sewa->id_penyewaan }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
