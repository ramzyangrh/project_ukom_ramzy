@extends('layout.index')
@section('title, detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/mobil1.jpg') }}" alt="Car Image" style="width:100%;">
            </div>
            <div class="col-md-6">
                <h2> - </h2>
                <p><strong>Type:</strong></p>
                <p><strong>Year:</strong></p>
                <p><strong>Price per day:</strong></p>
                <p><strong>Description:</strong></p>
                <button type="button" class="btn btn-success">edit</button>
            </div>
        </div>
    </div>
@endsection