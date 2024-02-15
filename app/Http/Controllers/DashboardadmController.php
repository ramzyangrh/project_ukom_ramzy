<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardadmController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboardadm.index', compact('user'));
    }

    public function create()
    {
        return view('dashboardadm.create');
    }    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);
    
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'pelanggan',
                'password' => bcrypt($request->password),
            // User::create([
            //     'name' => "qwertyu",
            //     'email' => "qwertyui@hgh.com",
            //     'role' => 'pelanggan',
            //     'password' => "sdfghjsdfgh",

        ]);
            
            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'There was an error creating the user. Please try again.');
        }
    }    
    
    public function edit(User $user)
    {
        return view('dashboardadm.edit', compact('user'));
    }    

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'profile_image' => 'image|mimes:jpg,jpeg,png|max:2048', // Format gambar dan ukuran maksimal
        ]);
    
        $user->username = $request->username;
        $user->email = $request->email;
    
        // Jika ada gambar baru yang diunggah, simpan gambar dan update kolom profile_image
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);
            $user->profile_image = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }    

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    
    public function show(User $user)
{
    return view('detailuser.index', compact('user'));
}

}
