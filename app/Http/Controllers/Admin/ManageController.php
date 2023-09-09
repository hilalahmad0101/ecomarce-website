<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    function index() : View {
        $orders=Order::latest()->get();
        return view('admin.order.all-order',compact('orders'));
    }

    function change_payment_status($id){
        $order=Order::find;
    }
}
