<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;

class TambahmobilownController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('tambahmobilown.index', compact('mobils'));
    }

    public function create()
    {
        return view('tambahmobilown.create');
        
    }

    public function edit(Mobil $mobil)
    {
        return view('tambahmobilown.edit', compact('mobil'));
    }

    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => 'required|string',
            'tipe' => 'required|string',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $mobil->image = $imageName;
        }

        $mobil->merek = $request->merek;
        $mobil->tipe = $request->tipe;
        $mobil->status = $request->status;
        $mobil->save();

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil diperbarui.');
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

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil dihapus.');
    }

}   
    