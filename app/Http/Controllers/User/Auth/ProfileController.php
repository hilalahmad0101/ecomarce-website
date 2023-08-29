<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index(): View
    {
        return view('user.user-dashboard.profile');
    }

    function update_profile(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ]);
        $user = User::findOrFail(auth()->id());

        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('users', 'public');
        } else {
            $filename = $user->image;
        }
        $user->name = $request->name ?? $user->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->image = $filename;
        $user->password = Hash::make($request->password) ?? $user->password;
        $user->save();
        return redirect()->route('user.dashboard.profile')->with('success', 'Profile update successfully');
    }


    function billing_address(): View
    {
        $billing_address = BillingAddress::whereUserId(auth()->id())->first();
        return view('user.user-dashboard.billing-address', compact('billing_address'));
    }

    function update_billing_address(Request $request): RedirectResponse
    {
        $request->validate([
            'address1' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ]);
        $billing_address = BillingAddress::whereUserId(auth()->id())->first();

        $billing_address->address1 = $request->address1;
        $billing_address->address2 = $request->address2;
        $billing_address->city = $request->city;
        $billing_address->zip_code = $request->zip_code;
        $billing_address->company = $request->company;
        $billing_address->save();
        return redirect()->route('user.dashboard.billing-address')->with('success', 'Billing address update successfully');
    }

    function shipping_address(): View
    {
        $shipping_address = ShippingAddress::whereUserId(auth()->id())->first();
        return view('user.user-dashboard.billing-address', compact('shipping_address'));
    }

    function update_shipping_address(Request $request): RedirectResponse
    {
        $request->validate([
            'address1' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ]);
        $billing_address = ShippingAddress::whereUserId(auth()->id())->first();

        $billing_address->address1 = $request->address1;
        $billing_address->address2 = $request->address2;
        $billing_address->city = $request->city;
        $billing_address->zip_code = $request->zip_code;
        $billing_address->company = $request->company;
        $billing_address->save();
        return redirect()->route('user.dashboard.billing-address')->with('success', 'Shipping address update successfully');
    }

    function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('user.auth.login')->with('success', 'Logout successfully');
    }

    function deleteAccount(): RedirectResponse
    {
        User::findOrFail(auth()->id())->delete();
        return redirect()->route('user.auth.login')->with('success', 'Account delete success your successfully');
    }
}
