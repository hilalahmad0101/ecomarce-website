<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    function index(): View
    {
        $child_categories = ChildCategory::latest()->get();
        return view('admin.child-category.index', compact('child_categories'));
    }
    function create(): View
    {
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        return view('admin.child-category.create', compact('categories', 'sub_categories'));
    }
    function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:child_categories',
            'cat_id' => 'required|exists:categories,id',
            'sub_cat_id' => 'required|exists:sub_categories,id'
        ]);

        $child_category = new ChildCategory();
        $child_category->name = $request->name;
        $child_category->slug = Str::slug($request->name);
        $child_category->cat_id = $request->cat_id;
        $child_category->sub_cat_id = $request->sub_cat_id;
        $child_category->save();
        return redirect()->route('admin.child-category.index')->with('success', 'ChildCategory add successfully');
    }
    function edit($id): View
    {
        $child_category = ChildCategory::findOrFail($id);
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        return view('admin.child-category.update', compact('child_category', 'categories', 'sub_categories'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'sub_cat_id' => 'required|exists:sub_categories,id'
        ]);

        $child_category = ChildCategory::findOrFail($id);
        $child_category->name = $request->name;
        $child_category->slug = Str::slug($request->name);
        $child_category->cat_id = $request->cat_id;
        $child_category->sub_cat_id = $request->sub_cat_id;
        $child_category->save();
        return redirect()->route('admin.child-category.index')->with('success', 'ChildCategory Update successfully');
    }
    function delete($id): RedirectResponse
    {
        ChildCategory::findOrFail($id)->delete();
        return redirect()->route('admin.child-category.index')->with('success', 'ChildCategory Delete successfully');
    }

    function update_status($id): RedirectResponse
    {
        $child_category = ChildCategory::findOrFail($id);
        if ($child_category->status == 1) {
            $child_category->status = 0;
            $child_category->save();
            return redirect()->route('admin.child-category.index')->with('success', 'ChildCategory Status un-active successfully');
        } else {
            $child_category->status = 1;
            $child_category->save();
            return redirect()->route('admin.child-category.index')->with('success', 'ChildCategory Status active successfully');
        }
    }

    function get_sub_category(Request $request)
    {
        $sub_categories = SubCategory::where('cat_id', $request->cat_id)->latest()->get();
        $output = "";
        if (count($sub_categories) > 0) {
            foreach ($sub_categories as $category) {
                $output .= "<option value='{$category->id}'>{$category->name}</option>";
            }
        } else {
            $output .= "<option value=''>Record not found</option>";
        }

        echo $output;
    }


    function update_sub_category(Request $request)
    {
        $sub_categories = SubCategory::where('cat_id', $request->cat_id)->latest()->get();
        $output = "";
        $category1 = Category::findOrFail($request->cat_id);
        if (count($sub_categories) > 0) {
            foreach ($sub_categories as $category) {
                $output .= "<option  value='{$category->id}'>{$category->name}</option>";
            }
        } else {
            $output .= "<option value=''>Record not found</option>";
        }

        echo $output;
    }
}
