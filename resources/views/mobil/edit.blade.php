@extends('layout.index')
@section('title', 'Edit Car Details')

@section('content')
<div class="container">
    <h2>Edit Car Details</h2>
    <form method="POST" action="{{ route('mobil.update', $mobil->no_polisi) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_polisi">No Polisi</label>
            <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="{{ $mobil->no_polisi }}" disabled>
        </div>
        <div class="form-group">
            <label for="id_pemilik_mobil">Pemilik Mobil</label>
            <select class="form-control" id="id_pemilik_mobil" name="id_pemilik_mobil" required>
                @foreach($pemilikMobils as $pemilikMobil)
                    <option value="{{ $pemilikMobil->id_pemilik_mobil }}" {{ $mobil->id_pemilik_mobil == $pemilikMobil->id_pemilik_mobil ? 'selected' : '' }}>{{ $pemilikMobil->nama_pemilik_mobil }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_model_mobil">Model Mobil</label>
            <select class="form-control" id="id_model_mobil" name="id_model_mobil" required>
                @foreach($modelMobils as $modelMobil)
                    <option value="{{ $modelMobil->id_model_mobil }}" {{ $mobil->id_model_mobil == $modelMobil->id_model_mobil ? 'selected' : '' }}>{{ $modelMobil->nama_model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto_stnk_mobil">Foto STNK Mobil</label>
            <input type="file" class="form-control" id="foto_stnk_mobil" name="foto_stnk_mobil" required>
        </div>
        <div class="form-group">
            <label for="status_ketersediaan">Status Ketersediaan</label>
            <select class="form-control" id="status_ketersediaan" name="status_ketersediaan" required>
                <option value="Tersedia" {{ $mobil->status_ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $mobil->status_ketersediaan == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="detail_mobil">Detail Mobil</label>
            <textarea class="form-control" id="detail_mobil" name="detail_mobil" rows="3" required>{{ $mobil->detail_mobil }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
    