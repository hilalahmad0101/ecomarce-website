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
use App\Models\ManageSite;
use App\Models\Product;
use App\Models\Review;
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
        $categories = Category::latest()->take(4)->get();
        $brands1 = Brand::limit(3)->latest()->get();
        $brands2 = Brand::latest()->get();

        // Access individual categories as needed
        $categories1 = $categories->get(0);
        $categories2 = $categories->get(1);
        $categories3 = $categories->get(2);
        $categories4 = $categories->get(3);


        $categories = Category::latest()->get();
        $services = Service::limit(4)->latest()->get();
        $blogs = Blog::limit(10)->latest()->get();
        $sliders = Slider::limit(4)->latest()->get();

        $home_page = ManageSite::where('key', 'home_page')->first();
        $home_page_value = json_decode($home_page->value);
        $first_three_column = ManageSite::where('key', 'first_three_column')->first();
        $first_three_column_value = json_decode($first_three_column->value);

        $second_three_column = ManageSite::where('key', 'second_three_column')->first();
        $second_three_column_value = json_decode($second_three_column->value);

        $third_two_column = ManageSite::where('key', 'third_two_column')->first();
        $third_two_column_value = json_decode($third_two_column->value);

        $four_three = ManageSite::where('key', 'four_three_column')->first();
        $four_three_column_value = json_decode($four_three->value);
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
            'home_page_value',
            'first_three_column_value',
            'second_three_column_value',
            'four_three_column_value',
            'third_two_column_value',
            'sliders'
        ));
    }

    function add_to_wishlist($id): RedirectResponse
    {
        // instead of this
        $wishlist = Wishlist::where("user_id", auth()->id())->where("product_id", $id)->first();
        $wishlist = Wishlist::where(["user_id" => auth()->id(), "product_id" => $id])->first();

        // do this
        $wishlist = Wishlist::whereUserIdAndProductId(auth()->id(), $id)->first();

        if ($wishlist) {
            return redirect()->back()->with('success', 'Product is already in wishlist');
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $id
            ]);
            return redirect()->back()->with('success', 'Product added to successfully wishlist');
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
            $number = str_replace(",", "", $product->current_price);
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'total' => $number,
                'sub_total' => $number,
                'qty' => 1,
            ]);

            Wishlist::whereProductId($id)->delete();
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

    function search_product(Request $request)
    {
        $category = Category::whereSlug($request->slug)->first();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where('cat_id', $category->id)->where('name', 'LIKE', '%' . $request->search . '%')->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_category($slug): View
    {
        $category = Category::whereSlug($slug)->first();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where('cat_id', $category->id)->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_sub_category($id, $cat_id): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where(['sub_cat_id' => $id, 'cat_id' => $cat_id])->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }


    function product_by_child_category($id, $cat_id, $sub_id): View
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where(['child_cat_id' => $id, 'sub_cat_id' => $sub_id, 'cat_id' => $cat_id])->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function product_by_brand($slug): View
    {
        $brand = Brand::whereSlug($slug)->first();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::where('cat_id', $brand->id)->latest()->get();
        return view('user.shop', compact('categories', 'products', 'brands'));
    }

    function brands(): View
    {
        $brands = Brand::latest()->get();
        return view('user.brand', compact('brands'));
    }

    function category(): View
    {
        $categories = Category::latest()->get();
        return view('user.category', compact('categories'));
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
        $blog = Blog::findOrFail($id);
        $recent_blogs = Blog::limit(4)->latest()->get();
        $categories = BlogCategory::latest()->get();
        return view('user.blog-details', compact('blog', 'categories', 'recent_blogs'));
    }

    function blog_search(Request $request): View
    {
        $blogs = Blog::where('title', 'LIKE', '%' . $request->search . '%')->orWhere('title', 'LIKE', '%' . $request->search . '%')->latest()->get();
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
        $faq  = FaqCategory::findOrFail($id);
        return view('user.faqs', compact('faqs', 'faq'));
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

    function review(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'review' => 'required',
            'product_id' => 'required',
            'subject' => 'required',
        ]);
        Review::create($validate);
        return redirect()->back()->with('success', 'Review Successfully');
    }
}
