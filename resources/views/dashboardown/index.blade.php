@extends('layout.index')
@section('title, Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/car1.jpg') }}" class="card-img-top" alt="Car 1">
                <div class="card-body">
                    <h5 class="card-title">Mobil 1</h5>
                    <p class="card-text">Deskripsi singkat tentang mobil 1.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
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
                            <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('images/car2.jpg') }}" class="card-img-top" alt="Car 2">
                <div class="card-body">
                    <h5 class="card-title">Mobil 3</h5>
                    <p class="card-text">Deskripsi singkat tentang mobil 2.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- You can add more cars here -->
    </div>
@endsection
    
@endsection
