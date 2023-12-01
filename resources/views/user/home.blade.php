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
                            @foreach ($sliders as $slider)
                                <div class="item" style="background: url('{{ asset('storage') }}/{{ $slider->image }}')">
                                    <div class="item-inner">
                                        <div class="from-bottom">
                                            <div class="title text-body">{{ $slider->title }}</div>
                                            <div class="subtitle text-body">{{ $slider->details }}</div>
                                        </div>
                                        <a class="btn btn-primary scale-up delay-1" href="{{ $slider->url }}"> <span>Buy
                                                Now</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <a href="#" class="sright-image">
                        <img src="{{ asset('storage') }}/{{ $home_page_value->image1 }}" alt="">
                        <div class="inner-content">

                            <p>{{ $home_page_value->title1 }}</p>

                            <h4>{{ $home_page_value->sub_title1 }}</h4>
                        </div>
                    </a>
                    <a href="#" class="sright-image">
                        <img src="{{ asset('storage') }}/{{ $home_page_value->image2 }}" alt="">
                        <div class="inner-content">

                            <p>{{ $home_page_value->title2 }}</p>

                            <h4>{{ $home_page_value->sub_title2 }}</h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <section class="service-section">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-sm-6 text-center mb-30">
                        <div class="single-service single-service2">
                            <img src="{{ asset('storage') }}/{{ $service->image }}" alt="Shipping">
                            <div class="content ml-3">
                                <h6 class="mb-2 ">{{ $service->title }}</h6>
                                <p class="text-sm text-muted mb-0">{{ $service->sub_title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

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
                                        <img class="lazy"
                                            data-src="{{ asset('storage') }}/{{ $product->featured_image }}"
                                            alt="Product">
                                        <div class="product-button-group">
                                            @if (Auth::user() && Auth::user()->id)
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.add_to_wishlist', ['id' => $product->id]) }}"
                                                    title="Wishlist"><i class="icon-heart"></i></a>
                                            @else
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.register') }}" title="Wishlist"><i
                                                        class="icon-heart"></i></a>
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
                                        <div class="product-category"><a href="/shop/category/{{ $categories1->slug }}">{{ $categories1->name }}</a></div>
                                        <h3 class="product-title"><a
                                                href="{{ route('user.product_details', ['slug' => $product->slug]) }}">
                                                {{ \Illuminate\Support\Str::substr($product->name, 0, 50) }}
                                            </a></h3>

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
                        <img src="{{ asset('storage') }}/{{ $first_three_column_value->image1 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $first_three_column_value->title1 }}</p>
                            <h4>{{ $first_three_column_value->sub_title1 }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $first_three_column_value->image2 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $first_three_column_value->title2 }}</p>
                            <h4>{{ $first_three_column_value->sub_title2 }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $first_three_column_value->image3 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $first_three_column_value->title3 }}</p>
                            <h4>{{ $first_three_column_value->sub_title3 }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="deal-of-day-section mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">{{ $categories2->name }}</h2>
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
                        @foreach ($categories2->products as $product)
                            <div class="slider-item">
                                <div class="product-card">
                                    <div class="product-thumb">
                                        <img class="lazy"
                                            data-src="{{ asset('storage') }}/{{ $product->featured_image }}"
                                            alt="Product">
                                        <div class="product-button-group">
                                            @if (Auth::user() && Auth::user()->id)
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.add_to_wishlist', ['id' => $product->id]) }}"
                                                    title="Wishlist"><i class="icon-heart"></i></a>
                                            @else
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.register') }}" title="Wishlist"><i
                                                        class="icon-heart"></i></a>
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
                                        <div class="product-category"><a href="/shop/category/{{ $categories2->slug }}">{{ $categories2->name }}</a>
                                        </div>
                                        <h3 class="product-title"><a
                                                href="{{ route('user.product_details', ['slug' => $product->slug]) }}">
                                                {{ \Illuminate\Support\Str::substr($product->name, 0, 50) }}
                                            </a></h3>

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
                        <img src="{{ asset('storage') }}/{{ $second_three_column_value->image1 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $second_three_column_value->title1 }}</p>
                            <h4>{{ $second_three_column_value->sub_title1 }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $second_three_column_value->image2 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $second_three_column_value->title2 }}</p>
                            <h4>{{ $second_three_column_value->sub_title2 }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $second_three_column_value->image3 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $second_three_column_value->title3 }}</p>
                            <h4>{{ $second_three_column_value->sub_title3 }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="deal-of-day-section mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3">{{ $categories3->name }}</h2>
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
                        @foreach ($categories3->products as $product)
                            <div class="slider-item">
                                <div class="product-card">
                                    <div class="product-thumb">
                                        <img class="lazy"
                                            data-src="{{ asset('storage') }}/{{ $product->featured_image }}"
                                            alt="Product">
                                        <div class="product-button-group">
                                            @if (Auth::user() && Auth::user()->id)
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.add_to_wishlist', ['id' => $product->id]) }}"
                                                    title="Wishlist"><i class="icon-heart"></i></a>
                                            @else
                                                <a class="product-button wishlist_store"
                                                    href="{{ route('user.register') }}" title="Wishlist"><i
                                                        class="icon-heart"></i></a>
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
                                        <div class="product-category"><a href="/shop/category/{{ $categories3->slug }}">{{ $categories3->name }}</a>
                                        </div>
                                        <h3 class="product-title"><a
                                                href="{{ route('user.product_details', ['slug' => $product->slug]) }}">
                                                {{ \Illuminate\Support\Str::substr($product->name, 0, 50) }}
                                            </a></h3>

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
                <div class="col-md-6">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $third_two_column_value->image1 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $third_two_column_value->title1 }}</p>
                            <h4>{{ $third_two_column_value->sub_title1 }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="genius-banner">
                        <img src="{{ asset('storage') }}/{{ $third_two_column_value->image2 }}" alt="">
                        <div class="inner-content">
                            <p>{{ $third_two_column_value->title2 }}</p>
                            <h4>{{ $third_two_column_value->sub_title2 }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
