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
            'email_login' => 'required|exists:users,email',
            'password_login' => 'required',
        ], [
            'email_login' => [
                'required' => 'The email field is required',
                'exists' => "selected email is invalid"
            ],
            'password_login' => [
                'required' => 'The password field is required',
            ]

        ]);
        $user = Auth::attempt(['email' => $request->email_login, 'password' => $request->password_login]);
        if ($user) {
            return redirect()->route('user.dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->route('user.login')->with('error', 'Invalid email and password');
        }
    }
}
