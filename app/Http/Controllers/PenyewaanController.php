<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
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
        // Simpan Data Penyewaan ke Database
        $penyewaan                  = new Penyewaan();
        $penyewaan->id_penyewaan    = \Str::random(12);
        $penyewaan->id_penyewa      = auth()->user()->id_penyewa;
        $penyewaan->id_mobil        = $request->id_mobil;
        $penyewaan->tanggal_mulai   = $request->tanggal_mulai;
        $penyewaan->tanggal_selesai = $request->tanggal_selesai;
        // Tambahkan informasi lain yang diperlukan
        $penyewaan->saveOrFail();

        // Notifikasi atau Konfirmasi kepada Pengguna
        // Contoh: Redirect ke halaman sukses
        return redirect()->route('dashboardpel.index')->with('success', 'Penyewaan Berhasil');
    }
}
