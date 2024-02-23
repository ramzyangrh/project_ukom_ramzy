<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class DetailmobilpelController extends Controller
{
    //
    public function index($id)
    {
        $mobil = Mobil::find($id); // Mengambil data mobil berdasarkan ID
        return view('detailmobilpel.index', compact('mobil')); // Mengirimkan data mobil ke halaman detailmobil
    }
}
