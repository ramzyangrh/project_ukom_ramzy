@extends('layout.index')
@section('title', 'Tambah Pengguna Baru')
@section('content')

<h2>Tambah Pengguna Baru</h2>

<form method="POST" action="{{ route('admin.users.store') }}" id="userForm" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <small id="passwordHelpBlock" class="form-text text-muted">
            Password harus terdiri dari minimal 8 karakter.
        </small>
    </div>
    <!-- Tambahkan field lainnya sesuai kebutuhan -->
    {{-- <button type="button" class="btn btn-primary" onclick="validateForm()">Simpan</button> --}}
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Peringatan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Salah satu form belum terisi atau panjang password kurang dari 8 karakter, mohon isi form dengan benar.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    // function validateForm() {
    //     var name = document.getElementById("name").value;
    //     var email = document.getElementById("email").value;
    //     var password = document.getElementById("password").value;

    //     if (name.trim() === "" || email.trim() === "" || password.trim() === "" || password.length < 8) {
    //         $('#alertModal').modal('show'); // Memunculkan modal jika salah satu form belum terisi atau panjang password kurang dari 8 karakter
    //     } else {
    //         document.getElementById("userForm").submit(); // Submit form jika semua form sudah terisi dan panjang password mencapai 8 karakter
    //     }
    // }
</script>

@endsection
