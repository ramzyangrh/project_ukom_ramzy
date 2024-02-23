@extends('layout.index')
@section('title', 'Dashboard Pemilik Mobil')
@section('content')

    <style>
    
    .container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .card {
        width: 200px;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card i {
        font-size: 48px;
        margin-bottom: 10px;
        text-align: center;
        color: #007bff;
    }
    .card p {
        text-align: center;
        margin: 0;
        font-size: 18px;
    }
    .card-link {
        text-decoration: none;
        color: inherit; /* to inherit parent color */
    }
    </style>
    
    <div class="container">
        <a href="{{ route('tambahmobilown.index') }}" class="card-link">
            <div class="card">
                <i class="fas fa-car"></i>
                <p>Daftar Mobil</p>
            </div>
        </a>
        <a href="" class="card-link">
            <div class="card">
                <i class="fas fa-dollar-sign"></i>
                <p>Rates</p>
            </div>
        </a>
        <a href="" class="card-link">
            <div class="card">
                <i class="fas fa-road"></i>
                <p>Routes</p>
            </div>
        </a>
        <a href="" class="card-link">
            <div class="card">
                <i class="fas fa-phone"></i>
                <p>Contact</p>
            </div>
        </a>
    </div>
    
  
@endsection