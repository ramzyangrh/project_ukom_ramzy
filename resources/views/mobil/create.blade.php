@extends('layout.index')
@section('title', 'Create New Car')

@section('content')
<div class="container">
    <h2>Create New Car</h2>
    <form method="POST" action="{{ route('mobil.store') }}">
        @csrf
        <div class="form-group">
            <label for="no_polisi">No Polisi</label>
            <input type="text" class="form-control" id="no_polisi" name="no_polisi" required>
        </div>
        <div class="form-group">
            <label for="id_pemilik_mobil">Pemilik Mobil</label>
            <select class="form-control" id="id_pemilik_mobil" name="id_pemilik_mobil" required>
                @foreach($pemilikMobils as $pemilikMobil)
                    <option value="{{ $pemilikMobil->id_pemilik_mobil }}">{{ $pemilikMobil->nama_pemilik_mobil }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_model_mobil">Model Mobil</label>
            <select class="form-control" id="id_model_mobil" name="id_model_mobil" required>
                @foreach($modelMobils as $modelMobil)
                    <option value="{{ $modelMobil->id_model_mobil }}">{{ $modelMobil->nama_model }}</option>
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
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="detail_mobil">Detail Mobil</label>
            <textarea class="form-control" id="detail_mobil" name="detail_mobil" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
