<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;

class FaqCategoryController extends Controller
{
    function index(): View
    {
        $faq_categories = FaqCategory::latest()->get();
        return view('admin.faq-category.index', compact('faq_categories'));
    }
    function create(): View
    {
        return view('admin.faq-category.create');
    }
    function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|unique:faq_categories',
            'text' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        FaqCategory::create([
            'name' => $validate['name'],
            'text' => $validate['text'],
            'slug' => Str::slug($validate['name']),
            'meta_keyword' => $validate['meta_keyword'],
            'meta_description' => $validate['meta_description'],
        ]);
        return redirect()->route('admin.faq-category.index')->with('success', 'Faq category add successfully');
    }
    function edit($id): View
    {
        $faq_category = FaqCategory::findOrFail($id);
        return view('admin.faq-category.update', compact('faq_category'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        FaqCategory::where('id', $id)->update([
            'name' => $validate['name'],
            'text' => $validate['text'], // add this line just for now
            'slug' => Str::slug($validate['name']),
            'meta_keyword' => $validate['meta_keyword'],
            'meta_description' => $validate['meta_description'],
        ]);
        return redirect()->route('admin.faq-category.index')->with('success', 'Faq category update successfully');
    }
    function delete($id): RedirectResponse
    {
        FaqCategory::findOrFail($id)->delete();
        return redirect()->route('admin.faq-category.index')->with('success', 'Faq category delete successfully');
    }

    function update_status($id): RedirectResponse
    {
        $faq_category = FaqCategory::findOrFail($id);
        if ($faq_category->status == 1) {
            $faq_category->status = 0;
            $faq_category->save();

            return redirect()->route('admin.faq-category.index')->with('success', 'FaqCategory Status un-active successfully');
        } else {
            $faq_category->status = 1;
            $faq_category->save();

            return redirect()->route('admin.faq-category.index')->with('success', 'FaqCategory Status active successfully');
        }
    }
}
