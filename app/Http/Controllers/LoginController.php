<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'pelanggan') {
                return redirect()->route('dashboardpel.index');
            } elseif ($user->role === 'pemilik') {
                return redirect()->route('dashboardpm.index');
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.penyewahalaman');
    }

    public function indexPenyewa()
    {
        return view('auth.penyewa');
    }

    public function loginPenyewa(Request $request)
    {
        $request->header('Accept', 'application/json');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->to('/dashboardpel');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
