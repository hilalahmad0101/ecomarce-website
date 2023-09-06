@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1">
        <!-- Shopping Cart-->
        <div id="view_cart_load">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive shopping-cart">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center"><a class="btn btn-sm btn-primary" href="{{ route('user.cart.clear') }}"><span>Clear
                                                Cart</span></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <div class="product-item">
                                                <a class="product-thumb"
                                                    href="{{ route('user.product_details', ['slug' => $cart->product->slug]) }}"><img
                                                        src="{{ asset('storage') }}/{{ $cart->product->featured_image }}"
                                                        alt="Product">
                                                </a>
                                                <div class="product-info">
                                                    <h4 class="product-title"><a
                                                            href="{{ route('user.product_details', ['slug' => $cart->product->slug]) }}">
                                                            {{ $cart->product->name }}

                                                        </a></h4>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center text-lg">${{ $cart->total }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('user.cart.update') }}" method="POST" >
                                                @csrf
                                                <div class="product-quantity">
                                                    <input type="number " name="qty" value="{{ $cart->qty }}" class="qtyValue cartcart-amount" >
                                                    <input type="hidden" value="{{ $cart->id }}" name="id"
                                                        id="">
                                                        <button type="submit" style="display: none"></button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center text-lg">${{ $cart->sub_total }}</td>
                                        <td class="text-center"><a class="remove-from-cart"
                                                href="{{ route('user.cart.remove', ['id'=>$cart->id]) }}"
                                                data-toggle="tooltip" title="" data-bs-original-title="Remove item"
                                                aria-label="Remove item"><i class="icon-x"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-body">
                    <div class="shopping-cart-footer">
                        <div class="text-right text-lg column d-none"><span class="text-muted">Discount () : </span><span
                                class="text-gray-dark">$0.00</span></div>

                        <div class="text-right column text-lg"><span class="text-muted">Subtotal: </span><span
                                class="text-gray-dark">$ {{ $total_cart }}</span></div>
                    </div>
                    <div class="shopping-cart-footer">
                        <div class="column"><a class="btn btn-primary "
                                href="/shop"><span><i
                                        class="icon-arrow-left"></i> Back to Shopping</span></a></div>
                        <div class="column"><a class="btn btn-primary"
                                href="{{ route('user.checkout') }}"><span>Checkout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
