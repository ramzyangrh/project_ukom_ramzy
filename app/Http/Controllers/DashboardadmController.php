<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\Penyewa;
use App\Models\Pemilik_Mobil;
use Illuminate\Support\Facades\DB;

class DashboardadmController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $users = User::where('username', 'LIKE', '%' . $keyword . '%')->paginate(5);


        return view('dashboardadm.index', compact('users', 'keyword'));
    }

    public function edit(User $user)
    {
        return view('dashboardadm.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
    
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,'.$username,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->email,
            'password' => 'nullable|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required|string|in:penyewa,pemilik_mobil,admin',
        ]);
    
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->role = $request->role;
    
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $user->profile_image;
            if ($profileImagePath && Storage::disk('public')->exists($profileImagePath)) {
                Storage::disk('public')->delete($profileImagePath);
            }
            $profileImage = $request->file('profile_image');
            $profileImagePath = $profileImage->storeAs('profile_images', $user->username.'.'.$profileImage->getClientOriginalExtension(), 'public');
            $user->profile_image = $profileImagePath;
        }
    
        $user->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'User berhasil diupdate');
    }
public function create()
{
    return view('dashboardadm.create');
}

public function store(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'pelanggan',
    ]);

    if ($request->hasFile('profile_image')) {
        $profileImage = $request->file('profile_image');
        $profileImagePath = $profileImage->store('profile_images', 'public');
        $user->profile_image = $profileImagePath;
        $user->save();
    }

    return redirect()->route('admin.dashboard')->with('success', 'User berhasil ditambahkan');
}
    
    public function show(User $user = null)
    {
        if ($user === null) {
            return redirect()->back();
        }
    
        return view('detailuser.index', compact('user'));
    }

    public function destroy(User $user)
    {
        if ($user->role == 'admin') {
            $admin = Admin::where('id_admin', $user->username)->first();
            if ($admin) {
                $admin->delete();
            }
        } elseif ($user->role == 'penyewa') {
            $penyewa = Penyewa::where('id_penyewa', $user->username)->first();
            if ($penyewa) {
                $penyewa->delete();
            }
        } elseif ($user->role == 'pemilik_mobil') {
            $pemilik_mobil = Pemilik_Mobil::where('id_pemilik_mobil', $user->username)->first();
            if ($pemilik_mobil) {
                $pemilik_mobil->delete();
            }
        }
    
        $user->delete();
    
        return redirect()->route('admin.dashboard')->with('success', 'User berhasil dihapus');
    }

}
