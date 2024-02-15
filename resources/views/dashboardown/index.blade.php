@extends('layout.index')
@section('title, Dashboard')
@section('content')

<style>
    .col-md-4{
        margin-top: 25px;
    }

    /* .btn{
        margin-top: 25px;
    } */

    .cb{
        display: flex;
        margin-top: 25px;
    }

</style>

    <div class="cb">

        <div class="col-md-9">
            <form class="form-inline search-form">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="btn.tambah">
            <a href="#" class="btn btn-primary">Tambah</a>
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car 1">
                <div class="card-body">
                    <h5 class="card-title">Mobil 1</h5>
                    <p class="card-text">Deskripsi singkat tentang mobil 1.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-info">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/car2.jpg') }}" class="card-img-top" alt="Car 2">
                <div class="card-body">
                    <h5 class="card-title">Mobil 2</h5>
                    <p class="card-text">Deskripsi singkat tentang mobil 2.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-info">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/car3.jpg') }}" class="card-img-top" alt="Car 2">
                <div class="card-body">
                    <h5 class="card-title">Mobil 3</h5>
                    <p class="card-text">Deskripsi singkat tentang mobil 3.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-info">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- You can add more cars here -->
    </div>
@endsection
    
@endsection
