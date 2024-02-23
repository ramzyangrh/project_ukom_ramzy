<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil; // Import model Mobil

class DetailmobilownController extends Controller
{
    public function index($id)
    {
        $mobil = Mobil::find($id); // Mengambil data mobil berdasarkan ID
        return view('detailmobilown.index', compact('mobil')); // Mengirimkan data mobil ke halaman detailmobil
    }
}

