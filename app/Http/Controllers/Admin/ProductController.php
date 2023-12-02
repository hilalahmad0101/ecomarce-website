<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Str;

class ProductController extends Controller
{
    function index(): View
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }
    function create(): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.create', compact('categories', 'brands'));
    }
    function store(Request $request): RedirectResponse
    {


        $request->validate([
            'name' => 'required|unique:products',
            'featured_image' => 'required|image|mimes:jpg,png,jpeg|max:2096',
            'short_description' => 'required',
            'description' => 'required',
            'tags' => 'required',
            // 'specifications' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'current_price' => 'required',
            'previous_price' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'sub_cat_id' => 'required|exists:sub_categories,id',
            'child_cat_id' => 'required|exists:child_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'total_stock' => 'required',
        ]);


        $filename = '';
        if ($request->file('featured_image')) {
            $filename = $request->file('featured_image')->store('products', 'public');
        }


        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->featured_image = $filename;
        $product->images = json_encode(['', '']);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->specifications = json_encode($request->specifications);
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->current_price = $request->current_price;
        $product->previous_price = $request->previous_price;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->child_cat_id = $request->child_cat_id;
        $product->brand_id = $request->brand_id;
        $product->total_stock = $request->total_stock;
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product Add successfully');
    }
    function edit($id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.update', compact('product','brands','categories'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2096',
            'short_description' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'current_price' => 'required',
            'previous_price' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'sub_cat_id' => 'required|exists:sub_categories,id',
            'child_cat_id' => 'required|exists:child_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'total_stock' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $filename = '';
        if ($request->file('featured_image')) {
            $filename = $request->file('featured_image')->store('products', 'public');
        } else {
            $filename = $product->featured_image;
        }


        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->featured_image = $filename;
        $product->images = json_encode(['', '']);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->specifications = json_encode($request->specifications);
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->current_price = $request->current_price;
        $product->previous_price = $request->previous_price;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->child_cat_id = $request->child_cat_id;
        $product->brand_id = $request->brand_id;
        $product->total_stock = $request->total_stock;
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product Update successfully');
    }
    function delete($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $featured_image = public_path('storage\\' . $product->featured_image);
        foreach ($product->images as $img) {
            $images = public_path('storage\\' . $img);
            if (File::exists($images)) {
                File::delete($images);
            }
        }
        if (File::exists($featured_image)) {
            File::delete($featured_image);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product delete successfully');
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


    function get_child_category(Request $request)
    {
        $child_categories = ChildCategory::where('sub_cat_id', $request->sub_cat_id)->latest()->get();
        $output = "";
        if (count($child_categories) > 0) {
            foreach ($child_categories as $category) {
                $output .= "<option value='{$category->id}'>{$category->name}</option>";
            }
        } else {
            $output .= "<option value=''>Record not found</option>";
        }

        echo $output;
    }

    function update_status($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $product->status = 0;
            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'Product Status un-active successfully');
        } else {
            $product->status = 1;
            $product->save();
            return redirect()->route('admin.product.index')->with('success', 'Product Status active successfully');
        }
    }
}
