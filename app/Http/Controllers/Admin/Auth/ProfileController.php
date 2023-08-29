<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index(): View
    {
        return view('admin.auth.profile');
    }

    function update_profile(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|image:1024',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('admin/profile/image', 'public');
        } else {
            $filename = $admin->image;
        }

        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->image = $filename;
        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    function change_password_view(): View
    {
        return view('admin.auth.change-password');
    }

    function change_password(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->back()->with('success', 'Password change successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid old password');
        }
    }


    function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login')->with('success', 'Logout successfully');
    }
}
