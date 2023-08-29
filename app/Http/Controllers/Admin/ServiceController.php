<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    function index(): View
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }
    function create(): View
    {
        return view('admin.service.create');
    }
    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2096',
        ]);

        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('service', 'public');
        }
        $service = new Service();
        $service->image = $filename;
        $service->title = $request->title;
        $service->details = $request->details;
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service add successfully');
    }
    function edit($id): View
    {
        $service = Service::findOrFail($id);
        return view('admin.service.update', compact('service'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2096',
        ]);
        $service = Service::findOrFail($id);
        $filename = '';
        if ($request->file('image')) {
            $filename = $request->file('image')->store('service', 'public');
        } else {
            $filename = $request->image;
        }
        $service->image = $filename;
        $service->title = $request->title;
        $service->details = $request->details;
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service Update successfully');
    }
    function delete($id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        $path = public_path('storage\\' . $service->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service Delete successfully');
    }
}
