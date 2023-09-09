@extends('layouts.app')
@section('title')
    Payment
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> </li>
                    <li class="separator"></li>
                    <li>Review your order and pay</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <!-- Payment Methode-->
            <div class="col-xl-9 col-lg-8">
                @include('includes.steps')
                <div class="card">
                    <div class="card-body">
                        <h6 class="pb-2">Review Your Order :</h6>
                        <hr>
                        <div class="row padding-top-1x  mb-4">
                            <div class="col-sm-12">
                                <h6>Shipping address :</h6>
                                <ul class="list-unstyled">
                                    <li><span class="text-muted">Name: </span>{{ Auth::user()->name }}</li>
                                    <li><span class="text-muted">Phone: </span>{{ $billing_address->phone }}</li>
                                    <li><span class="text-muted">Address 1: </span>{{ $billing_address->address1 }}</li>
                                    <li><span class="text-muted">Address 2: </span>{{ $billing_address->address2 }}</li>
                                </ul>
                            </div>
                        </div>

                        <h6>Pay with :</h6>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="payment-methods">
                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#stripe">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1601930611stripe-logo-blue.png"
                                                alt="Stripe" title="Stripe">
                                            <p>Stripe</p>
                                        </a>
                                    </div>
                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#bank">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1638530860pngwing.com (1).png"
                                                alt="Bank Transfer" title="Bank Transfer">
                                            <p>Bank Transfer</p>
                                        </a>
                                    </div>

                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#flutterwave">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1637998096download.png"
                                                alt="Flutter Wave" title="Flutter Wave">
                                            <p>Flutter Wave</p>
                                        </a>
                                    </div>
                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#cod">
                                            <img class=""
                                                src="https://support.sitegiant.com/wp-content/uploads/2022/08/cash-on-delivery-banner.png"
                                                alt="Flutter Wave" title="Flutter Wave">
                                            <p>Cash on Delivery</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Cash on Transfer-->
                <div class="modal fade" id="cod" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transaction Cash On Delivery</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <form action="{{ route('user.checkout.cash.on.delivery') }}" method="POST">
                                @csrf
                                <input type="hidden" name="payment_method" value="Cash On Delivery" id="">
                                <div class="card-body">
                                    <p>Cash on Delivery basically means you will pay the amount of product while you get the
                                        item delivered to you.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Cash On
                                            Delivery</span></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Stripe -->
                <div class="modal fade" id="stripe" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Stripe</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="card-wrapper"></div>
                                    <form class="interactive-credit-card row"
                                        action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit"
                                        method="POST">
                                        @csrf
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="card"
                                                placeholder="Card Number" required="">
                                        </div>
                                        <input type="hidden" name="payment_method" value="Stripe">
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="month"
                                                placeholder="Expitation Month" required="">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="year"
                                                placeholder="Expitation Year" required="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="cvc" placeholder="CVV"
                                                required="">
                                        </div>

                                        <p class="p-3">Stripe is the faster &amp; safer way to send money. Make an
                                            online payment via Stripe.</p>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary btn-sm" type="button"
                                    data-bs-dismiss="modal"><span>Cancel</span></button>
                                <button class="btn btn-primary btn-sm" type="submit"><span>Chekout With
                                        Stripe</span></button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="flutterwave" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/flutterwave/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Flutterwave</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>Flutterwave is the faster &amp; safer way to send money. Make an online payment
                                            via Flutterwave.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Flutterwave">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Flutterwave</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal bank -->
                <div class="modal fade" id="bank" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Bank Transfer</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <form action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST">
                                <div class="modal-body">
                                    <div class="col-lg-12 form-group">
                                        <label for="transaction">Transaction Number</label>
                                        <input class="form-control" name="txn_id" id="transaction"
                                            placeholder="Enter Your Transaction Number" required="">
                                    </div>
                                    <p></p>
                                    <p>Account Number : 434 3434 3334</p>
                                    <p>Pay With Bank Transfer.</p>
                                    <p>Account Name : Jhon Due</p>
                                    <p>Account Email : demo@gmail.com</p>
                                    <p></p>
                                </div>
                                <div class="modal-footer">

                                    <input type="hidden" name="_token"
                                        value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k"> <input type="hidden"
                                        name="payment_method" value="Bank">
                                    <input type="hidden" name="state_id" value="" class="state_id_setup">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With Bank
                                            Transfer</span></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @include('includes.order-summary')
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('title')
    Payment
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a> </li>
                    <li class="separator"></li>
                    <li>Review your order and pay</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <!-- Payment Methode-->
            <div class="col-xl-9 col-lg-8">
                @include('includes.steps')
                <div class="card">
                    <div class="card-body">
                        <h6 class="pb-2">Review Your Order :</h6>
                        <hr>
                        <div class="row padding-top-1x  mb-4">
                            <div class="col-sm-12">
                                <h6>Shipping address :</h6>
                                <ul class="list-unstyled">
                                    <li><span class="text-muted">Name: </span>{{ Auth::user()->name }}</li>
                                    <li><span class="text-muted">Phone: </span>{{ $billing_address->phone }}</li>
                                    <li><span class="text-muted">Address 1: </span>{{ $billing_address->address1 }}</li>
                                    <li><span class="text-muted">Address 2: </span>{{ $billing_address->address2 }}</li>
                                </ul>
                            </div>
                        </div>

                        <h6>Pay with :</h6>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="payment-methods">
                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#stripe">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1601930611stripe-logo-blue.png"
                                                alt="Stripe" title="Stripe">
                                            <p>Stripe</p>
                                        </a>
                                    </div>
                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#bank">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1638530860pngwing.com (1).png"
                                                alt="Bank Transfer" title="Bank Transfer">
                                            <p>Bank Transfer</p>
                                        </a>
                                    </div>

                                    <div class="single-payment-method">
                                        <a class="text-decoration-none " href="#" data-bs-toggle="modal"
                                            data-bs-target="#flutterwave">
                                            <img class=""
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1637998096download.png"
                                                alt="Flutter Wave" title="Flutter Wave">
                                            <p>Flutter Wave</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Cash on Transfer-->
                <div class="modal fade" id="cod" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transaction Cash On Delivery</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <form action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST">
                                <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                                <input type="hidden" name="payment_method" value="Cash On Delivery" id="">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="card-body">
                                    <p>Cash on Delivery basically means you will pay the amount of product while you get the
                                        item delivered to you.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Cash On
                                            Delivery</span></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal MOLLIE -->
                <div class="modal fade" id="mollie" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Mollie</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Mollie is a Payment Provider for Belgium and the Netherlands, offering payment methods
                                    such as credit card, iDEAL, Bancontact/Mister cash, PayPal, SCT, SDD and others.</p>
                            </div>
                            <div class="modal-footer">
                                <form action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit"
                                    method="POST">
                                    <input type="hidden" name="_token"
                                        value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k"> <input type="hidden"
                                        name="payment_method" value="Mollie">
                                    <input type="hidden" name="state_id" value="" class="state_id_setup">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Mollie</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal PayPal -->
                <div class="modal fade" id="paypal" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via PayPal</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>PayPal is the faster &amp; safer way to send money. Make an online payment via
                                            PayPal.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Paypal">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            PayPal</span></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Modal Stripe -->
                <div class="modal fade" id="stripe" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Stripe</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="card-wrapper"></div>
                                    <form class="interactive-credit-card row"
                                        action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit"
                                        method="POST">
                                        <input type="hidden" name="_token"
                                            value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="card"
                                                placeholder="Card Number" required="">
                                        </div>
                                        <input type="hidden" name="payment_method" value="Stripe">
                                        <input type="hidden" name="state_id" value="" class="state_id_setup">
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="month"
                                                placeholder="Expitation Month" required="">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="year"
                                                placeholder="Expitation Year" required="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="cvc" placeholder="CVV"
                                                required="">
                                        </div>

                                        <p class="p-3">Stripe is the faster &amp; safer way to send money. Make an
                                            online payment via Stripe.</p>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary btn-sm" type="button"
                                    data-bs-dismiss="modal"><span>Cancel</span></button>
                                <button class="btn btn-primary btn-sm" type="submit"><span>Chekout With
                                        Stripe</span></button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal Authorize -->
                <div class="modal fade" id="authorize" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Authorize.Net</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="card-wrapper"></div>
                                    <form class="interactive-credit-card row"
                                        action="https://geniusdevs.com/codecanyon/omnimart40/authorize/submit"
                                        method="POST">
                                        <input type="hidden" name="_token"
                                            value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="card"
                                                placeholder="Card Number" required="">
                                        </div>
                                        <input type="hidden" name="payment_method" value="Authorize.Net">
                                        <input type="hidden" name="state_id" value="" class="state_id_setup">
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="month"
                                                placeholder="Expitation Month" required="">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="text" name="year"
                                                placeholder="Expitation Year" required="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control" type="text" name="cvc" placeholder="CVV"
                                                required="">
                                        </div>

                                        <p class="p-3">Authorize.Net is the faster &amp; safer way to send money. Make
                                            an online payment via Authorize.Net</p>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary btn-sm" type="button"
                                    data-bs-dismiss="modal"><span>Cancel</span></button>
                                <button class="btn btn-primary btn-sm" type="submit"><span>Chekout With
                                        Stripe</span></button>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="modal fade" id="paypal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="interactive-credit-card row"
                            action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST">
                            <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via PayPal</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>PayPal is the faster &amp; safer way to send money. Make an online payment via
                                            PayPal.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Paypal">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            PayPal</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="modal fade" id="razorpay" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/razorpay/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Razorpay</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>Rezorpay is the faster &amp; safer way to send money. Make an online payment via
                                            Rezorpay.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Rezorpay">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Razorpay</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="flutterwave" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/flutterwave/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Flutterwave</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>Flutterwave is the faster &amp; safer way to send money. Make an online payment
                                            via Flutterwave.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Flutterwave">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Flutterwave</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="paytm" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/paytm/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Paytm</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>Paytm is the faster &amp; safer way to send money. Make an online payment via
                                            Paytm.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Paytm">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Paytm</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="sslcommerz" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/sslcommerz/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via SSLCommerz</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>SSL commerz is the faster &amp; safer way to send money. Make an online payment
                                            via SSL commerz.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="SSLCommerz">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            SSLCommerz</span></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="modal fade" id="mercadopago" tabindex="-1" aria-hidden="true">
                    <form class="interactive-credit-card row" id="mercadopagofrom"
                        action="https://geniusdevs.com/codecanyon/omnimart40/mercadopago/submit" method="POST">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Mercadapago</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" placeholder="Credit Card Number"
                                                id="cardNumber" data-checkout="cardNumber" onselectstart="return false"
                                                autocomplete="off" required="">
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" id="securityCode"
                                                data-checkout="securityCode" placeholder="Security Code"
                                                onselectstart="return false" autocomplete="off" required="">
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" id="cardExpirationMonth"
                                                data-checkout="cardExpirationMonth" placeholder="Expiration Month"
                                                autocomplete="off" required="">
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" id="cardExpirationYear"
                                                data-checkout="cardExpirationYear" placeholder="Expiration Year"
                                                autocomplete="off" required="">
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" id="cardholderName"
                                                data-checkout="cardholderName" placeholder="Card Holder Name"
                                                required="">
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input class="form-control" type="text" id="docNumber"
                                                data-checkout="docNumber" placeholder="Document Number" required="">
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <label for="docType" class="col-lg-3 pl-0" id="dc-label">Document
                                                type</label>
                                            <select class="form-control col-lg-9 pl-0" id="docType"
                                                data-checkout="docType" required="">
                                                <option value="DNI">DNI</option>
                                                <option value="CI">Cédula</option>
                                                <option value="LC">L.C.</option>
                                                <option value="LE">L.E.</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>


                                        <p>Mercadopago is the faster &amp; safer way to send money. Make an online payment
                                            via Mercadopago.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Mercadopago">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With
                                            Mercadopago</span></button>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="installments" value="1">
                        <input type="hidden" name="amount" id="amount">
                        <input type="hidden" name="description">
                        <input type="hidden" name="paymentMethodId">
                    </form>

                    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
                    <script>
                        window.Mercadopago.setPublishableKey("TEST-6f72a502-51c8-4e9a-8ca3-cb7fa0addad8");
                        window.Mercadopago.getIdentificationTypes();

                        function addEvent(to, type, fn) {
                            if (document.addEventListener) {
                                to.addEventListener(type, fn, false);
                            } else if (document.attachEvent) {
                                to.attachEvent('on' + type, fn);
                            } else {
                                to['on' + type] = fn;
                            }
                        };

                        addEvent(document.querySelector('#cardNumber'), 'keyup', guessingPaymentMethod);
                        addEvent(document.querySelector('#cardNumber'), 'change', guessingPaymentMethod);

                        function getBin() {
                            var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
                            return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
                        };

                        function guessingPaymentMethod(event) {
                            var bin = getBin();

                            if (event.type == "keyup") {
                                if (bin.length >= 6) {
                                    window.Mercadopago.getPaymentMethod({
                                        "bin": bin
                                    }, setPaymentMethodInfo);
                                }
                            } else {
                                setTimeout(function() {
                                    if (bin.length >= 6) {
                                        window.Mercadopago.getPaymentMethod({
                                            "bin": bin
                                        }, setPaymentMethodInfo);
                                    }
                                }, 100);
                            }
                        };

                        function setPaymentMethodInfo(status, response) {
                            if (status == 200) {
                                const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

                                if (paymentMethodElement) {
                                    paymentMethodElement.value = response[0].id;
                                } else {
                                    const input = document.createElement('input');
                                    input.setAttribute('name', 'paymentMethodId');
                                    input.setAttribute('type', 'hidden');
                                    input.setAttribute('value', response[0].id);

                                    form.appendChild(input);
                                }

                                Mercadopago.getInstallments({
                                    "bin": getBin(),
                                    "amount": parseFloat(document.querySelector('#amount').value),
                                }, setInstallmentInfo);

                            }
                        };


                        doSubmit = false;
                        addEvent(document.querySelector('#mercadopagofrom'), 'submit', doPay);

                        function doPay(event) {
                            event.preventDefault();
                            if (!doSubmit) {
                                var $form = document.querySelector('#mercadopagofrom');

                                window.Mercadopago.createToken($form,
                                    sdkResponseHandler); // The function "sdkResponseHandler" is defined below

                                return false;
                            }
                        };

                        function sdkResponseHandler(status, response) {
                            if (status != 200 && status != 201) {
                                alert("Some of your information is wrong!");
                                $('#preloader').hide();

                            } else {

                                var form = document.querySelector('#mercadopagofrom');
                                var card = document.createElement('input');
                                card.setAttribute('name', 'token');
                                card.setAttribute('type', 'hidden');
                                card.setAttribute('value', response.id);
                                form.appendChild(card);
                                doSubmit = true;
                                form.submit();
                            }
                        };


                        function setInstallmentInfo(status, response) {
                            var selectorInstallments = document.querySelector("#installments"),
                                fragment = document.createDocumentFragment();
                            selectorInstallments.length = 0;

                            if (response.length > 0) {
                                var option = new Option("Escolha...", '-1'),
                                    payerCosts = response[0].payer_costs;
                                fragment.appendChild(option);

                                for (var i = 0; i < payerCosts.length; i++) {
                                    fragment.appendChild(new Option(payerCosts[i].recommended_message, payerCosts[i].installments));
                                }

                                selectorInstallments.appendChild(fragment);
                                selectorInstallments.removeAttribute('disabled');
                            }
                        };
                    </script>
                </div>



                <div class="modal fade" id="paystack" tabindex="-1" aria-hidden="true">

                    <form class="interactive-credit-card row"
                        action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST"
                        id="paystack_form">
                        <input type="hidden" name="_token" value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k"> <input
                            type="hidden" name="ref_id" id="ref_id" value="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Transactions via Paystack</h6>
                                    <button class="close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <p>Paystack is the faster &amp; safer way to send money. Make an online payment via
                                            Paystack.</p>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" value="Paystack">
                                <input type="hidden" name="state_id" value="" class="state_id_setup">
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal"><span>Cancel</span></button>
                                    <button class="btn btn-primary btn-sm final-btn" id="final-btn"
                                        type="submit"><span>Checkout With Paystack</span></button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>




                <!-- Modal bank -->
                <div class="modal fade" id="bank" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Transactions via Bank Transfer</h6>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <form action="https://geniusdevs.com/codecanyon/omnimart40/checkout-submit" method="POST">
                                <div class="modal-body">
                                    <div class="col-lg-12 form-group">
                                        <label for="transaction">Transaction Number</label>
                                        <input class="form-control" name="txn_id" id="transaction"
                                            placeholder="Enter Your Transaction Number" required="">
                                    </div>
                                    <p></p>
                                    <p>Account Number : 434 3434 3334</p>
                                    <p>Pay With Bank Transfer.</p>
                                    <p>Account Name : Jhon Due</p>
                                    <p>Account Email : demo@gmail.com</p>
                                    <p></p>
                                </div>
                                <div class="modal-footer">

                                    <input type="hidden" name="_token"
                                        value="sXahNV8HiLbT9glsyMxedbtDGJmeA8qZf5UfwM7k"> <input type="hidden"
                                        name="payment_method" value="Bank">
                                    <input type="hidden" name="state_id" value="" class="state_id_setup">
                                    <button class="btn btn-primary btn-sm" type="button"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="submit"><span>Checkout With Bank
                                            Transfer</span></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @include('includes.order-summary')
        </div>
    </div>
@endsection
