<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>

    <!-- SEO Meta Tags-->
    <meta name="keywords" content="Lorem,ipsum,dolor,amet">
    <meta name="description"
        content="Omnimart - Multipurpose eCommerce  Shopping Platform Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over .">
    <meta name="author" content="OmniMart">
    <meta name="distribution" content="web">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon Icons-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/1629651232pre.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/1629651232pre.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/1629651232pre.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/1629651232pre.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets/images/1629651232pre.png') }}">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/front/css/plugins.min.css') }}">


    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('assets/front/css/styles.min.css') }}">

    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('assets/front/css/responsive.css') }}">
    <!-- Color css -->
    <link href="{{ asset('assets/front/css/color.css') }}" rel="stylesheet">

    <!-- Modernizr-->
    <script src="{{ asset('assets/front/js/modernizr.min.js') }}"></script>

    <style>

    </style>









</head>
<!-- Body-->

<body class="
body_theme1
">

    <!-- Preloader Start -->
    {{-- <div id="preloader">
        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16388581681_D-ZiKd0B00tdifaB2X3tKQ.gif"
            alt="Loading...">
    </div> --}}

    <!-- Preloader endif -->


    <!-- Header-->
    <header class="site-header navbar-sticky">
        <div class="menu-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="t-m-s-a">
                            <a class="track-order-link compare-mobile d-lg-none"
                                href="https://geniusdevs.com/codecanyon/omnimart40/compare/products">Compare</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="right-area">

                            <a class="track-order-link wishlist-mobile d-inline-block d-lg-none"
                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlists"><i
                                    class="icon-heart"></i>Wishlist</a>

                            <div class="login-register ">
                                <a class="track-order-link mr-0" href="{{ route('user.register') }}">
                                    Login/Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar-->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between">
                            <!-- Logo-->
                            <div class="site-branding"><a class="site-logo align-self-center"
                                    href="https://geniusdevs.com/codecanyon/omnimart40"><img
                                        src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634218044logoforsite.png"
                                        alt="OmniMart"></a></div>
                            <!-- Search / Categories-->
                            <div class="search-box-wrap d-none d-lg-block d-flex">
                                <form class="input-group" id="" action="{{ route('user.search.product') }}"
                                    method="get">
                                    <div class="search-box-inner align-self-center">
                                        <div class="search-box d-flex">
                                            <select name="slug" id="" class="categoris">
                                                <option value="">All</option>
                                                @php
                                                    $categories = \App\Models\Category::latest()->get();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->slug }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit"><i class="icon-search"></i></button>
                                            </span>
                                            <input class="form-control" type="text"
                                                data-target="https://geniusdevs.com/codecanyon/omnimart40/search/suggest"
                                                id="" name="search"
                                                placeholder="Search by product name">
                                            <div class="serch-result d-none">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <span class="d-block d-lg-none close-m-serch"><i class="icon-x"></i></span>
                            </div>
                            <!-- Toolbar-->
                            <div class="toolbar d-flex">

                                <div class="toolbar-item close-m-serch visible-on-mobile"><a href="#">
                                        <div>
                                            <i class="icon-search"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="toolbar-item visible-on-mobile mobile-menu-toggle"><a href="#">
                                        <div><i class="icon-menu"></i><span class="text-label">Menu</span></div>
                                    </a>
                                </div>

                                <div class="toolbar-item hidden-on-mobile"><a href="">
                                        <div><span class="compare-icon"><i class="icon-repeat"></i><span
                                                    class="count-label compare_count">{{ \App\Models\Compare::where('user_id', auth()->id())->count() }}</span></span><span
                                                class="text-label">Compare</span></div>
                                    </a>
                                </div>
                                <div class="toolbar-item hidden-on-mobile"><a href="{{ route('user.wishlist') }}">
                                        <div>
                                            <span class="compare-icon"><i class="icon-heart"></i><span
                                                    class="count-label cart_count">{{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}
                                                </span></span><span class="text-label">Wishlist</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="toolbar-item"><a href="">
                                        <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span
                                                    class="count-label cart_count">{{ \App\Models\Cart::where('user_id', auth()->id())->sum('qty') }}
                                                </span></span><span class="text-label">Cart</span></div>
                                    </a>
                                    @php
                                        $carts = \App\Models\Cart::where('user_id', auth()->id())
                                            ->latest()
                                            ->get();
                                        $sub_total = \App\Models\Cart::where('user_id', auth()->id())->sum('sub_total');
                                        
                                    @endphp
                                    <div class="toolbar-dropdown cart-dropdown widget-cart  cart_view_header"
                                        id="header_cart_load"
                                        data-target="https://geniusdevs.com/codecanyon/omnimart40/header/cart/load">
                                        @forelse ($carts as $cart)
                                            <div class="entry">
                                                <div class="entry-thumb"><a
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/UMIDIGI-A--Pro-Android-Mobile-Phone--g---MP-Quad-Camera------FHD--Full-Screen--GB-RAM"><img
                                                            src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134938Hcb62dec2d6a241fc90ce2bb04059684em.jpg"
                                                            alt="Product"></a></div>
                                                <div class="entry-content">
                                                    <h4 class="entry-title"><a
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/UMIDIGI-A--Pro-Android-Mobile-Phone--g---MP-Quad-Camera------FHD--Full-Screen--GB-RAM">
                                                            {{ $cart->product->name }}
                                                        </a></h4>
                                                    <span class="entry-meta">{{ $cart->qty }} x
                                                        ${{ $cart->sub_total }}</span>

                                                </div>
                                                <div class="entry-delete"><a
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/cart/destroy/540-"><i
                                                            class="icon-x"></i></a></div>
                                            </div>
                                            
                                           
                                        @empty
                                            Cart empty
                                        @endforelse
                                        <div class="text-right">
                                            <p class="text-gray-dark py-2 mb-0"><span
                                                    class="text-muted">Subtotal:</span> ${{ $sub_total }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="w-50 d-block"><a class="btn btn-primary btn-sm  mb-0"
                                                    href="{{ route('user.cart') }}"><span>Cart</span></a>
                                            </div>
                                            <div class="w-50 d-block text-end"><a
                                                    class="btn btn-primary btn-sm  mb-0"
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/checkout/billing/address"><span>Checkout</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="toolbar-dropdown cart-dropdown widget-cart  cart_view_header"
                                        id="header_cart_load" data-target="">
                                        
                                    </div> --}}


                                </div>
                            </div>
                        </div>

                        <!-- Mobile Menu-->
                        <div class="mobile-menu">
                            <!-- Slideable (Mobile) Menu-->
                            <div class="mm-heading-area">
                                <h4>Navigation</h4>
                                <div class="toolbar-item visible-on-mobile mobile-menu-toggle mm-t-two">
                                    <a href="#">
                                        <div> <i class="icon-x"></i></div>
                                    </a>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation99">
                                    <span class="active" id="mmenu-tab" data-bs-toggle="tab" data-bs-target="#mmenu"
                                        role="tab" aria-controls="mmenu" aria-selected="true">Menu</span>
                                </li>
                                <li class="nav-item" role="presentation99">
                                    <span class="" id="mcat-tab" data-bs-toggle="tab" data-bs-target="#mcat"
                                        role="tab" aria-controls="mcat" aria-selected="false">Category</span>
                                </li>

                            </ul>
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="mmenu" role="tabpanel"
                                    aria-labelledby="mmenu-tab">
                                    <nav class="slideable-menu">
                                        <ul>
                                            <li class="active"><a href="/"><i
                                                        class="icon-chevron-right"></i>Home</a></li>
                                            <li class=""><a href="{{ route('user.shop') }}"><i
                                                        class="icon-chevron-right"></i>Shop</a></li>
                                            <li class=""><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/campaign/products"><i
                                                        class="icon-chevron-right"></i>Campaign</a></li>
                                            <li class=""><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/brands"><i
                                                        class="icon-chevron-right"></i>Brand</a></li>

                                            <li class=""><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/blog"><i
                                                        class="icon-chevron-right"></i>Blog</a></li>
                                            {{-- <li class="t-h-dropdown">
                                                <a class="" href="#"><i
                                                        class="icon-chevron-right"></i>Pages <i
                                                        class="icon-chevron-down"></i></a>
                                                <div class="t-h-dropdown-menu">
                                                    <a class=""
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/faq"><i
                                                            class="icon-chevron-right pr-2"></i>Faq</a>
                                                    <a class=" "
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/about-us"><i
                                                            class="icon-chevron-right pr-2"></i>About Us</a>
                                                    <a class=" "
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/privacy-policy"><i
                                                            class="icon-chevron-right pr-2"></i>Privacy Policy</a>
                                                    <a class=" "
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/terms-and-service"><i
                                                            class="icon-chevron-right pr-2"></i>Terms &amp; Service</a>
                                                    <a class=" "
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/return-policy"><i
                                                            class="icon-chevron-right pr-2"></i>Return Policy</a>
                                                    <a class=" "
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/How-It-Works"><i
                                                            class="icon-chevron-right pr-2"></i>How It Works</a>
                                                </div>
                                            </li> --}}

                                            <li class=""><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/contact"><i
                                                        class="icon-chevron-right"></i>Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="tab-pane fade" id="mcat" role="tabpanel"
                                    aria-labelledby="mcat-tab">
                                    <nav class="slideable-menu">
                                        <div class="widget-categories mobile-cat">
                                            <ul id="category_list">
                                                @foreach ($categories as $category)
                                                    <li class="has-children">
                                                        <a class="category_search"
                                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                            Clothing
                                                            <span><i class="icon-chevron-down"></i></span>
                                                        </a>
                                                        <ul id="subcategory_list">
                                                            <li class="">
                                                                <a class="subcategory"
                                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?subcategory=Womens-Underwear">Women&#039;s
                                                                    Underwear</a>
                                                                <ul id="childcategory_list">
                                                                    <li class="">
                                                                        <a class="childcategory"
                                                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?childcategory=Pajama-Sets">Pajama
                                                                            Sets</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar-->
        <div class="navbar">
            <div class="container">
                <div class="row g-3 w-100">
                    <div class="col-lg-3">
                        <div class="left-category-area">
                            <div class="category-header">
                                <h4><i class="icon-align-justify"></i> Categories</h4>
                            </div>
                            <div class="category-list">
                                @php
                                    $categories1 = \App\Models\Category::where('status', 1)
                                        ->limit(8)
                                        ->with('sub_category')
                                        ->latest()
                                        ->get();
                                @endphp
                                @foreach ($categories1 as $category)
                                    <div class="c-item">
                                        <a class="d-block navi-link"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category={{ $category->slug }}">
                                            <img class="lazy"
                                                data-src="{{ asset('storage') }}/{{ $category->image }}">
                                            <span class="text-gray-dark">{{ $category->name }}</span>
                                            <i class="icon-chevron-right"></i>
                                        </a>
                                        <div class="sub-c-box">
                                            <div class="child-c-box">
                                                @foreach ($category->sub_category as $sub_category)
                                                    <a class="title"
                                                        href="https://geniusdevs.com/codecanyon/omnimart40/catalog?subcategory={{ $sub_category->slug }}">
                                                        {{ $sub_category->name }}
                                                        <i class="icon-chevron-right"></i>
                                                    </a>
                                                    <div class="child-category">
                                                        @foreach ($sub_category->child_category as $child_category)
                                                            <a
                                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?childcategory={{ $child_category->slug }}">{{ $child_category->name }}</a>
                                                        @endforeach

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <a href="https://geniusdevs.com/codecanyon/omnimart40/catalog"
                                    class="d-block navi-link view-all-category">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/category.jpg"
                                        alt="">
                                    <span class="text-gray-dark">All Categories</span>
                                </a>
                            </div>


                        </div>


                    </div>
                    <div class="col-lg-9 d-flex justify-content-between">
                        <div class="nav-inner">
                            <nav class="site-menu">
                                <ul>
                                    <li class="t-h-dropdown  active">
                                        <a class="main-link" href="/">Home</a>
                                    </li>
                                    <li class=""><a href="{{ route('user.shop') }}">Shop</a></li>
                                    <li class=""><a href="{{ route('user.category') }}">Category</a>
                                    </li>
                                    <li class=""><a href="{{ route('user.brand') }}">Brand</a></li>
                                    <li class=""><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/blog">Blog</a></li>
                                    <li class=""><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- Page Content-->

    @yield('content')


    <!--    announcement banner section start   -->
    {{-- <a class="announcement-banner" href="#announcement-modal"></a>
    <div id="announcement-modal" class="mfp-hide white-popup d-none">
        <div class="announcement-with-content">
            <div class="left-area">
                <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1638791990Untitled-1.jpg"
                    alt="">
            </div>
            <div class="right-area">
                <h3 class="">Get 50% Discount.</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, facere nesciunt doloremque
                    nobis debitis sint?</p>
                <form class="subscriber-form" action="https://geniusdevs.com/codecanyon/omnimart40/subscriber/submit"
                    method="post">
                    <input type="hidden" name="_token" value="qYRQwOc3pjdT0Bvq9gFiqBQZceM45tq5xC53blMH">
                    <div class="input-group">
                        <input class="form-control" type="email" name="email" placeholder="Your e-mail">
                        <span class="input-group-addon"><i class="icon-mail"></i></span>
                    </div>
                    <div aria-hidden="true">
                        <input type="hidden" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                    </div>

                    <button class="btn btn-primary btn-block mt-2" type="submit">
                        <span>Subscribe</span>
                    </button>
                </form>
            </div>
        </div>


    </div> --}}
    <!--    announcement banner section end   -->

    <!-- Site Footer-->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Contact Info-->
                    <section class="widget widget-light-skin">
                        <h3 class="widget-title">Get In Touch</h3>
                        <p class="mb-1"><strong>Address: </strong> 514 S. Magnolia St. Orlando, FL 32806, USA</p>
                        <p class="mb-1"><strong>Phone: </strong> 453876234</p>
                        <p class="mb-3"><strong>Email: </strong> demoemail123@gmail.com</p>
                        <ul class="list-unstyled text-sm">
                            <li><span class=""><strong>Monday-Friday: </strong></span>9:27 PM - 9:27 PM</li>
                            <li><span class=""><strong>Saturday: </strong></span>9:27 PM - 9:27 PM</li>
                        </ul>
                        <div class="footer-social-links">
                            <a href="https://www.facebook.com"><span><i class="fab fa-facebook-f"></i></span></a>
                            <a href="https://www.twitter.com"><span><i class="fab fa-twitter"></i></span></a>
                            <a href="https://www.youtube.com"><span><i class="fab fa-youtube"></i></span></a>
                            <a href="https://www.linkedin.com"><span><i class="fab fa-linkedin-in"></i></span></a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Customer Info-->
                    <div class="widget widget-links widget-light-skin">
                        <h3 class="widget-title">Usefull Links</h3>
                        <ul>
                            <li>
                                <a class="" href="https://geniusdevs.com/codecanyon/omnimart40/faq">Faq</a>
                            </li>
                            <li><a href="https://geniusdevs.com/codecanyon/omnimart40/about-us">About Us</a></li>

                            <li><a href="https://geniusdevs.com/codecanyon/omnimart40/privacy-policy">Privacy
                                    Policy</a></li>

                            <li><a href="https://geniusdevs.com/codecanyon/omnimart40/terms-and-service">Terms &amp;
                                    Service</a></li>

                            <li><a href="https://geniusdevs.com/codecanyon/omnimart40/return-policy">Return Policy</a>
                            </li>

                            <li><a href="https://geniusdevs.com/codecanyon/omnimart40/How-It-Works">How It Works</a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Subscription-->
                    <section class="widget">
                        <h3 class="widget-title">Newsletter</h3>
                        <form class="row subscriber-form"
                            action="https://geniusdevs.com/codecanyon/omnimart40/subscriber/submit" method="post">
                            <input type="hidden" name="_token" value="qYRQwOc3pjdT0Bvq9gFiqBQZceM45tq5xC53blMH">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Your e-mail">
                                    <span class="input-group-addon"><i class="icon-mail"></i></span>
                                </div>
                                <div aria-hidden="true">
                                    <input type="hidden" name="b_c7103e2c981361a6639545bd5_1194bb7544"
                                        tabindex="-1">
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary btn-block mt-2" type="submit">
                                    <span>Subscribe</span>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <p class="text-sm opacity-80 pt-2">Subscribe to our Newsletter to receive early
                                    discount offers, latest news, sales and promo information.</p>
                            </div>
                        </form>
                        <div class="pt-3"><img class="d-block gateway_image"
                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16305963101621960148credit-cards-footer.png">
                        </div>
                    </section>
                </div>
            </div>
            <!-- Copyright-->
            <p class="footer-copyright"> OmniMart © All rights reserved.</p>
        </div>
    </footer>

    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#">
        <i class="icon-chevron-up"></i>
    </a>

    <div class="color-picker">
        <span class="spiner"><i class="fas fa-cog fa-spin"></i></span>
        <a href="javascript:;" class="color__check " style="background: #FF6A00;" data-href="FF6A00"></a>
        <a href="javascript:;" class="color__check " style="background: #ff4719;" data-href="ff4719"></a>
        <a href="javascript:;" class="color__check " style="background: #03a9f4;" data-href="03a9f4"></a>
        <a href="javascript:;" class="color__check " style="background: #A120CB;" data-href="A120CB"></a>
        <a href="javascript:;" class="color__check " style="background: #12A05C;" data-href="12A05C"></a>
        <a href="javascript:;" class="color__check " style="background: #000;" data-href="000"></a>
    </div>

    <!-- Backdrop-->
    <div class="site-backdrop"></div>

    <!-- Cookie alert dialog  -->

    <!-- Cookie alert dialog  -->



    <script>
        var mainbs = {
            "is_announcement": "1",
            "announcement_delay": "1.00",
            "overlay": null
        };
        var decimal_separator = '.';
        var thousand_separator = ',';
    </script>

    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script type="text/javascript" src="{{ asset('assets/front/js/plugins.min.js') }}"></script>
    {{-- <script type="text/javascript"
        src="https://geniusdevs.com/codecanyon/omnimart40/assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js'">
    </script> --}}
    <script type="text/javascript" src="{{ asset('assets/front/js/scripts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/lazy.plugin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/myscript.js') }}"></script>


    <script type="text/javascript">
        $(document).on('click', '.spiner', function() {
            $('.color-picker').toggleClass('active');
        })
    </script>


</body>

</html>
