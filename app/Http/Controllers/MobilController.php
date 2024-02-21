<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pemilik_Mobil;
use App\Models\ModelMobil;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::paginate(10);
        return view('mobil.index', compact('mobils'));
    }

    public function create()
    {
        $pemilikMobils = Pemilik_Mobil::all();
        $modelMobils = ModelMobil::all();
        return view('mobil.create', compact('pemilikMobils', 'modelMobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|unique:mobil',
            'id_pemilik_mobil' => 'required',
            'id_model_mobil' => 'required',
            'foto_stnk_mobil' => 'required',
            'status_ketersediaan' => 'required',
            'detail_mobil' => 'required',
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobil.index')
            ->with('success', 'Car created successfully.');
    }

    public function show($no_polisi)
    {
        $mobil = Mobil::find($no_polisi);
        return view('mobil.show', compact('mobil'));
    }

    public function edit($no_polisi)
    {
        $mobil = Mobil::find($no_polisi);
        $pemilikMobils = Pemilik_Mobil::all();
        $modelMobils = ModelMobil::all();
        return view('mobil.edit', compact('mobil', 'pemilikMobils', 'modelMobils'));
    }

    public function update(Request $request, $no_polisi)
    {
        $request->validate([
            'id_pemilik_mobil' => 'required',
            'id_model_mobil' => 'required',
            'foto_stnk_mobil' => 'required',
            'status_ketersediaan' => 'required',
            'detail_mobil' => 'required',
        ]);

        Mobil::find($no_polisi)->update($request->all());

        return redirect()->route('mobil.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy($no_polisi)
    {
        Mobil::find($no_polisi)->delete();

        return redirect()->route('mobil.index')
            ->with('success', 'Car deleted successfully');
    }
}