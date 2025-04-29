<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $admin->id],
            'current_password' => ['nullable', 'required_with:password', 'current_password:admin'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if (isset($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }
} 