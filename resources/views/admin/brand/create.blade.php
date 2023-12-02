@extends('layouts.admin')
@section('title')
    Brand Create
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title"><b>Create Brand</b> </h3>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.brand.index') }}"><i
                                    class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <form class="admin-form" action="{{ route('admin.brand.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Set Image *</label>
                                                <br>
                                                <img class="admin-img"
                                                    src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/placeholder.png"
                                                    alt="No Image Found">
                                                <br>
                                                <span class="mt-1">Image Size Should Be 60 x 60.</span>
                                            </div>

                                            <div class="form-group position-relative">
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
                                                <label for="name">Name *</label>
                                                <input type="text" name="name" class="form-control item-name"
                                                    id="name" placeholder="Enter Name" value="">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary ">Submit</button>
                                            </div>
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
