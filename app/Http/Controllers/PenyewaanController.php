<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\tarif;
use Illuminate\Http\Request;
use App\Models\Penyewaan;
use Illuminate\Support\Facades\Validator;

class PenyewaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('headerSet')->only('store');
    }

    public function index()
    {
        $data = ['sewa' => Penyewaan::query()->where('id_penyewa', auth()->user()->id_penyewa)->with('mobil')->get()];
        return view('dashboardpel.penyewaan.index', $data);
    }

    public function detail($id_penyewaan)
    {
        $data = ['sewa' => Penyewaan::query()->where('id_penyewaan', $id_penyewaan)->with('mobil')->firstOrFail()];
        return view('dashboardpel.penyewaan.detail', $data);
    }

    public function create()
    {
        $data = ['mobil' => Mobil::query()->findOrFail(request('id_mobil'))];
        return view('dashboardpel.penyewaan.sewa', $data);
    }

    public function store(Request $request)
    {
        // Validasi Formulir
        $validator = Validator::make($request->all(), [
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $days  = \Carbon\Carbon::parse($request->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($request->tanggal_selesai)) + 1;
        $tarif = tarif::query()->whereHas('mobil', fn($q) => $q->where('id_mobil', $request->id_mobil))->firstOrFail();
        $total = $days * $tarif->nominal;

        // Simpan Data Penyewaan ke Database
        $penyewaan                  = new Penyewaan();
        $penyewaan->id_penyewaan    = \Str::random(12);
        $penyewaan->id_penyewa      = auth()->user()->id_penyewa;
        $penyewaan->id_tarif        = $tarif->id_tarif;
        $penyewaan->id_mobil        = $request->id_mobil;
        $penyewaan->tanggal_mulai   = $request->tanggal_mulai;
        $penyewaan->tanggal_selesai = $request->tanggal_selesai;
        $penyewaan->total_biaya     = $total;

        // Tambahkan informasi lain yang diperlukan
        $penyewaan->saveOrFail();

        // Notifikasi atau Konfirmasi kepada Pengguna
        // Contoh: Redirect ke halaman sukses
        return redirect()->route('dashboardpel.index')->with('success', 'Penyewaan Berhasil');
    }

    public function destroy(Request $request)
    {
        $penyewaan = Penyewaan::query()->where('id_penyewaan', $request->id_penyewaan)->firstOrFail();
        $penyewaan->delete();
        return redirect()->route('dashboardpel.index')->with('success', 'Penyewaan berhasil dihapus');
    }

    public function update(string $id_penyewaan, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $penyewaan = Penyewaan::query()
            ->where('id_penyewaan', $id_penyewaan)
            ->where('id_penyewa', auth()->user()->id_penyewa)
            ->firstOrFail();

        $days  = \Carbon\Carbon::parse($request->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($request->tanggal_selesai)) + 1;
        $tarif = tarif::query()->whereHas('mobil', fn($q) => $q->where('id_mobil', $penyewaan->id_mobil))->firstOrFail();
        $total = $days * $tarif->nominal;

        $penyewaan->fill(
            array_merge(
                $request->only(['tanggal_mulai', 'tanggal_selesai']),
                ['total_biaya' => $total]
            )
        )->saveOrFail();

        return redirect()->route('penyewaan.detail', $id_penyewaan)->with('success', 'Penyewaan berhasil diupdate');
    }
    public function invoice(string $id_penyewaan)
    {
        $data = ['penyewaan' => Penyewaan::query()
            ->where('id_penyewaan', $id_penyewaan)
            ->where('id_penyewa', auth()->user()->id_penyewa)
            ->firstOrFail()
        ];
        return view('dashboardpel.invoice', $data);
    }
}
