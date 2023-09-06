@extends('layouts.app')
@section('title')
    Wishlist
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            @include('includes.user-sidebar')
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                        <div class="u-table-res wishlist-table mb-0">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Wishlist Product</th>
                                        <th class="text-center"><a class="btn btn-sm btn-primary"
                                                href="{{ route('user.wishlist.clear') }}"><span>Clear
                                                    Wishlist</span></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $wishlist)
                                        <tr>
                                            <td>
                                                <div class="product-item"><a class="product-thumb"
                                                        href="{{ route('user.product_details', ['slug'=>$wishlist->product->slug]) }}">
                                                        <img
                                                            src="{{ asset('storage') }}/{{ $wishlist->product->featured_image }}"
                                                            alt="Product"></a>
                                                    <div class="product-info">
                                                        <h4 class="product-title"><a
                                                                href="{{ route('user.product_details', ['slug'=>$wishlist->product->slug]) }}">{{$wishlist->product->name}}</a></h4>
                                                        <div class="text-lg mb-1">$ {{ $wishlist->product->current_price }}</div>
                                                        <div class="text-sm">Availability:
                                                            <div class="d-inline text-success">In Stock</div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <a class="product-button btn btn-primary btn-sm add_to_single_cart"
                                                    href="{{ route('user.add_to_cart', ['id'=>$wishlist->product->id]) }}"><i
                                                        class="icon-shopping-cart"></i><span>To Cart</span>
                                                </a>
                                            </td>
                                            <td class="text-center"><a class="remove-from-cart"
                                                    href="{{ route('user.wishlist.remove', ['id'=>$wishlist->id]) }}"
                                                    data-toggle="tooltip" title=""
                                                    data-bs-original-title="Remove item" aria-label="Remove item"><i
                                                        class="icon-x"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <hr class="mb-4">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
