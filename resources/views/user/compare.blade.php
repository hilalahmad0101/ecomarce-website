@extends('layouts.app')
@section('title')
    Compare
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Compare</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1">
        <div class="card">
            <div class="card-body">
                <div class="comparison-table">
                    <table class="table table-bordered">

                        <tbody>
                            @foreach ($compares as $compare)
                                <tr>
                                    <td>{{ $compare->product->name }}</td>
                                    <td>${{ $compare->product->current_price }}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $compare->product->featured_image }}" width="50" alt=""></td>
                                    <td><a class="btn btn-success" href="{{ route('user.add_to_cart', ['id'=>$compare->product->id]) }}">cart</a></td>
                                </tr>
                            @endforeach
                        </tbody>



                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
