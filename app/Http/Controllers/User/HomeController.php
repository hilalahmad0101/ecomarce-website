<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Compare;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(): View
    {
        $categories1 = Category::skip(0)->limit(1)->latest()->first();
        $categories2 = Category::skip(1)->limit(1)->latest()->first();
        $categories3 = Category::skip(2)->limit(1)->latest()->first();
        $categories4 = Category::skip(3)->limit(1)->latest()->first();
        $brands1 = Brand::limit(3)->latest()->get();
        $brands2 = Brand::latest()->get();
        $categories = Category::latest()->get();
        $services = Service::limit(4)->latest()->get();
        $blogs = Blog::limit(10)->latest()->get();
        $sliders = Slider::limit(4)->latest()->get();
        return view('user.home', compact(
            'categories1',
            'categories2',
            'categories3',
            'categories4',
            'brands2',
            'brands1',
            'categories',
            'services',
            'blogs',
        ));
    }

    function add_to_wishlist($id): RedirectResponse
    {
        $wishlist = Wishlist::whereUserIdAndProductId(auth()->id(), $id)->first();
        if ($wishlist) {
            return redirect()->back()->with('success', 'Product already in wishlist');
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $id
            ]);
            return redirect()->back()->with('success', 'Product add to successfully wishlist');
        }
    }

    function add_to_compare($id): RedirectResponse
    {
        $compare = Compare::whereUserIdAndProductId(auth()->id(), $id)->first();
        if ($compare) {
            return redirect()->back()->with('success', 'Product already in compare');
        } else {
            Compare::create([
                'user_id' => auth()->id(),
                'product_id' => $id
            ]);
            return redirect()->back()->with('success', 'Product add to successfully compare');
        }
    }

    function add_to_cart($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $cart = Cart::whereUserIdAndProductId(auth()->id(), $id)->first();
        if ($cart) {
            $cart->qty = $cart->qty + 1;
            $cart->sub_total = $cart->total * $cart->qty;
            $cart->save();
            return redirect()->back()->with('success', 'Product update successfully');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'total' => $product->current_price,
                'sub_total' => $product->current_price,
                'qty' => 1,
            ]);
            return redirect()->back()->with('success', 'Product add to cart successfully');
        }
    }

    function product_details($slug): View
    {
        $product = Product::whereSlug($slug)->first();
        if ($product) {
            $products = Product::whereCatId($product->cat_id)->latest()->get();
            return view('user.product-details', compact('product', 'products'));
        } else {
            return abort(404);
        }
    }

    function shop(Request $request): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_category($id): View
    {

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where('cat_id', $id)->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_sub_category($id,$cat_id): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where(['sub_cat_id' => $id, 'cat_id' => $cat_id])->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }


    function product_by_child_category( $id,$cat_id, $sub_id): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where(['child_cat_id' => $id, 'sub_cat_id' => $sub_id, 'cat_id' => $cat_id])->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_brand($id): View
    {

        $category = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where('cat_id', $id)->latest()->get();
        return view('user.shop', compact('category', 'products', 'brands'));
    }

    function brands(): View
    {
        $brands = Brand::latest()->get();
        return view('user.brand', compact('brands'));
    }

    function blog(): View
    {
        $blogs = Blog::latest()->get();
        $recent_blogs = Blog::limit(4)->latest()->get();
        $categories = BlogCategory::latest()->get();
        return view('user.blog', compact('blogs', 'categories', 'recent_blogs'));
    }

    function blog_by_category($id): View
    {
        $blogs = Blog::where('cat_id', $id)->latest()->get();
        $recent_blogs = Blog::where('cat_id', $id)->limit(4)->latest()->get();
        $categories = BlogCategory::latest()->get();
        return view('user.blog', compact('blogs', 'categories', 'recent_blogs'));
    }


    function blog_details($id): View
    {
        $blogs = Blog::findOrFail($id);
        $recent_blogs = Blog::limit(4)->latest()->get();
        $categories = BlogCategory::latest()->get();
        return view('user.blog', compact('blogs', 'categories', 'recent_blogs'));
    }


    function faq_category(): View
    {
        $faq_categories = FaqCategory::latest()->get();
        return view('user.faq-category', compact('faq_categories'));
    }

    function faq_by_category($id): View
    {
        $faqs = Faq::where('cat_id', $id)->latest()->get();
        return view('user.faqs', compact('faqs'));
    }

    function subscribe(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'email' => 'required|email|exists:subscribes'
        ]);
        Subscribe::create($validate);
        return redirect()->back()->with('success', 'Subscribe successfully');
    }

    function contact(): View
    {
        return view('user.contact');
    }

    function save_contact(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);
        Contact::create($validate);
        return redirect()->back()->with('success', 'Contact save successfully');
    }
}
