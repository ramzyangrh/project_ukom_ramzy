@extends('layout.index')
@section('title', 'Edit Mobil')

    <style>
        .container{
        background-color: aqua;
    }
    </style>


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h2 class="font-weight-bold">Edit Mobil</h2></div>

                <div class="card-body">
                    <form action="{{ route('tambahmobilown.update', $mobil->id_mobil) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek" value="{{ $mobil->merek }}" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $mobil->tipe }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif per Hari</label>
                            <input type="text" value="{{ $mobil->tarif->nominal }}" pattern="[0-9]+" class="form-control" id="tarif" name="tarif" placeholder="Masukan Tarif per Hari" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Tersedia" {{ $mobil->status === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Tidak Tersedia" {{ $mobil->status === 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
