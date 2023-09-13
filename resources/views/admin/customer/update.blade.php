@extends('layouts.admin')
@section('title')
    Update Customer
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class=" mb-0  pl-3"><b>Customers Details</b> </h3>
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('admin.customer') }}"><i
                                    class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <form action="{{ route('admin.customer.update', ['id'=>$user->id]) }}" method="POST">
                          @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="gd-responsive-table">
                                        <table class="table table-bordered table-striped">
                                            @php
                                                $name=explode(" ", $user->name);
                                            @endphp
                                            <tbody>
                                                <tr>
                                                    <th>First Name</th>
                                                    <td> <input type="text" name="first_name" class="form-control"
                                                            id="text" value="{{ $name[0] }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <td><input type="text" name="last_name" class="form-control"
                                                            id="text" value="{{ $name[1] }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td><input type="text" name="email" class="form-control"
                                                            id="text" value="{{ $user->email }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td><input type="text" name="phone" class="form-control"
                                                            id="text" value="{{ $user->phone }}"></td>
                                                </tr> 
                                                <tr>
                                                    <th>Password</th>
                                                    <td><input type="password" name="password" class="form-control"
                                                            id="text" placeholder="Password" value=""></td>
                                                </tr> 
                                                <tr>
                                                    <th>Total Orders</th>
                                                    <td>{{ \App\Models\Order::whereUserId($user->phone)->count() }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Joined</th>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-secondary ">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
