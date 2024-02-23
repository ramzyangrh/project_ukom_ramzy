<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class DashboardpelController extends Controller
{
    //
    public function index()
    {

        $mobils = Mobil::all();
        return view('dashboardpel.index', compact('mobils'));

    }
}
