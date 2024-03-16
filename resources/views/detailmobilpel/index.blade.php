@extends('layout.index')
@section('title', 'Detail Mobil')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $mobil->image) }}" alt="Car Image" style="width:100%;">
            </div>
            <div class="col-md-6">
                <h2>{{ $mobil->merek }}</h2>
                <p><strong>Tipe:</strong> {{ $mobil->tipe }}</p>
                <p><strong>Status:</strong> {{ $mobil->status }}</p>
                <p><strong>Price per day:</strong> {{  $mobil->tarif->nominal }}</p>
                <p><strong>Description:</strong> {{ $mobil->deskripsi }}</p>
                {{-- <a href="{{ route('dashboardown.edit', $mobil->id_mobil) }}" class="btn btn-success">Edit</a> --}}
                <a href="{{ route('dashboardpel.index') }}" class="btn btn-outline-success">kembali</a>
            </div>            
        </div>
    </div>
@endsection
