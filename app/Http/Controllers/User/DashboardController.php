<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class DashboardController extends Controller
{
    function index()
    {
        $pending_orders = Order::whereUserIdAndOrderStatus(auth()->id(), 'pending')->count();
        $progress_orders = Order::whereUserIdAndOrderStatus(auth()->id(), 'progress')->count();
        $delivered_orders = Order::whereUserIdAndOrderStatus(auth()->id(), 'delivered')->count();
        $canceled_orders = Order::whereUserIdAndOrderStatus(auth()->id(), 'canceled')->count();
        $all_orders = Order::whereUserId(auth()->id())->count();
        return view('user.auth.dashboard', compact(
            'pending_orders',
            'progress_orders',
            'all_orders',
            'canceled_orders',
            'delivered_orders'
        ));
    }

    function show_profile()
    {
        return view('user.auth.profile');
    }

    function update_profile(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $filename = '';
        if ($request->file('photo')) {
            $filename = $request->file('photo')->store('profile', 'public');
        } else {
            $filename = $user->photo;
        }
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->photo = $filename;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.dashboard.profile')->with('success', 'User update successfully');
    }

    function show_address()
    {
        $address = BillingAddress::whereUserId(auth()->id())->first();
        return view('user.auth.address', compact('address'));
    }

    function update_address(Request $request)
    {
        $address = BillingAddress::whereUserId(auth()->id())->first();
        $address->address1 = $request->address1;
        $address->address2 = $request->address2;
        $address->zip_code = $request->zip_code;
        $address->city = $request->city;
        $address->company = $request->company;
        $address->save();
        return redirect()->route('user.dashboard.address')->with('success', 'User update successfully');
    }

    function  logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
