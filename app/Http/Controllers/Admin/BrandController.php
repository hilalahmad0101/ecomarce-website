<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    function index(): View
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }
    function create(): View
    {
        return view('admin.brand.create');
    }
    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:brands',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2096',
        ]);

        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('brand', 'public');
        }
        $brand = new Brand();
        $brand->image = $filename;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand add successfully');
    }
    function edit($id): View
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.update', compact('brand'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2096',
        ]);

        $brand = Brand::findOrFail($id);
        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('brand', 'public');
        } else {
            $filename = $brand->image;
        }
        $brand->image = $filename;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Brand Update successfully');
    }
    function delete($id): RedirectResponse
    {
        $brand = Brand::findOrFail($id);
        $path = public_path('storage\\' . $brand->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Brand Delete successfully');
    }

    function update_status($id): RedirectResponse
    {
        $brand = Brand::findOrFail($id);
        if ($brand->status == 1) {
            $brand->status = 0;
            $brand->save();

            return redirect()->route('admin.brand.index')->with('success', 'Brand Status un-active successfully');
        } else {
            $brand->status = 1;
            $brand->save();

            return redirect()->route('admin.brand.index')->with('success', 'Brand Status active successfully');
        }
    }
}
