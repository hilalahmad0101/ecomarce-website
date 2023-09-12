<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index(): View
    {
        return view('admin.auth.login');
    }

    function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);
        $admin = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($admin) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid username and password');
        }
    }

    function profile_view()
    {
        return view('admin.auth.update-profile');
    }

    function update_profile(Request $request)
    {

        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('profile', 'public');
        } else {
            $filename = $admin->image;
        }

        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->image = $filename;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('success', 'Profile update successfully');
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login')->with('success','Logout successfully');
    }
}
