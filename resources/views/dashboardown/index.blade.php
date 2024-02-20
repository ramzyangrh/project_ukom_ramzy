@extends('layout.index')
@section('title, Dashboard')
@section('content')

<style>
    .col-sm-4{
        margin-top: 25px;
    }

    .card-img-top {
    /* width: 100%;
    height: 100%; */
    object-fit: cover;
    }

    /* .btn{
        margin-top: 25px;
    } */

    /* .cb{
        display: flex;
        margin-top: 25px;
    } */

    .input-group-append{}

/* Tambahkan margin pada input text */
.input-group .form-control {
    margin-right: 13px;
}

</style>

    {{-- <div class="cb">

        <div class="col-md-9">
            <form class="form-inline search-form">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="btn.tambah">
            <a href="#" class="btn btn-primary">Tambah</a>
        </div>

    </div> --}}
    <div class="container mt-5">
        <h1 class="text-center mb-5">Daftar Mobil</h1>
    
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari mobil...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('dashboardown.create') }}" class="btn btn-primary">Tambah Mobil</a>
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
                                <a href="#" class="btn btn-sm btn-outline-info">Detail</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('dashboardown.destroy', $mobil->id_mobil) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
    </div>


    {{-- <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cari mobil...">
            </div>
            <div class="col-md-6 text-right">
                <a href="#" class="btn btn-primary">Tambah Mobil</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Merek</th>
                    <th scope="col">Model</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Toyota</td>
                    <td>Avanza</td>
                    <td>2020</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>Honda</td>
                    <td>CRV</td>
                    <td>2019</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <!-- Tambahkan baris untuk setiap mobil -->
            </tbody>
        </table>
    </div> --}}



    
@endsection
    
@endsection
