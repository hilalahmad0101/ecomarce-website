<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
