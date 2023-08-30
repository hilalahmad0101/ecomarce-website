@extends('layouts.admin')
@section('title')
    Update Slider
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class=" mb-0 bc-title"><b>Update Slider</b> </h3>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.slider.index') }}"><i
                                    class="fas fa-chevron-left"></i>
                                Back</a>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" aria-labelledby="pills-home-tab">
                                                <form action="{{ route('admin.slider.update',['id'=>$slider->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="title">Title *</label>
                                                        <input type="text"  name="title" class="form-control"
                                                            id="title" placeholder="Enter Title" value="{{ $slider->title }}">
                                                            @error('title')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="slider-link">Link *</label>
                                                        <input type="text" name="url" val class="form-control"
                                                            id="slider-link" placeholder="Enter Link" value="{{ $slider->url }}">
                                                            @error('url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="details">Details *</label>
                                                        <textarea name="details" id="details" class="form-control" rows="5" placeholder="Enter Details">{{ $slider->details }}</textarea>
                                                        @error('details')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label id="slider_text" for="name">Set Slider Image *</label>
                                                        <br>
                                                        <img class="admin-img"
                                                            src="{{ asset('storage') }}/{{ $slider->image }}"
                                                            alt="No Image Found">
                                                        <br>
                                                        <span id="chenge_label2" class="mt-1">Image Size Should Be 968 x
                                                            530 </span>
                                                    </div>

                                                    <div class="form-group position-relative ">
                                                        <label class="file">
                                                            <input type="file" accept="image/*" class="upload-photo"
                                                                name="image" id="file"
                                                                aria-label="File browser example">
                                                            <span class="file-custom text-left">Upload Image...</span>
                                                        </label>
                                                    </div>
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

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
        </div>
    </div>
@endsection
