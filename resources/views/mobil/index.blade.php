<!-- index.blade.php -->
@extends('layout.index')
@section('title', 'Daftar Mobil')

@section('content')
<div class="container">
    <h2>Daftar Mobil</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No Polisi</th>
                <th>Pemilik</th>
                <th>Model</th>
                <th>Status Ketersediaan</th>
                <!-- Tambahkan kolom lain jika diperlukan -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mobils as $mobil)
            <tr>
                <td>{{ $mobil->no_polisi }}</td>
                <td>{{ $mobil->pemilik->nama_pemilik_mobil }}</td>
                <td>{{ $mobil->model->merek_mobil }}</td>
                <td>{{ $mobil->status_ketersediaan }}</td>
                <td>
                    <a href="{{ route('mobil.edit', $mobil->no_polisi) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('mobil.destroy', $mobil->no_polisi) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection