@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')

    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            @include('includes.user-sidebar')
            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="row u-d-d">
                    <div class="col-md-6 mb-4">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">All Order</p>
                                <h4><b>{{ $all_orders }}</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">Completed Order</p>
                                <h4><b>{{ $delivered_orders }}</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">Processing Order</p>
                                <h4><b>{{ $progress_orders }}</b></h4>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="col-md-6 mb-4">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">Canceled Order</p>
                                <h4><b>{{ $canceled_orders }}</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card round">
                            <div class="card-body text-center">
                                <i class="icon-shopping-bag"></i>
                                <p class="mt-3">Pending Order</p>
                                <h4><b>{{ $pending_orders }}</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
