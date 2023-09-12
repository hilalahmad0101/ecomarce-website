@extends('layouts.app')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a>
                        </li>
                        <li class="separator"></li>
                        <li><a href="/shop">Shop</a>
                        </li>
                        <li class="separator"></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-1x mb-1">
        <div class="row">
            <!-- Poduct Gallery-->
            <div class="col-xxl-5 col-lg-6 col-md-6">
                <div class="product-gallery">
                    {{-- <span class="product-badge bg-dark">Best</span>
                    <div class="product-badge bg-goldenrod  ppp-t"> -29%</div> --}}
                    <div class="product-thumbnails insize">
                        <div class="">
                            <div class="item" style="position: relative; overflow: hidden;">
                                <img src="{{ asset('storage') }}/{{ $product->featured_image }}" alt="zoom">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Info-->
            <div class="col-xxl-7 col-lg-6 col-md-6">
                <div class="details-page-top-right-content d-flex align-items-center">
                    <div class="div w-100">
                        <h4 class="mb-2 p-title-main">{{ $product->name }}
                        </h4>
                        <div class="mb-3">
                            <div class="rating-stars d-inline-block gmr-3">
                                <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i><i class="far fa-star"></i>
                            </div>
                            <span class="text-success  d-inline-block">In Stock</span>
                        </div>



                        <span class="h3 d-block price-area">
                            <small class="d-inline-block"><del>${{ $product->previous_price }}</del></small>
                            <span id="main_price" class="main-price">${{ $product->current_price }}</span>
                        </span>

                        <p class="text-muted">{{ $product->short_description }} <a href="#details" class="scroll-to">Read
                                more</a></p>

                        <form action="">
                            <div class="row align-items-end pb-4">
                                <div class="col-sm-12">
                                    <div class="qtySelector product-quantity">
                                        <input type="text" class="qtyValue cart-amount" value="1">
                                    </div>
                                    <div class="p-action-button">
                                        <a href="{{ route('user.add_to_cart', ['id' => $product->id]) }}"
                                            class="btn btn-primary m-0 a-t-c-mr" id=""><i
                                                class="icon-bag"></i><span>Add to Cart</span></a>
                                        <button class="btn btn-primary m-0" id="but_to_cart"><i
                                                class="icon-bag"></i><span>Buy Now</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="div">
                            <div class="t-c-b-area">

                                <div class="pt-1 mb-1"><span class="text-medium">Categories:</span>
                                    <a
                                        href="{{ route('user.category.product', ['slug' => $product->categories->slug]) }}">{{ $product->categories->name }}</a>
                                    /
                                    <a
                                        href="{{ route('user.category.product', ['slug' => $product->sub_categories->slug]) }}">{{ $product->sub_categories->name }}</a>
                                </div>
                                <div class="pt-1 mb-1"><span class="text-medium">Tags:</span>
                                    @php
                                        $tags = json_encode($product->tags);
                                        $tags = json_decode($tags);
                                        $tags = json_decode($tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <a href="">
                                            {{ $tag->value }}</a>,
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-4 p-d-f-area">
                                <div class="left">
                                    <a class="btn btn-primary btn-sm wishlist_store wishlist_text"
                                        href="{{ route('user.add_to_wishlist', ['id' => $product->id]) }}"><span><i
                                                class="icon-heart"></i></span>
                                        <span class="wishlist1">Wishlist</span>
                                        <span class="wishlist2 d-none">Added To Wishlist</span>
                                    </a>
                                    <a class="btn btn-primary btn-sm  product_compare"
                                        href="{{ route('user.add_to_compare', ['id' => $product->id]) }}"><span><i
                                                class="icon-repeat"></i>Compare</span></a>
                                </div>

                                {{-- <div class="d-flex align-items-center">
                                    <span class="text-muted mr-1">Share: </span>
                                    <div class="d-inline-block a2a_kit" style="line-height: 16px;">
                                        <a class="facebook  a2a_button_facebook" href="/#facebook" target="_blank"
                                            rel="nofollow noopener">
                                            <span><i class="fab fa-facebook-f"></i></span>
                                        </a>
                                        <a class="twitter  a2a_button_twitter" href="/#twitter" target="_blank"
                                            rel="nofollow noopener">
                                            <span><i class="fab fa-twitter"></i></span>
                                        </a>
                                        <a class="linkedin  a2a_button_linkedin" href="/#linkedin" target="_blank"
                                            rel="nofollow noopener">
                                            <span><i class="fab fa-linkedin-in"></i></span>
                                        </a>
                                        <a class="pinterest   a2a_button_pinterest" href="/#pinterest" target="_blank"
                                            rel="nofollow noopener">
                                            <span><i class="fab fa-pinterest"></i></span>
                                        </a>
                                    </div>
                                    <script async="" src="https://static.addtoany.com/menu/page.js"></script>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" padding-top-3x mb-3" id="details">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Descriptions</a>
                        </li>
                    </ul>
                    <div class="tab-content card">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            {!! $product->description !!}
                        </div>
                        <div class="tab-pane fade show" id="specification" role="tabpanel"
                            aria-labelledby="specification-tab">
                            <div class="comparison-table">
                                <table class="table table-bordered">
                                    <thead class="bg-secondary">
                                    </thead>
                                    <tbody>
                                        <tr class="bg-secondary">
                                            <th class="text-uppercase">Specifications</th>
                                            <td><span class="text-medium">Descriptions</span></td>
                                        </tr>
                                        <tr>
                                            <th>Product Type:</th>
                                            <td>Velvet elegant sleeveless evening dress</td>
                                        </tr>
                                        <tr>
                                            <th>Material:</th>
                                            <td>Polyester / Spandex</td>
                                        </tr>
                                        <tr>
                                            <th>Lining Material:</th>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <th>Fabric Type:</th>
                                            <td>Fleece</td>
                                        </tr>
                                        <tr>
                                            <th>Technics:</th>
                                            <td>Plain dyed</td>
                                        </tr>
                                        <tr>
                                            <th>Decoration:</th>
                                            <td>Sequins</td>
                                        </tr>
                                        <tr>
                                            <th>Size:</th>
                                            <td>S/M/L</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container  review-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="h3">Latest Reviews</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-5">
                    No Review
                </div>
                <div class="row mt-15">
                    <div class="col-lg-12 text-center">

                    </div>
                </div>

            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-inline align-baseline display-3 mr-1">0</div>
                            <div class="d-inline align-baseline text-sm text-warning mr-1">
                                <div class="rating-stars"><i class="far fa-star"></i><i class="far fa-star"></i><i
                                        class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <label class="text-medium text-sm">5 stars <span class="text-muted">- 0</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 2px;"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">4 stars <span class="text-muted">- 0</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 2px;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">3 stars <span class="text-muted">- 0</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 2px;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">2 stars <span class="text-muted">- 0</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%; height: 2px;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">1 star <span class="text-muted">- 0</span></label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0; height: 2px;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="pb-2"><a class="btn btn-primary btn-block" href="#" data-bs-toggle="modal"
                                data-bs-target="#leaveReview"><span>Leave a Review</span></a></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="relatedproduct-section container padding-bottom-3x mb-1 s-pt-30">
        <!-- Related Products Carousel-->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="h3">You May Also Like</h2>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-12">
                <div class="popular-category-slider owl-carousel">
                    @foreach ($products as $product1)
                        <div class="slider-item">
                            <div class="product-card">
                                <div class="product-thumb">
                                    <img class="lazy"
                                        data-src="{{ asset('storage') }}/{{ $product1->featured_image }}"
                                        alt="Product">
                                    <div class="product-button-group">
                                        @if (Auth::user() && Auth::user()->id)
                                            <a class="product-button wishlist_store"
                                                href="{{ route('user.add_to_wishlist', ['id' => $product1->id]) }}"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                        @else
                                            <a class="product-button wishlist_store" href="{{ route('user.register') }}"
                                                title="Wishlist"><i class="icon-heart"></i></a>
                                        @endif

                                        @if (Auth::user() && Auth::user()->id)
                                            <a data-target="" class="product-button product_compare"
                                                href="{{ route('user.add_to_compare', ['id' => $product1->id]) }}"
                                                title="Compare"><i class="icon-repeat"></i></a>
                                        @else
                                            <a data-target="" class="product-button product_compare"
                                                href="{{ route('user.register') }}" title="Compare"><i
                                                    class="icon-repeat"></i></a>
                                        @endif

                                        @if (Auth::user() && Auth::user()->id)
                                            <a class="product-button add_to_single_cart" data-target="563"
                                                href="{{ route('user.add_to_cart', ['id' => $product1->id]) }}"
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
                                    <div class="product-category"><a href="">{{ $product->categories->name }}</a>
                                    </div>
                                    <h3 class="product-title"><a
                                            href="{{ route('user.product_details', ['slug' => $product1->slug]) }}">
                                            {{ \Illuminate\Support\Str::substr($product1->name, 0, 50) }}
                                        </a></h3>
                                    <div class="rating-stars">
                                        <i class='far fa-star'></i><i class='far fa-star'></i><i
                                            class='far fa-star'></i><i class='far fa-star'></i><i
                                            class='far fa-star'></i>
                                    </div>
                                    <h4 class="product-price">
                                        <del>${{ $product1->previous_price }}</del>

                                        ${{ $product1->current_price }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <form class="modal fade ratingForm show" action="https://geniusdevs.com/codecanyon/omnimart40/review/submit"
        method="post" id="leaveReview" tabindex="-1" style="display: block; padding-left: 0px;" aria-modal="true"
        role="dialog">
        <input type="hidden" name="_token" value="ym8BLsdAgqNVUjDoWtONp0TP6ANU7nzlSDqonXkK">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Leave a Review</h4>
                    <button class="close modal_close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="name" value="{{ Auth::user()->name }}"
                                    required="">
                            </div>
                        </div>
                        <input type="hidden" name="item_id" value="587">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}"
                                    required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" name="subject" id="review-subject"
                                    required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select name="rating" class="form-control" id="review-rating">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" name="review" id="review-message" rows="8" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"><span>Submit Review</span></button>
                </div>
            </div>
        </div>
    </form>
@endsection
