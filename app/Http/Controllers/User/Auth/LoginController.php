<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(): View
    {
        return view('user.auth.login');
    }

    function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email_login' => 'required|email|exists:users,email',
            'password_login' => [
                'required',
                'min:8',
            ],
        ], [
            'email_login.email' => 'Please enter a valid email address.',
            'email_login.exists' => 'The email address is not registered.',
            'password_login.required' => 'The password field is required.',
            'password_login.min' => 'The password must be at least 8 characters long.',
        ]);
        $user = Auth::attempt(['email' => $request->email_login, 'password' => $request->password_login]);
        if ($user) {
            return redirect()->route('user.dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->route('user.register')->with('error', 'Invalid email and password');
        }
    }
}
