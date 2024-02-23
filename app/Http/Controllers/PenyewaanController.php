<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;

class PenyewaanController extends Controller
{

    public function index()
    {
        return view('dashboardpel.penyewaan');
    }    

    public function store(Request $request)
    {
        // Validasi Formulir
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_mulai',
            'nama' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
        ]);

        // Simpan Data Penyewaan ke Database
        $penyewaan = new Penyewaan();
        $penyewaan->tanggal_mulai = $request->tanggal_mulai;
        $penyewaan->tanggal_pengembalian = $request->tanggal_pengembalian;
        $penyewaan->nama = $request->nama;
        $penyewaan->email = $request->email;
        $penyewaan->telepon = $request->telepon;
        // Tambahkan informasi lain yang diperlukan
        $penyewaan->save();

        // Notifikasi atau Konfirmasi kepada Pengguna
        // Contoh: Redirect ke halaman sukses
        return redirect()->route('penyewaan.sukses');
    }
}
