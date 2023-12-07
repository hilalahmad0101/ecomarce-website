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
                        <h3 class="mb-0 bc-title pl-3"><b>Update Profile</b></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Update Profile</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">

                    {{-- show error if available --}}
                    @if (session('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                        </div>
                    @endif
                    {{-- show success message  --}}
                    @if (session('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                        </div>
                    @endif

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <div class="p-5">
                                            <form class="admin-form" action="{{ route('admin.update.profile') }}"
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
                                                    <label for="name">Username *</label>
                                                    <input type="text" name="username" class="form-control"
                                                        id="name" placeholder="User Name"
                                                        value="{{ Auth::guard('admin')->user()->username }}">
                                                    @error('username')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label for="email">Email Address *</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Email Address"
                                                        value="{{ Auth::guard('admin')->user()->email }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone Number *</label>
                                                    <input type="text" name="phone" class="form-control" id="phone"
                                                        placeholder="Phone Number"
                                                        value="{{ Auth::guard('admin')->user()->phone }}">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="existingPassword">Existing Password *</label>
                                                    <input type="password" name="existing_password" class="form-control"
                                                        id="existingPassword" placeholder="Enter Existing Password">
                                                </div>

                                                <!-- New Password -->
                                                <div class="form-group">
                                                    <label for="newPassword">New Password *</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="newPassword" placeholder="Enter New Password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Password Confirmation -->
                                                <div class="form-group">
                                                    <label for="confirmPassword">Confirm Password *</label>
                                                    <input type="password" name="password_confirmation" class="form-control"
                                                        id="confirmPassword" placeholder="Confirm New Password">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-secondary btn-block">Submit</button>
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
