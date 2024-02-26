<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Invoice {{ $penyewaan->id_penyewaan }}</title>
</head>

<body class="bg-dark bg-opacity-50 ">
    <button type="button" id="print"
        class="btn btn-outline-success w-50 mb-4 me-5 position-fixed start-50 translate-middle-x bottom-0 rounded-pill"
        style="z-index: 999;">Print</button>

    <div id="printable" class="bg-white px-5" style="width: 21cm; height: 29.7cm; margin: auto; border: 1px solid #ddd;">
        <div class="row">
            <div class="col">
                <h1 class="fw-bolder mb-0 mt-3">Invoice</h1>
                <h3 class="fs-6 text-muted">Invoice ID: {{ $penyewaan->id_penyewaan }} <span class="vr mx-1"
                        style="height: 20px"></span> Date: {{ $penyewaan->created_at }}</h3>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold mb-0">Data penyewa</h5>
                    </div>
                    <div class="card-body bg-white rounded">
                        <div class="row justify-content-end">
                            <div class="col-6 text-end fw-bold">Username</div>
                            <div class="col text-start fw-bold">{{ \Auth::user()->username }}</div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-6 text-end fw-bold">ID</div>
                            <div class="col text-start">{{ \Auth::user()->id_penyewa }}</div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-6 text-end fw-bold">Role</div>
                            <div class="col text-start">{{ \Auth::user()->role }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold mb-0">Data mobil</h5>
                    </div>
                    <div class="card-body bg-white rounded">
                        <img class="d-block w-75 mx-auto" src="{{ asset('images/' . $penyewaan->mobil->image) }}"
                            onerror="this.remove();" alt="{{ $penyewaan->mobil->merek }}">
                        <div class="row justify-content-end">
                            <div class="col-4 text-end fw-bold">Merek</div>
                            <div class="col text-start">{{ $penyewaan->mobil->merek }}</div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4 text-end fw-bold">Tipe</div>
                            <div class="col text-start">{{ $penyewaan->mobil->tipe }}</div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4 text-end fw-bold">Harga sewa</div>
                            <div class="col text-start">Rp. {{ $penyewaan->mobil->tarif->nominal }}/hari</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Invoice ID</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tangal Selesai</th>
                            <th scope="col">Periode Sewa</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $penyewaan->id_penyewaan }}</th>
                            <td>{{ \Carbon\Carbon::parse($penyewaan->tanggal_mulai)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($penyewaan->tanggal_selesai)->format('d-m-Y') }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($penyewaan->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($penyewaan->tanggal_selesai)) }}
                                hari
                            </td>
                            <td>Rp. {{ $penyewaan->total_biaya }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Status</td>
                            @if ($penyewaan->id_pembayaran == null)
                                <td class="text-danger">Belum dibayar</td>
                            @else
                                <td class="text-success">Sudah dibayar</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <small>Dibuat pada: {{ $penyewaan->created_at }}</small>
                <small class="d-block text-danger">* Tolong bayarkan sebelum
                    <span class="fw-bolder fs-6">
                        {{ \Carbon\Carbon::parse($penyewaan->tanggal_mulai)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}
                    </span>
                    atau penyewaan akan dibatalkan</small>
            </div>
        </div>
</body>
<script type="module">
    document.getElementById('print').addEventListener('click', () => {
        $('#print').hide();
        window.print();
        $('#print').show();
    })
</script>

</html>
