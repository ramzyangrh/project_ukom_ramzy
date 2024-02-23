@extends('layout.index')
@section('title', 'Dashboard Pelanggan')
@section('content')

    <style>
         /* style untuk search bar */
    .input-group {
        transition: all 0.3s; /* Animasi ketika focus */
    }

    .form-control:hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Efek bayangan pada hover */
    }

    .form-control input:focus {
        outline: none; /* Hilangkan outline pada focus */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Efek bayangan saat focus */
    }
    
    .btn-cari{
        margin-left: 15px;
    }

    </style>


<div class="container mt-5">
    <h1 class="text-center mb-5">Daftar Mobil</h1>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari mobil...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-cari" type="button">Cari</button>
                </div>
            </div>
            <small id="searchHelpBlock" class="form-text text-muted">Cari berdasarkan merek, model, atau tahun</small>
        </div>
    </div>

    <div class="row">
        @foreach($mobils as $mobil)
        <div class="col-sm-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/' . $mobil->image) }}" class="card-img-top" alt="Gambar Mobil">
                <div class="card-body">
                    <h5 class="card-title">{{ $mobil->merek }}</h5>
                    <p class="card-text">{{ $mobil->tipe }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('detailmobilpel.index', $mobil->id_mobil) }}" class="btn btn-sm btn-outline-info">Detail</a>
                            <a href="#" class="btn btn-sm btn-outline-primary">Sewa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
