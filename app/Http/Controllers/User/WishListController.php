<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    function index(): View
    {
        $wishlists = Wishlist::whereUserId(auth()->id())->get();
        return view('user.wishlists', compact('wishlists'));
    }

    function clear_wishlist()
    {
        Wishlist::whereUserId(auth()->id())->delete();
        return redirect()->route('user.wishlist')->with('success', 'wishlist empty successfully');
    }

    function remove_wishlist($id)
    {
        Wishlist::findOrFail($id)->delete();
        return redirect()->route('user.wishlist')->with('success', 'wishlist remove successfully');
    }
}
