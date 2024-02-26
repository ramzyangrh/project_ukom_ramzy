@extends('layout.index')
@section('title', 'Mobil yang Anda Sewa')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">
            Detail Penyewaan Anda
        </h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('images/' . $sewa->mobil->image) }}" alt="{{ $sewa->mobil->merek }}"
                        class="card-img-top w-25 mx-auto shadow rounded-bottom-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="link-dark" href="{{ route('detailmobilpel.index', $sewa->mobil->id_mobil) }}">
                                {{ $sewa->mobil->merek }}
                            </a>
                        </h5>
                        <p class="card-text m-0">Kode Penyewaan:
                            <span class="fw-bold">
                                {{ $sewa->id_penyewaan }}
                            </span>
                        </p>
                        <p class="card-text m-0">Tipe: {{ $sewa->mobil->tipe }}</p>
                        <p class="card-text m-0">Total biaya: Rp. {{ $sewa->total_biaya }}</p>
                        @isset($sewa->id_pembayaran)
                            <p class="card-text m-0">Pembayaran: Lihat pembayaran</p>
                        @endisset
                        @empty($sewa->id_pembayaran)
                            <p class="card-text m-0">Pembayaran: Belum dibayar</p>
                            <a href="{{ route('penyewaan.destroy', $sewa->id_penyewaan) }}"
                                class="btn btn-sm btn-outline-danger d-block w-100 mt-4" type="submit">Batalkan penyewaan</a>
                        @endempty
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('penyewaan.update', $sewa->id_penyewaan) }}" method="POST">
                            @csrf
                            <div class="d-flex flex-wrap justify-content-between">
                                <span>
                                    <label for="tanggal_mulai">
                                        Jadwal mulai disewakan:
                                    </label>
                                    <input id="tanggal_mulai" name="tanggal_mulai" class="form-control form-control-sm"
                                        type="date"
                                        value="{{ \Carbon\Carbon::parse($sewa->tanggal_mulai)->format('Y-m-d') }}" />
                                </span>
                                <span>
                                    <label for="tanggal_mulai">
                                        Jadwal selesai disewakan:
                                    </label>
                                    <input id="tanggal_selesai" name="tanggal_selesai" class="form-control form-control-sm"
                                        type="date"
                                        value="{{ \Carbon\Carbon::parse($sewa->tanggal_selesai)->format('Y-m-d') }}">
                                </span>
                            </div>
                            <button class="btn btn-sm d-block w-100 btn-outline-primary mt-2">Edit periode</button>
                        </form>
                        <small class="text-muted mt-3 d-block ">Dibuat pada: {{ $sewa->created_at }}</small>
                    </div>
                </div>
                <a href="{{ route('invoice.index', $sewa->id_penyewaan) }}" class="btn btn-primary">Lihat invoice</a>
            </div>
        </div>
    </div>
@endsection
