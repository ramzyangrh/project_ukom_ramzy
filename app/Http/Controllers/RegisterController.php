<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index');
    }
    function indexPenyewa()
    {
        return view('register.penyewa');
    }
    function registerPenyewa(Request $request)
    {
        $penyewa = Penyewa::query()->create(['id_penyewa'=>Str::random(13)]);
        User::create([
            'id_penyewa' => $penyewa->id_penyewa,
            'username'   => $request->username,
            'password'   => $request->password,
        ]);
        return redirect('/login/penyewa');
    }
}
