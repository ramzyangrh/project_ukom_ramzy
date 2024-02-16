@extends('layout.index')
@section('title', 'Dashboard')
@section('content')

<style>
    .col-md-4 {
        margin-top: 25px;
    }

    .cb {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .search-form {
        display: flex;
        align-items: center;
    }

    .tambah {
        margin-top: 10px;
    }

    .user-list {
        width: 100%;
    }

    .user-card {
        width: 100%;
        margin-bottom: 25px;
    }
</style>

<div class="cb">
    <div class="col-md-9">
        <form class="form-inline search-form" method="GET" action="{{ route('admin.users.index') }}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    <div class="tambah">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah</a>
    </div>
</div>

<div class="user-list">
    @foreach($users as $akun)
    <div class="user-card">
        <div class="card mb-4 shadow-sm">
            <img src="{{ asset('images/'.$akun->image) }}" class="card-img-top" alt="{{ $akun->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $akun->username }}</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('admin.users.show', $akun->username) }}" class="btn btn-sm btn-outline-info">Detail</a>
                        <form action="{{ route('admin.users.destroy', $akun->username) }}" method="POST">
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

@endsection