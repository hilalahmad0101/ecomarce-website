<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index(): View
    {
        return view('user.checkout');
    }

    function update_billing_address(Request $request)
    {
        $validate = $request->validate([
            'address1'=>'required',
            'address2'=>'required',
            'zip_code'=>'required',
            'city'=>'required',
            'company'=>'required',
            'phone'=>'required',
        ]);

        BillingAddress::create([
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'ZI'=>$request->ZI,
        ]);
    }
}
