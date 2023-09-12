<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function index() {
        $users=User::latest()->get();
        return view('admin.customer.index',compact('users'));
    }

    function edit($id)  {
        $user=User::findOrFail($id);
        return view('admin.customer.update',compact('user'));
    }
    function update(Request $request,$id)  {
        $user=User::findOrFail($id);
        $user->name=$request->first_name .' '.$request->last_name; 
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.customer')->with('success','User update successufully');
    }
    function delete($id)  {
        $user=User::findOrFail($id)->delete();
        return redirect()->back()->with('success','User delete successfully');
        // $path=public_path('storage\\'.$user->.)
    }
}
