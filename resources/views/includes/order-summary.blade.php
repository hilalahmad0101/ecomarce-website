<div class="col-xl-3 col-lg-4">
    <aside class="sidebar">
        <div class="padding-top-2x hidden-lg-up"></div>
        <!-- Order Summary Widget-->
        <section class="card widget widget-featured-posts widget-order-summary p-4">
            <h3 class="widget-title">Order Summary</h3>

            <p class="free-shippin-aa"><em>Free Shipping After order $1,000.00</em></p>
            @php
                
                $total_cart = \App\Models\Cart::whereUserId(auth()->id())->sum('sub_total');
                $carts = \App\Models\Cart::whereUserId(auth()->id())
                    ->latest()
                    ->get();
            @endphp
            <table class="table">
                <tbody>
                    <tr>
                        <td>Cart Subtotal:</td>
                        <td class="text-gray-dark">$ {{ $total_cart }}</td>
                    </tr>
                    <tr>
                        <td>Shipping:</td>
                        <td class="text-gray-dark">$20.00</td>
                    </tr>
                    <tr>
                        <td class="text-lg text-primary">Order total</td>
                        <td class="text-lg text-primary grand_total_set">$ {{ $total_cart - 20 }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- Items in Cart Widget-->
        <section class="card widget widget-featured-posts widget-featured-products p-4">
            <h3 class="widget-title">Items In Your Cart</h3>

            @foreach ($carts as $cart)
                <div class="entry">
                    <div class="entry-thumb"><a
                            href="{{ route('user.product_details', ['slug'=>$cart->product->slug]) }}"><img
                                src="{{ asset('storage') }}/{{ $cart->product->featured_image }}"
                                alt="Product"></a></div>
                    <div class="entry-content">
                        <h4 class="entry-title"><a
                                href="{{ route('user.product_details', ['slug'=>$cart->product->slug]) }}">
                                {{ Illuminate\Support\Str::substr($cart->product->name,0,10)}}
                            </a></h4>
                        <span class="entry-meta">{{ $cart->qty }} x ${{ $cart->total }}</span>
                    </div>
                </div>
            @endforeach
        </section>
    </aside>
</div>
