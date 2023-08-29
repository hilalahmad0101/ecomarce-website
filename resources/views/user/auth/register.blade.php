@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="/">Home</a> </li>
                <li class="separator"></li>
                <li>Login/Register</li>
              </ul>
          </div>
      </div>
    </div>
  </div>
    <div class="container padding-bottom-3x mb-1">
        <div class="row ">
            <div class="col-md-6">
                <div class="card register-area">
                    <div class="card-body ">
                        <h4 class="margin-bottom-1x text-center">Login</h4>
                        <form class="row" action="{{ route('user.make.login') }}"
                            method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" type="email" name="email_login" placeholder="E-mail Address"
                                        id="reg-email" value="">
                                        @error('email_login')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password_login" placeholder="Password"
                                        id="reg-pass">
                                        @error('password_login')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary margin-bottom-none"
                                    type="submit"><span>Login</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card register-area">
                    <div class="card-body ">
                        <h4 class="margin-bottom-1x text-center">Register</h4>
                        <form class="row" action="{{ route('user.make.register') }}"
                            method="POST">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">First Name</label>
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name"
                                        id="reg-fn" value="">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name"
                                        id="reg-ln" value="">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                        id="reg-email" value="">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">Phone Number</label>
                                    <input class="form-control" name="phone" type="text" placeholder="Phone Number"
                                        id="reg-phone" value="">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password"
                                        id="reg-pass">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        placeholder="Confirm Password" id="reg-pass-confirm">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary margin-bottom-none"
                                    type="submit"><span>Register</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
