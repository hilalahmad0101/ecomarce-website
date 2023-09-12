<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    function index(){
        $compares=Compare::whereUserId(auth()->id())->latest()->get();
        return view('user.compare',compact('compares'));
    }
    function remove_compare($id){
        Compare::findOrFail($id);
        return redirect()->back()->with('success','Compare remove successfully');
    }
}
