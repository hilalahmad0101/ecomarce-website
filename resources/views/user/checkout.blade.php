@extends('layouts.app')
@section('title')
    Brand
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <div class="column">
            <ul class="breadcrumbs">
                <li><a href="/">Home</a> </li>
                <li class="separator"></li>
                <li>Billing address</li>
            </ul>
        </div>
    </div>
</div>
<div class="container padding-bottom-3x mb-1 checkut-page">
    <div class="row">
        <!-- Billing Adress-->
        <div class="col-xl-9 col-lg-8">
            @include('includes.steps')
            <div class="card">
                <div class="card-body">
                    <h6>Billing Address</h6>
                    <form id="checkoutBilling"
                        action="https://geniusdevs.com/codecanyon/omnimart40/checkout/billing/store" method="POST">
                        <input type="hidden" name="_token" value="LaKxs0f8Uv18nIqvnNC8JLqyOY2TGDSGjZMhkBIt">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-fn">First Name</label>
                                    <input class="form-control" name="bill_first_name" type="text" required=""
                                        id="checkout-fn" value="{{ Auth::user()->first_name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-ln">Last Name</label>
                                    <input class="form-control" name="bill_last_name" type="text" required=""
                                        id="checkout-ln" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout_email_billing">E-mail Address</label>
                                    <input class="form-control" name="bill_email" type="email" required=""
                                        id="checkout_email_billing" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-phone">Phone Number</label>
                                    <input class="form-control" name="bill_phone" type="text" id="checkout-phone"
                                        required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="same_address"
                                    name="same_ship_address" checked="">
                                <label class="custom-control-label" for="same_address">Same as billing address</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="trams__condition">
                                <label class="custom-control-label" for="trams__condition">This site is protected by
                                    reCAPTCHA and the <a href="http://localhost/my/omnimart3/privacy-policy"
                                        target="_blank">Privacy Policy</a> and <a
                                        href="http://localhost/my/omnimart3/terms-and-service" target="_blank">Terms of
                                        Service</a> apply.</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between paddin-top-1x mt-4">
                            <a class="btn btn-primary btn-sm"
                                href="https://geniusdevs.com/codecanyon/omnimart40/cart"><span class="hidden-xs-down"><i
                                        class="icon-arrow-left"></i>Back To Cart</span></a>
                            <button disabled="" id="continue__button" class="btn btn-primary  btn-sm"
                                type="button"><span class="hidden-xs-down">Continue</span><i
                                    class="icon-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sidebar          -->
        @include('includes.order-summary')
    </div>
</div>

@endsection