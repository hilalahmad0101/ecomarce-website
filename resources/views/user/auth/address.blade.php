@extends('layouts.app')
@section('title')
Address
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Address</li>
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
                        <form class="row" action="{{ route('user.address.update') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf 
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-fn">Address 1</label>
                                    <input class="form-control"  name="address1" type="text" id="account-fn"
                                        value="{{ $address->address1 }}">
                                    @error('address1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-ln">Address 1</label>
                                    <input class="form-control" type="text" name="address2" id="account-ln"
                                        value="{{ $address->address2}}">
                                        @error('address2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-email">Zip Code</label>
                                    <input class="form-control" name="zip_code" type="text" id="account-email"
                                        value="{{ $address->zip_code }}">
                                        @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-phone">City</label>
                                    <input class="form-control" name="city" type="text" id="account-phone"
                                        value="{{ $address->city }}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account-pass">Company</label>
                                    <input class="form-control" name="company" value="{{ $address->company }}" type="text" id="account-pass">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-2 mb-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <button class="btn btn-primary margin-right-none" type="submit"><span>Update
                                            Address</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
