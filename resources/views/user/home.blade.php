@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="slider-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Main Slider-->
                    <div class="hero-slider">
                        <div class="hero-slider-main owl-carousel dots-inside">
                            <div class="item
                                                                    "
                                style="background: url('https://geniusdevs.com/codecanyon/omnimart40/assets/images/16343905891630493728s2.jpg')">
                                <div class="item-inner">
                                    <div class="from-bottom">
                                        <div class="title text-body">50% OFF</div>
                                        <div class="subtitle text-body">Sleeve Party Dress</div>
                                    </div>
                                    <a class="btn btn-primary scale-up delay-1" href="#"> <span>Buy Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="item
                                                                    "
                                style="background: url('https://geniusdevs.com/codecanyon/omnimart40/assets/images/16343906281630493865s3.jpg')">
                                <div class="item-inner">
                                    <div class="from-bottom">
                                        <div class="title text-body">70% OFF</div>
                                        <div class="subtitle text-body">Women Clothing</div>
                                    </div>
                                    <a class="btn btn-primary scale-up delay-1" href="#"> <span>Buy Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <a href="#" class="sright-image">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/ONMF222.jpg" alt="">
                        <div class="inner-content">

                            <p>50% OFF</p>

                            <h4>Watch</h4>
                        </div>
                    </a>
                    <a href="#" class="sright-image mb-0">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/24gX1111.jpg" alt="">
                        <div class="inner-content">
                            <p>40% OFF</p>
                            <h4>Man</h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <section class="service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center mb-30">
                    <div class="single-service single-service2">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/162196463701.png"
                            alt="Shipping">
                        <div class="content">
                            <h6 class="mb-2">Free Worldwide Shipping</h6>
                            <p class="text-sm text-muted mb-0">Free shipping for all orders over $100 Contrary to
                                popular belie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="deal-of-day-section mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">{{ $categories1->name }}</h2>
                        <div class="right-area">
                            <a class="right_link" href="">View
                                All <i class="icon-chevron-right"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="popular-category-slider owl-carousel">
                        @foreach ($categories1->products as $product)
                            <div class="slider-item">
                                <div class="product-card">
                                    <div class="product-thumb">
                                        <img class="lazy" data-src="{{ asset('storage') }}/{{ $product->featured_image }}"
                                            alt="Product">
                                        <div class="product-button-group">
                                            @if (Auth::user() && Auth::user()->id)
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.add_to_wishlist', ['id' => $product->id]) }}"
                                                    title="Wishlist"><i class="icon-heart"></i></a>
                                            @else
                                                <a class="product-button wishlist_store" href="{{ route('user.register') }}"
                                                    title="Wishlist"><i class="icon-heart"></i></a>
                                            @endif

                                            @if (Auth::user() && Auth::user()->id)
                                                <a data-target="" class="product-button product_compare"
                                                    href="{{ route('user.add_to_compare', ['id' => $product->id]) }}"
                                                    title="Compare"><i class="icon-repeat"></i></a>
                                            @else
                                                <a data-target="" class="product-button product_compare"
                                                    href="{{ route('user.register') }}" title="Compare"><i
                                                        class="icon-repeat"></i></a>
                                            @endif

                                            @if (Auth::user() && Auth::user()->id)
                                                <a class="product-button add_to_single_cart" data-target="563"
                                                    href="{{ route('user.add_to_cart', ['id' => $product->id]) }}"
                                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                                </a>
                                            @else
                                                <a class="product-button add_to_single_cart" data-target="563"
                                                    href="{{ route('user.register') }}" title="To Cart"><i
                                                        class="icon-shopping-cart"></i>
                                                </a>
                                            @endif



                                        </div>
                                    </div>
                                    <div class="product-card-body">
                                        <div class="product-category"><a href="">{{ $categories1->name }}</a></div>
                                        <h3 class="product-title"><a
                                                href="{{ route('user.product_details', ['slug'=>$product->slug]) }}">
                                                {{ \Illuminate\Support\Str::substr($product->name, 0, 50) }}
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>${{ $product->previous_price }}</del>

                                            ${{ $product->current_price }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bannner-section mt-60">
        <div class="container ">
            <div class="row gx-3">
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365336391.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>50% OFF</p>
                            <h4>Watch</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365336392.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>40% OFF</p>
                            <h4>Drone</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365336393.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>30% OFF </p>
                            <h4>Phone</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <section class="newproduct-section popular-category-sec mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">Popular Categories</h2>
                        <div class="links">
                            <a class="category_get active" data-target="popular_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Women-Clothing/popular_category/slider"
                                href="javascript:;" class="active">Women Clothing</a>
                            <a class="category_get " data-target="popular_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/men-clothing/popular_category/slider"
                                href="javascript:;" class="">Men Clothing</a>
                            <a class="category_get " data-target="popular_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Electronics/popular_category/slider"
                                href="javascript:;" class="">Electronics</a>
                            <a class="category_get " data-target="popular_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Beauty--Personal-Care/popular_category/slider"
                                href="javascript:;" class="">Beauty &amp; Personal Care</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popular_category_view d-none">
                <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/ajax_loader.gif" alt="">
            </div>

            <div class="row" id="popular_category_view">
                <div class="col-lg-12">
                    <div class="popular-category-slider  owl-carousel">
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135567ZBvH6230e6b983944982bc81e124a6b54484y.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/524"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/524"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="524"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Women-s-Women-Clothing-Women-Dresses-Women-Bodycon------Trendy-Black-Women-s-Sexy-Dres">
                                            Women&#039;s Women Clothing Women Dresse
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341355498taHd734b291822a4cdd8ffe19da91b365e8F.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/525"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/525"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="525"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/New-Women-s-Square-Collar-Pleated-Long-Sleeve-Dresses">
                                            New Women&#039;s Square Collar Pleated L
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135532RFiHb2d512b424b3420899645bdefcc03ca3O.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/526"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/526"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="526"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/OEM-Morden-Fashion-Design-Women-Clothing-Super-Eight-Silk-Wrap-V-neck-Satin-Mini-Dress">
                                            OEM Morden Fashion Design Women Clo
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135517dHKH2477b68e6b044ea98a0614c488203114H.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/527"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/527"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="527"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/New-arrivals-Hot-Sale-Summer-New-Women-s-Long-Dresses-Beach-Floral-Print-Boho-Maxi-Dress">
                                            New arrivals Hot Sale Summer New Wo
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135502CwFH9ef30f583b96459684b6d40a50d441c65.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/528"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/528"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="528"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Bodycon-Tube-Tie-Dye-Summer-Dress-Sun-Dresses------Colorful-Women-Long-Floral-Summer-Dress">
                                            Bodycon Tube Tie Dye Summer Dress S
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135466He5H05e7334ec3664662b136268a00cc2f331.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/529"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/529"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="529"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Plus-size-women-Clothing-floral-print-Long-sleeve-Maxi-African-Split-Dress-for-women">
                                            Plus size women Clothing floral pri
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135447jo2H0c25aedf26654552bd7e1d4c8751ffddM.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/530"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/530"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="530"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Best-Sale-Fashion-Elegant-Muslim-stitching-National-style-vintage-double-pocket-Plaid-islamic-dress">
                                            Best Sale Fashion Elegant Muslim st
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135412IgjH98f42eece72a4cf3980c64ab58dbfd890.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/531"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/531"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="531"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Women-Women-Fall------Women-Clothes-Backless-Halter-Dress-Casual-Jersey-Dress-Mini-Sexy-Knit-Dress">
                                            Women Women Fall 2021 Women Clothes
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$189.78</del>
                                        $144.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">

                                    <div class="product-badge product-badge2 bg-info"> -33%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134144s9RH03667d1e3ae44be08f32b72d840db095J.jpg"
                                        alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/587"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/587"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="587"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-body">
                                    <div class="product-category"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                            Clothing</a></div>
                                    <h3 class="product-title"><a
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/0AENew-French-Elegant-White-Bubble-Sleeve-Party-Dress-Casual-ALine-Dresses-Long-Sleeve-DressesnC">
                                            New French Elegant White Bubble Sle
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                            class="far fa-star filled"></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>$500.78</del>
                                        $344.83
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="bannner-section mt-60">
        <div class="container ">
            <div class="row gx-3">
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img class="lazy"
                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365342794.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>50% OFF</p>

                            <h4>Watch</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img class="lazy"
                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365342795.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>40% OFF</p>

                            <h4> Man</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img class="lazy"
                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16365342796.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>60% OFF </p>

                            <h4>Headphone</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="selected-product-section speacial-product-sec mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <div class="links">
                            <a data-href="https://geniusdevs.com/codecanyon/omnimart40/product/get/type/feature"
                                data-target="type_product_view" href="javascript:;"
                                class="product_get active">Featured</a>
                            <a data-href="https://geniusdevs.com/codecanyon/omnimart40/product/get/type/best"
                                data-target="type_product_view" class="product_get" href="javascript:;">Best
                                Seller</a>
                            <a data-href="https://geniusdevs.com/codecanyon/omnimart40/product/get/type/top"
                                data-target="type_product_view" class="product_get" href="javascript:;">Top
                                Rated</a>
                            <a data-href="https://geniusdevs.com/codecanyon/omnimart40/product/get/type/new"
                                data-target="type_product_view" class="product_get" href="javascript:;">New
                                Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="type_product_view d-none">
                    <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/ajax_loader.gif" alt="">
                </div>
                <div class="col-lg-12" id="type_product_view">

                    <div class="features-slider  owl-carousel">
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134188F6gHTB1ymRhXfjsK1Rjy1Xaq6zispXad.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/586"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/586"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="586"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Beauty--Personal-Care">Beauty
                                                &amp; Personal Care</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Td5BREYLEE-facial-mask-hyaluronic-acid-facial-firming-mask-beautyca">
                                                BREYLEE facial mask hyaluronic acid
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star filled'></i><i class='far fa-star filled'></i><i
                                                class='far fa-star filled'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $1,362.81
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <div class="product-badge product-badge2 bg-info"> -50%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134470aUCH32e77b35ed3e4f359723b0893abdf333y.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/573"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/573"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="573"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Web-Themes--Templates">Web
                                                Themes &amp; Templates</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/e0ACustom-Website-Builder-Shopping-Website-Design-and-DevelopmenthV">
                                                Custom Website Builder Shopping Web
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134755JdFHdb695965a744470b958f17251d4d277ew.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/561"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/561"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="561"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=men-clothing">Men
                                                Clothing</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Men-Shirt-Custom-Shirts-High-Quality-Men-Women-Bamboo-Fiber-Long-Sleeve">
                                                Men Shirt Custom Shirts High Qualit
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135337Pw5H948b3bef197c492d999473dffa5303f9P.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/534"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/534"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="534"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                Clothing</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Top-Sale-High-Quality-Newest-Designs-Custom-Women-Clothing-Wholesale-from-China-Dresses">
                                                Top Sale High Quality Newest Design
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $69.55
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135466He5H05e7334ec3664662b136268a00cc2f331.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/529"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/529"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="529"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                Clothing</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Plus-size-women-Clothing-floral-print-Long-sleeve-Maxi-African-Split-Dress-for-women">
                                                Plus size women Clothing floral pri
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$189.78</del>
                                            $144.83
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="product-card ">
                                <div class="product-thumb">
                                    <div class="product-badge product-badge2 bg-info"> -29%</div>
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135567ZBvH6230e6b983944982bc81e124a6b54484y.jpg"
                                        alt="Product">
                                    <div class="product-button-group"><a class="product-button wishlist_store"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/524"
                                            title="Wishlist"><i class="icon-heart"></i></a>
                                        <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/524"
                                            class="product-button product_compare" href="javascript:;" title="Compare"><i
                                                class="icon-repeat"></i></a>
                                        <a class="product-button add_to_single_cart" data-target="524"
                                            href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-inner">
                                    <div class="product-card-body">
                                        <div class="product-category"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                Clothing</a></div>
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Women-s-Women-Clothing-Women-Dresses-Women-Bodycon------Trendy-Black-Women-s-Sexy-Dres">
                                                Women&#039;s Women Clothing Women Dresse
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$189.78</del>
                                            $144.83
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="flash-sell-new-section mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section-title">
                        <h2 class="h3">Flash Deal</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="flash-deal-slider owl-carousel">
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -29%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134738rC1H7e01b6c3e996405db8555c5e81c8ade0b.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/562"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/562"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="562"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=men-clothing">Men
                                                    Clothing</a></div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Men-Leather-Jacket-Men-New-Men-High-Quality-Collar-Motorcycle-Punk-Leather-Jacket">
                                                    Men Leather Jacket Men New Men High Quality Collar
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$1,893.26</del>

                                                $1,362.81
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -29%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134831EzTH75345266923349e280d5f5e5fd5c71e5a.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/545"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/545"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="545"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Electronics">Electronics</a>
                                            </div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Dropshipping-EIS-----inch-LCD-Full-HD----P-Recording-----Mega-HD-DV-SLR-Camera">
                                                    Dropshipping EIS 2.4 inch LCD Full HD 720P Recordi
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$189.78</del>

                                                $134.83
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -15%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134904Sy7H220c85b541d145789e167a4b23787dd5h.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/542"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/542"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="542"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Electronics">Electronics</a>
                                            </div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Cheap-Price-Mobile-Phones-i---Pro----inch-FHD-Big-Screen-Smart-Phone-------GB">
                                                    Cheap Price Mobile Phones i13 Pro 6.6inch FHD Big
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$1,460.67</del>

                                                $1,235.96
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -18%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134938VjgHcb62dec2d6a241fc90ce2bb04059684em.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/540"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/540"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="540"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Electronics">Electronics</a>
                                            </div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/UMIDIGI-A--Pro-Android-Mobile-Phone--g---MP-Quad-Camera------FHD--Full-Screen--GB-RAM">
                                                    UMIDIGI A9 Pro Android Mobile Phone 4g 48MP Quad C
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$1,910.11</del>

                                                $1,573.03
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -29%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135382cOuUff4a9015ea454a79a2b9e3249bd2e19bg.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/532"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/532"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="532"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                    Clothing</a></div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Shein-Womens-Clothing------Summer-Fashion-Design-Clothing-Manufacturer-Lantern-Long-Sleeve">
                                                    Shein Womens Clothing 2021 Summer Fashion Design C
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$189.78</del>

                                                $144.83
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-card ">
                                    <div class="product-thumb">
                                        <div class="product-badge product-badge2 bg-info"> -29%</div>
                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135412IgjH98f42eece72a4cf3980c64ab58dbfd890.jpg"
                                            alt="Product">
                                        <div class="product-button-group"><a class="product-button"
                                                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/531"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                            <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/531"
                                                class="product-button product_compare" href="javascript:;"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                            <a class="product-button add_to_single_cart" data-target="531"
                                                href="javascript:;" title="To Cart"><i class="icon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">

                                            <div class="product-category"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                                    Clothing</a></div>
                                            <h3 class="product-title"><a
                                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Women-Women-Fall------Women-Clothes-Backless-Halter-Dress-Casual-Jersey-Dress-Mini-Sexy-Knit-Dress">
                                                    Women Women Fall 2021 Women Clothes Backless Halte
                                                </a></h3>
                                            <div class="rating-stars">
                                                <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i><i class='far fa-star'></i><i
                                                    class='far fa-star'></i>
                                            </div>
                                            <h4 class="product-price">
                                                <del>$189.78</del>

                                                $144.83
                                            </h4>
                                            <div class="countdown countdown-alt mb-3" data-date-time="10/10/2023">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flash-sell-area mt-50">
        <div class="container">
            <div class="row gx-3 justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title">
                        <h2 class="h3">Web Themes &amp; Templates</h2>
                    </div>
                    <div class="main-content">
                        <div class="newproduct-slider owl-carousel">
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/fgcBest-Online-Wholesale-Website-Design-and-development-company--Ecommerce-shopping-webdesign8q">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341344113y6Ucc4d26e9889041dc899c3522859ed3f88.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/fgcBest-Online-Wholesale-Website-Design-and-development-company--Ecommerce-shopping-webdesign8q">
                                                Best Online Wholesale Website Design and
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Create-a-Wordpress-Website-Designers-Ecommerce--Multivendor-Website-Software">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134428tuCU4431f054a85341a5a36101d8df36f90a7.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Create-a-Wordpress-Website-Designers-Ecommerce--Multivendor-Website-Software">
                                                Create a Wordpress Website Designers Eco
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $35.00
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/qzswordpress-shopify-Start-Your-Own-eCommerce-Site-Create-Your-Online-Store-Today-online-store-websit5l">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134442OSWHf435248807dd438aaf4d8a53e6f7eaedP.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/qzswordpress-shopify-Start-Your-Own-eCommerce-Site-Create-Your-Online-Store-Today-online-store-websit5l">
                                                wordpress shopify Start Your Own eCommer
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Website-Development-Payment-Gateway-Website-Online-Business-Webdesign-Responsive">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341344598AFHd8e8ee6b580644beba14f0866d6a1269l.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Website-Development-Payment-Gateway-Website-Online-Business-Webdesign-Responsive">
                                                Website Development Payment Gateway Webs
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>
                                </div>

                            </div>
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/e0ACustom-Website-Builder-Shopping-Website-Design-and-DevelopmenthV">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134470aUCH32e77b35ed3e4f359723b0893abdf333y.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/e0ACustom-Website-Builder-Shopping-Website-Design-and-DevelopmenthV">
                                                Custom Website Builder Shopping Website
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Wordpress-Ecommerce-Online-Store-B-C-Online-Shop-Website-Design-Business-Online-Website">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341344897saU32feef72859d4a018dc33710b3647992j.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Wordpress-Ecommerce-Online-Store-B-C-Online-Shop-Website-Design-Business-Online-Website">
                                                Wordpress Ecommerce Online Store B2C Onl
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$70.00</del>
                                            $35.00
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title">
                        <h2 class="h3">Beauty &amp; Personal Care</h2>
                    </div>
                    <div class="main-content">
                        <div class="newproduct-slider owl-carousel">
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Td5BREYLEE-facial-mask-hyaluronic-acid-facial-firming-mask-beautyca">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134188F6gHTB1ymRhXfjsK1Rjy1Xaq6zispXad.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Td5BREYLEE-facial-mask-hyaluronic-acid-facial-firming-mask-beautyca">
                                                BREYLEE facial mask hyaluronic acid faci
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star filled'></i><i class='far fa-star filled'></i><i
                                                class='far fa-star filled'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/p5lHome-Use-Beauty-Device-Face-Massager-Facial-Lifting-Tool-Beauty-AntiAgingbD">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134210aEUHTB1K4CyX6DuK1Rjy1zjq6zraFXaj.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/p5lHome-Use-Beauty-Device-Face-Massager-Facial-Lifting-Tool-Beauty-AntiAgingbD">
                                                Home Use Beauty Device Face Massager Fac
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/sEcLatex-free-makeup-sponge-Customized-beauty-make-up-blender-makeup-spongpD">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134231tV8HTB1HSCEe25G3KVjSZPxq6zI3XXao.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/sEcLatex-free-makeup-sponge-Customized-beauty-make-up-blender-makeup-spongpD">
                                                Latex free makeup sponge Customized beau
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Beauty-Beauty-Anti-wrinkle-USB-Charging-Neck-Wrinkle-Removal-Neck-Care">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/163413424721nHe4cca751c6c94532958892118104e47ck.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Beauty-Beauty-Anti-wrinkle-USB-Charging-Neck-Wrinkle-Removal-Neck-Care">
                                                Beauty Beauty Anti-wrinkle USB Charging
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>

                            </div>
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Mini-Electric-Silicone-Face-Brush-Massager-Cepillo-Facial-Beautiful-Silicone-Facial-Cleansing-Brush">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134262rpfHdee8e662b5c747d69275ffd10450d8c1u.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Mini-Electric-Silicone-Face-Brush-Massager-Cepillo-Facial-Beautiful-Silicone-Facial-Cleansing-Brush">
                                                Mini Electric Silicone Face Brush Massag
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/CGtFace-Lift-Band-Facial-Beauty-Slimming-Double-Chin-Bandage-Strap-Weight1U">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134273FQVHcfd42cbddf7b40b08d3f9048f4d425e5A.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/CGtFace-Lift-Band-Facial-Beauty-Slimming-Double-Chin-Bandage-Strap-Weight1U">
                                                Face Lift Band Facial Beauty Slimming Do
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Mask-stick-to-your-face-moisture-skin-care-clay-facial-natural-moisturiser-low-moq">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341342918rPHabf8df421e5b4d99b802fc6120d050a7N.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Mask-stick-to-your-face-moisture-skin-care-clay-facial-natural-moisturiser-low-moq">
                                                Mask stick to your face moisture skin ca
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Korean-Beauty-Organic-Brightening-Peel-off-Hyaluronic-Acid-Facial-Jelly-Powder">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134515gdzH8064fa369ca644958a52846035a40641p.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Korean-Beauty-Organic-Brightening-Peel-off-Hyaluronic-Acid-Facial-Jelly-Powder">
                                                Korean Beauty Organic Brightening Peel o
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>

                            </div>
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/OEM-ODM-Fullerene-essence-best-face-moisturizer-whitening-anti-aging-cream">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134534qTHH1575ae72d5e144cfbf237196d6ea139bj.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/OEM-ODM-Fullerene-essence-best-face-moisturizer-whitening-anti-aging-cream">
                                                OEM ODM Fullerene essence best face mois
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/AMEIZII-Beauty-And-Personal-Care-Face-Skin-Masks-Nose-Blackhead-Remover">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341345587a1H6e71ffd70a134245aaab2261bf685508j.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/AMEIZII-Beauty-And-Personal-Care-Face-Skin-Masks-Nose-Blackhead-Remover">
                                                AMEIZII Beauty And Personal Care Face Sk
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,893.26</del>
                                            $1,362.81
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title">
                        <h2 class="h3">Electronics</h2>
                    </div>
                    <div class="main-content">
                        <div class="newproduct-slider owl-carousel">
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/DC------DSLR-support---G-sd-card-video-camera----Mega-pixels-digital-camera-dslr-HD-professional">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134811DFfH349db6b6a70c4604b507c446a7b06ae5k.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/DC------DSLR-support---G-sd-card-video-camera----Mega-pixels-digital-camera-dslr-HD-professional">
                                                DC-7200 DSLR support 32G sd card video c
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            $1,352.81
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Dropshipping-EIS-----inch-LCD-Full-HD----P-Recording-----Mega-HD-DV-SLR-Camera">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134831EzTH75345266923349e280d5f5e5fd5c71e5a.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Dropshipping-EIS-----inch-LCD-Full-HD----P-Recording-----Mega-HD-DV-SLR-Camera">
                                                Dropshipping EIS 2.4 inch LCD Full HD 72
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$189.78</del>
                                            $134.83
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Wholesale-Price-----Mega-HD-DV-SLR-Camera------inch-LCD-Full-HD----P-Recording--EIS--Supply-Drops">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134872KxvHTB1BqH4aIfrK1RkSmLyq6xGApXaJ.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Wholesale-Price-----Mega-HD-DV-SLR-Camera------inch-LCD-Full-HD----P-Recording--EIS--Supply-Drops">
                                                Wholesale Price 1.3 Mega HD DV SLR Camer
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$167.30</del>
                                            $156.07
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/New-product------Refurbished-used-smart-phone-for-I-phone-XS-MAX-XR---GB----GB--G">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134888WQ3H624bc94495584b2384c07e2db9f2bdfcd.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/New-product------Refurbished-used-smart-phone-for-I-phone-XS-MAX-XR---GB----GB--G">
                                                New product 2019 Refurbished used smart
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,348.31</del>
                                            $932.58
                                        </h4>
                                    </div>
                                </div>

                            </div>
                            <div class="slider-item">
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Cheap-Price-Mobile-Phones-i---Pro----inch-FHD-Big-Screen-Smart-Phone-------GB">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134904Sy7H220c85b541d145789e167a4b23787dd5h.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Cheap-Price-Mobile-Phones-i---Pro----inch-FHD-Big-Screen-Smart-Phone-------GB">
                                                Cheap Price Mobile Phones i13 Pro 6.6inc
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,460.67</del>
                                            $1,235.96
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/Hot-Selling-s----Unlocked-----MP---Core-Dual-SIM--G---G-Cheap-Smart-Phone-----inch">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341349201T0Ha04a8a2d450544c9a80996bcdd70c543b.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/Hot-Selling-s----Unlocked-----MP---Core-Dual-SIM--G---G-Cheap-Smart-Phone-----inch">
                                                Hot Selling s10+ Unlocked 8+16MP 8 Core
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$189.78</del>
                                            $134.83
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-card p-col">
                                    <a class="product-thumb"
                                        href="https://geniusdevs.com/codecanyon/omnimart40/product/UMIDIGI-A--Pro-Android-Mobile-Phone--g---MP-Quad-Camera------FHD--Full-Screen--GB-RAM">

                                        <img class="lazy"
                                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134938VjgHcb62dec2d6a241fc90ce2bb04059684em.jpg"
                                            alt="Product"></a>
                                    <div class="product-card-body">
                                        <h3 class="product-title"><a
                                                href="https://geniusdevs.com/codecanyon/omnimart40/product/UMIDIGI-A--Pro-Android-Mobile-Phone--g---MP-Quad-Camera------FHD--Full-Screen--GB-RAM">
                                                UMIDIGI A9 Pro Android Mobile Phone 4g 4
                                            </a></h3>
                                        <div class="rating-stars">
                                            <i class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i><i class='far fa-star'></i><i
                                                class='far fa-star'></i>
                                        </div>
                                        <h4 class="product-price">
                                            <del>$1,910.11</del>
                                            $1,573.03
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bannner-section mt-50">
        <div class="container ">
            <div class="row gx-3">
                <div class="col-md-6">
                    <a href="#" class="genius-banner">
                        <img class="lazy"
                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1636534291b22.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>50% OFF</p>
                            <h4>Watch</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="genius-banner">
                        <img class="lazy"
                            data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1636534291b11.jpg"
                            alt="">
                        <div class="inner-content">
                            <p>40% OFF </p>
                            <h4>Headphones</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="selected-product-section featured_cat_sec sps-two mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">Featured Categories</h2>
                        <div class="links">
                            <a class="category_get active" data-target="feature_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Women-Clothing/feature_category/normal"
                                href="javascript:;" class="active">Women Clothing</a>
                            <a class="category_get " data-target="feature_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Web-Themes--Templates/feature_category/normal"
                                href="javascript:;" class="">Web Themes &amp; Templates</a>
                            <a class="category_get " data-target="feature_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Electronics/feature_category/normal"
                                href="javascript:;" class="">Electronics</a>
                            <a class="category_get " data-target="feature_category_view"
                                data-href="https://geniusdevs.com/codecanyon/omnimart40/popular/category/get/Beauty--Personal-Care/feature_category/normal"
                                href="javascript:;" class="">Beauty &amp; Personal Care</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature_category_view d-none">
                <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/ajax_loader.gif" alt="">
            </div>
            <div class="row g-3" id="feature_category_view">
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -33%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134144s9RH03667d1e3ae44be08f32b72d840db095J.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/587"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/587"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="587" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/0AENew-French-Elegant-White-Bubble-Sleeve-Party-Dress-Casual-ALine-Dresses-Long-Sleeve-DressesnC">
                                    New French Elegant White Bubble Sle
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$500.78</del>
                                $344.83
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134958dLZH8b2502797ffe4c93984c99bdd5061ab3W.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/539"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/539"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="539" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Clothing-Women------New-Fashion-Printed-Knitwear-Round-Neck-Casual-Couple-Clothing-Christmas">
                                    Clothing Women 2021 New Fashion Pri
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                $66.18
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -29%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135061epkHd8364db18d9942a38e89779ca3b4fa7an.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/538"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/538"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="538" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/New-Arrive-Spring-Fall-Women-Clothing-Plus-Size-Dresses-Floral-Layered-Ruffle-Off-Shoulder-Dress">
                                    New Arrive Spring Fall Women Clothi
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$189.78</del>
                                $144.83
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -46%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135078ILXH4886d13f040a41739481b3c9bd241aaaa.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/537"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/537"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="537" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Hot-Sale-Women-Clothing------Designer-Clothes-Women-Clothing-Sexy-Dress">
                                    Hot Sale Women Clothing 2021 Design
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$100.00</del>
                                $63.93
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -22%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135094rfSH0f71a2a40cf04ee0b5a03980a5a617020.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/536"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/536"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="536" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/B----------New-Arrivals-Wholesale-Hot-Night-Sexy-Mini-Bodycon-Summer-Dress">
                                    B4301 2021 New Arrivals Wholesale H
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$201.01</del>
                                $167.30
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -29%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341353201KsH408d7d7e37b4437297de600584c1af1fL.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/535"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/535"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="535" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/-----Summer-Women-Clothing-Ropa-Sexy-Lady-Cut-Out-Halter-Mini-Dresses">
                                    2021 Summer Women Clothing Ropa Sex
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$189.78</del>
                                $144.83
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135337Pw5H948b3bef197c492d999473dffa5303f9P.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/534"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/534"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="534" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Top-Sale-High-Quality-Newest-Designs-Custom-Women-Clothing-Wholesale-from-China-Dresses">
                                    Top Sale High Quality Newest Design
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                $69.55
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -29%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16341353638cLHTB1cVsPaEz1gK0jSZLeq6z9kVXay.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/533"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/533"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="533" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Casual-Minimalist-Tie-Waist-women-clothing-Denim-Halter-Midi-Pencil-Sling-Dresses">
                                    Casual Minimalist Tie Waist women c
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$189.78</del>
                                $144.83
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -29%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135382cOuUff4a9015ea454a79a2b9e3249bd2e19bg.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/532"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/532"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="532" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Shein-Womens-Clothing------Summer-Fashion-Design-Clothing-Manufacturer-Lantern-Long-Sleeve">
                                    Shein Womens Clothing 2021 Summer F
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$189.78</del>
                                $144.83
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="col-gd">
                    <div class="product-card">
                        <div class="product-thumb">

                            <div class="product-badge product-badge2 bg-info"> -29%</div>
                            <img class="lazy"
                                data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634135412IgjH98f42eece72a4cf3980c64ab58dbfd890.jpg"
                                alt="Product">
                            <div class="product-button-group"><a class="product-button wishlist_store"
                                    href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlist/store/531"
                                    title="Wishlist"><i class="icon-heart"></i></a>
                                <a data-target="https://geniusdevs.com/codecanyon/omnimart40/compare/product/531"
                                    class="product-button product_compare" href="javascript:;" title="Compare"><i
                                        class="icon-repeat"></i></a>

                                <a class="product-button add_to_single_cart" data-target="531" href="javascript:;"
                                    title="To Cart"><i class="icon-shopping-cart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/catalog?category=Women-Clothing">Women
                                    Clothing</a></div>
                            <h3 class="product-title"><a
                                    href="https://geniusdevs.com/codecanyon/omnimart40/product/Women-Women-Fall------Women-Clothes-Backless-Halter-Dress-Casual-Jersey-Dress-Mini-Sexy-Knit-Dress">
                                    Women Women Fall 2021 Women Clothes
                                </a></h3>
                            <div class="rating-stars">
                                <i class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i><i class="far fa-star filled"></i><i
                                    class="far fa-star filled"></i>
                            </div>
                            <h4 class="product-price">
                                <del>$189.78</del>
                                $144.83
                            </h4>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="blog-section-h page_section mt-50 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="home-blog-slider owl-carousel">
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-8"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349747media_28-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 8
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-7"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349736media_26-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 7
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-6"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349728media_24-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 6
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-5"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349716media_23-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 5
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-4"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349704media_21-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 4
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-3"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349695media_10-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 3
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-2"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349684media_7-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 2
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="slider-item">
                            <a href="https://geniusdevs.com/codecanyon/omnimart40/blog/fashion-and-beauty-series-1"
                                class="blog-post">
                                <div class="post-thumb">
                                    <img class="lazy"
                                        data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632349673media_5-768x512.jpg"
                                        alt="Blog Post">
                                </div>
                                <div class="post-body">

                                    <h3 class="post-title"> Fashion and Beauty Series 1
                                    </h3>
                                    <ul class="post-meta">

                                        <li><i class="icon-user"></i>Admin</li>
                                        <li><i class="icon-clock"></i>31st May, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo
                                        soluta sapiente minus voluptatibus molesti
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="brand-section mt-30 mb-60">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section-title">
                        <h2 class="h3">Popular Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-slider owl-carousel">
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Adidas">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336527add.png"
                                    alt="Adidas" title="Adidas">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Lavie">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336517leves.jpg"
                                    alt="Lavie" title="Lavie">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Skyart">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336538skyart.png"
                                    alt="Skyart" title="Skyart">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Nike">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336489nike.jpg"
                                    alt="Nike" title="Nike">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Samsung">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336479samsung.png"
                                    alt="Samsung" title="Samsung">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Yamaha">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336551yamaha.png"
                                    alt="Yamaha" title="Yamaha">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center" href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=HM">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336576hm.jpg"
                                    alt="H.M" title="H.M">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Loreal">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336591lora.jpg"
                                    alt="Loreal" title="Loreal">
                            </a>
                        </div>
                        <div class="slider-item">
                            <a class="text-center"
                                href="https://geniusdevs.com/codecanyon/omnimart40/catalog?brand=Ascis">
                                <img class="d-block hi-50 lazy"
                                    data-src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1632336642ascis.jpg"
                                    alt="Ascis" title="Ascis">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
