<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index(): View
    {
        return view('user.auth.register');
    }

    function create(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'phone' => [
                'required',
                'unique:users',
                'regex:/^[0-9]{11}$/',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
        ], [
            'first_name.required' => 'The first name field is required.',
            'first_name.alpha' => 'The first name should contain only letters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.alpha' => 'The last name should contain only letters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'phone.required' => 'The phone number field is required.',
            'phone.regex' => 'Please enter a valid 11-digit phone number.',
            'phone.unique' => 'The phone number is already in use.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters long.',
            // 'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->photo = "null";
        $user->password = Hash::make($request->password);
        $user->save();

        BillingAddress::create([
            'user_id' => $user->id,
            'address1' =>  ' ',
            'address2' => ' ',
            'zip_code' => ' ',
            'company' => ' ',
            'city' => ' ',
            'phone' => ' ',
        ]);
        return redirect()->route('user.register')->with('success', 'Register successfully');
    }
}
