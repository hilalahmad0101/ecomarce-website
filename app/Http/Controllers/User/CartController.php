<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {
        $carts = Cart::whereUserId(auth()->id())->latest()->get();
        $total_cart=Cart::where('user_id',auth()->id())->sum('sub_total');
        return view('user.cart', compact('carts','total_cart'));
    }

    function clearCart()
    {
        Cart::whereUserId(auth()->id())->delete();
        return redirect()->route('user.cart')->with('success', 'cart empty successfully');
    }
    function removeCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('user.cart')->with('success', 'cart item remove successfully');
    }

    function update_cart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $number = str_replace(",", "", $cart->product->current_price);
        $cart->qty = $request->qty;
        $cart->total = $cart->product->current_price;
        $cart->sub_total = intval($request->qty) * intval($number);
        $cart->save();
        return redirect()->route('user.cart')->with('success', 'cart update successfully');
    }
}
