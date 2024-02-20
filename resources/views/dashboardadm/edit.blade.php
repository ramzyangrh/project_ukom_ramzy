@extends('layout.index')
@section('title', 'Edit Pengguna')
@section('content')

<h2>Edit Pengguna</h2>

<form method="POST" action="{{ route('admin.users.update', $user->username) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

        <div class="col-md-6">
            <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" accept="image/*">

            @error('profile_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection