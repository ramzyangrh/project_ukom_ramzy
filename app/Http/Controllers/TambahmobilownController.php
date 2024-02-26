<?php

namespace App\Http\Controllers;

use App\Models\tarif;
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
            'merek'  => 'required|string',
            'tipe'   => 'required|string',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tarif'  => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $mobil->image = $imageName;
        }

        $tarif           = tarif::query()->where('nominal', $request->tarif)->firstOrNew([
            'nominal' => $request->tarif,
        ]);
        $tarif->id_tarif = \Str::random(13);
        $tarif->save();

        $mobil->merek    = $request->merek;
        $mobil->tipe     = $request->tipe;
        $mobil->status   = $request->status;
        $mobil->id_tarif = $tarif->id_tarif;
        $mobil->save();

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek'            => 'required|string',
            'tipe'             => 'required|string',
            'status'           => 'required|in:Tersedia,Tidak Tersedia',
            'image'            => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_pemilik_mobil' => 'nullable|string', // Pastikan validasi sesuai dengan kebutuhan
            'tarif'            => 'required|integer',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName); // Perbaiki lokasi penyimpanan gambar

        $tarif           = tarif::query()->where('nominal', $request->tarif)->firstOrNew([
            'nominal' => $request->tarif,
        ]);
        $tarif->id_tarif = \Str::random(13);
        $tarif->save();

        mobil::create([
            'merek'    => $request->merek,
            'tipe'     => $request->tipe,
            'status'   => $request->status,
            'image'    => $imageName,
            'id_tarif' => $tarif->id_tarif
        ]);

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->route('tambahmobilown.index')->with('success', 'Mobil berhasil dihapus.');
    }

}
