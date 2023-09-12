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
                                    <form role="form" action="{{ route('user.checkout.stripe') }}" method="post"
                                        class="require-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                        @csrf
                                        <div class="form-group col-sm-12">
                                            <input class="form-control card-number" type="text" name="card"
                                                placeholder="Card Number" required="">
                                        </div>
                                        <input type="hidden" name="payment_method" value="Stripe">
                                        <div class="form-group col-sm-12">
                                            <input class="form-control card-expiry-month" type="text" name="month"
                                                placeholder="Expitation Month" required="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control card-expiry-year" type="text" name="year"
                                                placeholder="Expitation Year" required="">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input class="form-control card-cvc " type="text" name="cvc"
                                                placeholder="CVV" required="">
                                        </div>

                                        <p class="p-3">Stripe is the faster &amp; safer way to send money. Make an
                                            online payment via Stripe.</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="button"
                                                data-bs-dismiss="modal"><span>Cancel</span></button>
                                            <button class="btn btn-primary btn-sm" type="submit"><span>Chekout With
                                                    Stripe</span></button>
                                        </div>
                                    </form>
                                </div>
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
                            <form action="{{ route('user.checkout.bank.transfer') }}" method="POST">
                                <div class="modal-body">
                                    <div class="col-lg-12 form-group">
                                        <label for="transaction">Transaction Number</label>
                                        <input class="form-control" name="transaction" id="transaction"
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
                                    @csrf
                                     <input type="hidden"
                                        name="payment_method" value="Bank"> 
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
@section('footer')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                    }
                });

                if (!$form.data('cc-on-file')) {
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
