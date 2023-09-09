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
                            action="{{ route('user.billing_address') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-fn">First Name</label>
                                        <input class="form-control" disabled name="bill_first_name" type="text" required=""
                                            id="checkout-fn" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-ln">Last Name</label>
                                        <input class="form-control" disabled name="bill_last_name" type="text" required=""
                                            id="checkout-ln" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout_email_billing">E-mail Address</label>
                                        <input class="form-control" disabled name="bill_email" type="email" required=""
                                            id="checkout_email_billing" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">Phone Number</label>
                                        <input class="form-control" name="phone" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->phone }}">

                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">Address1</label>
                                        <input class="form-control" name="address1" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->address1 }}">
                                            @error('address1')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">Address2</label>
                                        <input class="form-control" name="address2" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->address2 }}">
                                            @error('address2')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">Zip Code</label>
                                        <input class="form-control" name="zip_code" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->zip_code }}">
                                            @error('zip_code')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">Company</label>
                                        <input class="form-control" name="company" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->company }}">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-phone">City</label>
                                        <input class="form-control" name="city" type="text" id="checkout-phone"
                                            required="" value="{{ $billing_address->city }}">
                                            @error('city')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
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
