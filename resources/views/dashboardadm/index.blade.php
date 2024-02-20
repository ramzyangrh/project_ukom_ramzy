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

<div class="container">
    <div class="cb">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
       
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="tambah">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="user-list">
        @foreach($users as $user)
        <div class="user-card">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->username }}</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('admin.users.show', $user->username) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            <form action="{{ route('admin.users.destroy', $user->username) }}" method="POST">
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
</div>

@endsection
