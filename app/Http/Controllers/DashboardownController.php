<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;

class DashboardownController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('dashboardown.index', compact('mobils'));
    }

    public function create()
    {
        return view('dashboardown.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string',
            'tipe' => 'required|string',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_pemilik_mobil' => 'nullable|string', // Pastikan validasi sesuai dengan kebutuhan
        ]);
        
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName); // Perbaiki lokasi penyimpanan gambar

        mobil::create([
            'merek' => $request->merek,
            'tipe' => $request->tipe,
            'status' => $request->status,
            'image' => $imageName
        ]);

        return redirect()->route('dashboardown.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('dashboardown.index')->with('success', 'Mobil berhasil dihapus.');
    }

}   
    