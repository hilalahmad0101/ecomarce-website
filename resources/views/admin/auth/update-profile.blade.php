@extends('layouts.admin')
@section('title')
    Update Profile
@endsection
@section('content')
    <div class="content">
    <div class="page-inner">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="card mb-4">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-0 bc-title"><b>Update Profile</b></h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Update Profile</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body ">
                            <!-- Nested Row within Card Body -->
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <form class="admin-form"
                                            action="{{ route('admin.update.profile') }}"
                                            method="POST" enctype="multipart/form-data">
@csrf

                                            <div class="form-group">
                                                <label for="name">Current Image</label>
                                                <div class="col-lg-12 pb-1">
                                                    <img class="admin-img"
                                                        src="{{ asset('storage') }}/{{ Auth::guard('admin')->user()->image }}"
                                                        alt="No Image Found">
                                                </div>
                                                <span>Image Size Should Be 40 x 40.</span>
                                            </div>

                                            <div class="form-group position-relative text-center">
                                                <label class="file">
                                                    <input type="file" accept="image/*" class="upload-photo"
                                                        name="image" id="file" aria-label="File browser example">
                                                    <span class="file-custom text-left">Upload Image...</span>
                                                </label>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name">User Name *</label>
                                                <input type="text" name="username" class="form-control" id="name"
                                                    placeholder="User Name" value="{{ Auth::guard('admin')->user()->username }}">
                                                    @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="email">Email Address *</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Email Address" value="{{ Auth::guard('admin')->user()->email }}">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone Number *</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                    placeholder="Phone Number" value="{{ Auth::guard('admin')->user()->phone }}">
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Password *</label>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Enter Password" >
                                                    
                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                                            </div>
                                            <div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
