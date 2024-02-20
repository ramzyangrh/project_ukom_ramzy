<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class EditProfileImageController extends Controller
{
    public function update(Request $request, User $user)
    {
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImagePath = $user->profile_image;
            if ($profileImagePath && Storage::disk('public')->exists($profileImagePath)) {
                Storage::disk('public')->delete($profileImagePath);
            }
            $profileImage = $request->file('profile_image');
            $profileImagePath = $profileImage->storeAs('profile_images', $user->username.'.'.$profileImage->getClientOriginalExtension(), 'public');
            $user->profile_image = $profileImagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile image updated successfully');
    }
}