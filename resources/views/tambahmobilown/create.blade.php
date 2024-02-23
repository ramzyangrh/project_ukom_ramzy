@extends('layout.index')
@section('title', 'Tambah Mobil')
@section('content')

<style>
    .container {
        background-color: aqua;
    }

    .form-group {
        margin-bottom: 20px; /* Memberikan jarak 20px di bawah setiap form-group */
    }

</style>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h2 class="font-weight-bold">Tambah Mobil</h2></div>

                <div class="card-body">
                    <form action="{{ route('tambahmobilown.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="merek">Merek Mobil:</label>
                            <input type="text" class="form-control" id="merek" name="merek" placeholder="Masukan Merek Mobil" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe Mobil:</label>
                            <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Masukan Tipe Mobil" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Ketersediaan:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" disabled selected>Pilih Status Ketersediaan</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Mobil:</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px; margin-top: 10px;">
                        </div>
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = "block";
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    
    document.getElementById('image').addEventListener('change', previewImage);
</script>
@endsection
