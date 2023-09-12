@extends('layouts.admin')
@section('title')
    Manage Site
@endsection
@section('content')
    @php
        $basic_value = json_decode($basic_setting->value);
        $home_page_value = json_decode($home_page_setting->value);
        $first_three_column_value = json_decode($first_three_column->value);
        $second_three_column_value = json_decode($second_three_column->value);
        $four_three_column_value = json_decode($four_three_column->value);
        $third_two_column_value = json_decode($third_two_column->value);
        $media_value = json_decode($media_setting->value);
        $seo_value = json_decode($seo_setting->value);
        $footer_value = json_decode($footer_setting->value);
    @endphp
    <div class="content">
        <div class="page-inner">
            <!-- Start of Main Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title"><b>Basic Information</b></h3>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="nav flex-column m-3 nav-pills nav-secondary" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" data-toggle="pill" href="#basic">Basic
                                                    Information</a>
                                                <a class="nav-link" data-toggle="pill" href="#herosectionbanner">Hero
                                                    Section Banner</a>
                                                <a class="nav-link" data-toggle="pill" href="#media">Media</a>
                                                <a class="nav-link" data-toggle="pill" href="#seo">Seo</a>
                                                <a class="nav-link" data-toggle="pill" href="#ftc">First Three Column</a>
                                                <a class="nav-link" data-toggle="pill" href="#stc">Second Three
                                                    Column</a>
                                                <a class="nav-link" data-toggle="pill" href="#ttc">Thrid Two Column</a>
                                                <a class="nav-link" data-toggle="pill" href="#ftc1">Four Three Column</a>
                                                <a class="nav-link" data-toggle="pill" href="#footer">Footer &amp; Contact
                                                    Page</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9">
                                            <div class="">
                                                <div id="tabs">
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div id="basic" class="tab-pane active"><br>
                                                            <form action="{{ route('admin.manage-site.basic_setting') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-8">
                                                                        <div class="form-group">
                                                                            <label for="title">App Name *</label>
                                                                            <input type="text" name="app_name"
                                                                                value="{{ $basic_value->app_name }}"
                                                                                class="form-control" id="app_name"
                                                                                placeholder="Enter Website App_name">
                                                                            <input type="hidden" name="key"
                                                                                value="basic_setting" class="form-control"
                                                                                id="key"
                                                                                placeholder="Enter Website App_name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <div class="form-group">
                                                                            <label for="home_page_title">Home Page Title
                                                                                *</label>
                                                                            <input type="text" name="home_page_title"
                                                                                class="form-control" id="home_page_title"
                                                                                value="{{ $basic_value->home_page_title }}"
                                                                                placeholder="Enter Home Page Title">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="herosectionbanner" class="tab-pane"><br>
                                                            <form action="{{ route('admin.manage-site.home_page') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                   @csrf
                                                                <input type="hidden" name="key" value="home_page"
                                                                    id="">
                                                                <div class="form-group">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $home_page_value->image1 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image1"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title1"
                                                                        class="form-control" id="title1"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $home_page_value->title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title1"
                                                                        class="form-control" id="sub_title1"
                                                                        placeholder="Enter Subtitle"value="{{ $home_page_value->sub_title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 1 *</label>
                                                                    <input type="text" name="url1"
                                                                        class="form-control" id="url1"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $home_page_value->url1 }}">
                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $home_page_value->image2 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image2"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title2"
                                                                        class="form-control" id="title2"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $home_page_value->title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title2"
                                                                        class="form-control" id="sub_title2"
                                                                        placeholder="Enter Subtitle"value="{{ $home_page_value->sub_title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 2 *</label>
                                                                    <input type="text" name="url2"
                                                                        class="form-control" id="url2"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $home_page_value->url2 }}">
                                                                </div>

                                                                <input type="hidden" name="old_image1"
                                                                    value="{{ $home_page_value->image1 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image2"
                                                                    value="{{ $home_page_value->image2 }}"
                                                                    id="">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="media" class="tab-pane"><br>
                                                            <form action="{{ route('admin.manage-site.media') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="key" value="media"
                                                                    id="">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-8">
                                                                        <ul
                                                                            class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active"
                                                                                    data-toggle="pill"
                                                                                    href="#logo">Logo</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill"
                                                                                    href="#favicon">Favicon</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-toggle="pill"
                                                                                    href="#loader">Loader</a>
                                                                            </li>
                                                                        </ul>

                                                                        <div class="tab-content">
                                                                            <div id="logo"
                                                                                class="container tab-pane active"><br>
                                                                                <div class="row justify-content-center">

                                                                                    <div class="col-lg-12 ">

                                                                                        <div class="form-group">
                                                                                            <label for="name">Current
                                                                                                Image</label>
                                                                                            <div class="col-lg-12 pb-1">
                                                                                                <img class="admin-setting-img"
                                                                                                    src="{{ asset('storage') }}/{{ $media_value->logo }}"
                                                                                                    alt="No Image Found">
                                                                                            </div>
                                                                                            <span>Image Size Should Be 140 x
                                                                                                40.</span>
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="old_logo"
                                                                                            value="{{ $media_value->logo }}"
                                                                                            id="">

                                                                                        <div
                                                                                            class="form-group position-relative ">
                                                                                            <label class="file">
                                                                                                <input type="file"
                                                                                                    accept="image/*"
                                                                                                    class="upload-photo"
                                                                                                    name="logo"
                                                                                                    id="file"
                                                                                                    aria-label="File browser example">
                                                                                                <span
                                                                                                    class="file-custom text-left">Upload
                                                                                                    Image...</span>
                                                                                            </label>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <div id="favicon"
                                                                                class="container tab-pane">
                                                                                <br>
                                                                                <div class="row justify-content-center">

                                                                                    <div class="col-lg-12">

                                                                                        <div class="form-group">
                                                                                            <label for="name">Current
                                                                                                Image</label>
                                                                                            <div class="col-lg-12 pb-1">
                                                                                                <img class="admin-setting-img my-mw-100"
                                                                                                    src="{{ asset('storage') }}/{{ $media_value->favicon }}"
                                                                                                    alt="No Image Found">
                                                                                            </div>
                                                                                            <span>Image Size Should Be 16 x
                                                                                                16.</span>
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="old_favicon"
                                                                                            value="{{ $media_value->favicon }}"
                                                                                            id="">
                                                                                        <div
                                                                                            class="form-group position-relative ">
                                                                                            <label class="file">
                                                                                                <input type="file"
                                                                                                    accept="image/*"
                                                                                                    class="upload-photo"
                                                                                                    name="favicon"
                                                                                                    id="file"
                                                                                                    aria-label="File browser example">
                                                                                                <span
                                                                                                    class="file-custom text-left">Upload
                                                                                                    Image...</span>
                                                                                            </label>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <div id="loader"
                                                                                class="container tab-pane">
                                                                                <br>
                                                                                <div class="row justify-content-center">

                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="switch-primary">
                                                                                                <input type="checkbox"
                                                                                                    class="switch switch-bootstrap "
                                                                                                    name="is_loader"
                                                                                                    value="1" checked>
                                                                                                <span
                                                                                                    class="switch-body"></span>
                                                                                                <span
                                                                                                    class="switch-text">Display
                                                                                                    Loader</span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="name">Current
                                                                                                Image</label>
                                                                                            <div class="col-lg-12 pb-1">
                                                                                                <img class="admin-setting-img my-mw-100"
                                                                                                    src="{{ asset('storage') }}/{{ $media_value->loader }}"
                                                                                                    alt="No Image Found">
                                                                                            </div>
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="old_loader"
                                                                                            value="{{ $media_value->loader }}"
                                                                                            id="">
                                                                                        <div
                                                                                            class="form-group position-relative ">
                                                                                            <label class="file">
                                                                                                <input type="file"
                                                                                                    accept="image/*"
                                                                                                    class="upload-photo"
                                                                                                    name="loader"
                                                                                                    id="file"
                                                                                                    aria-label="File browser example">
                                                                                                <span
                                                                                                    class="file-custom text-left">Upload
                                                                                                    Image...</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div id="seo" class="tab-pane"><br>
                                                            <form action="{{ route('admin.manage-site.seo') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                 @csrf
                                                                <div class="row justify-content-center">
                                                                    <input type="hidden" name="key" id=""
                                                                        value="seo">
                                                                    <div class="col-lg-8">
                                                                        <div class="form-group">
                                                                            <label for="meta_keywords">Site Meta Keywords
                                                                                *</label>
                                                                            <input type="text" name="meta_keyword"
                                                                                class="tags" id="meta_keyword"
                                                                                placeholder="Site Meta Keywords"
                                                                                value="{{ $seo_value->meta_keyword }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="meta_description">Site Meta
                                                                                Description
                                                                                *</label>
                                                                            <textarea name="meta_description" id="meta_description" class="form-control" rows="5"
                                                                                placeholder="Enter Site Meta Description">{{ $seo_value->meta_description }}</textarea>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div id="footer" class="tab-pane"><br>
                                                            <form action="{{ route('admin.manage-site.footer') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-8">
                                                                        <input type="hidden" name="key"
                                                                            value="footer" id="">
                                                                        <div class="tab-content">

                                                                            <div id="footer_basic"
                                                                                class="container tab-pane active"><br>
                                                                                <div class="row justify-content-center">

                                                                                    <div class="col-lg-12">

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="footer_address">Store
                                                                                                Address *</label>
                                                                                            <input type="text"
                                                                                                name="address"
                                                                                                class="form-control"
                                                                                                id="address"
                                                                                                placeholder="Store Address"
                                                                                                value="{{ $footer_value->address }}">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="phone">Store
                                                                                                Phone Number *</label>
                                                                                            <input type="text"
                                                                                                name="phone"
                                                                                                class="form-control"
                                                                                                id="phone"
                                                                                                placeholder="Store Phone Number"
                                                                                                value="{{ $footer_value->phone }}">
                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <label for="email">Store
                                                                                                Email *</label>
                                                                                            <input type="email"
                                                                                                name="email"
                                                                                                class="form-control"
                                                                                                id="email"
                                                                                                placeholder="Store Email"
                                                                                                value="{{ $footer_value->email }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Store
                                                                                                Email *</label>
                                                                                            <input type="text"
                                                                                                name="facebook"
                                                                                                class="form-control"
                                                                                                id="facebook"
                                                                                                placeholder="Facebook Link"
                                                                                                value="{{ $footer_value->facebook }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Store
                                                                                                Email *</label>
                                                                                            <input type="text"
                                                                                                name="twitter"
                                                                                                class="form-control"
                                                                                                id="twitter"
                                                                                                placeholder="Twitter Link"
                                                                                                value="{{ $footer_value->twitter }}">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="email">Store
                                                                                                Email *</label>
                                                                                            <input type="text"
                                                                                                name="youtube"
                                                                                                class="form-control"
                                                                                                id="youtube"
                                                                                                placeholder="Youtube Link"
                                                                                                value="{{ $footer_value->youtube }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Store
                                                                                                Email *</label>
                                                                                            <input type="text"
                                                                                                name="linkedin"
                                                                                                class="form-control"
                                                                                                id="linkedin"
                                                                                                placeholder="LinkeDin Link"
                                                                                                value="{{ $footer_value->linkedin }}">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="copy_right">Copyright
                                                                                                *</label>
                                                                                            <textarea name="copyright" id="copyright" class="form-control" rows="3" placeholder="Copyright">{{ $footer_value->copyright }}</textarea>
                                                                                        </div>


                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div id="ftc" class="tab-pane"><br>
                                                            <form
                                                                action="{{ route('admin.manage-site.first_three_column') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="key"
                                                                        value="first_three_column" id="">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $first_three_column_value->image1 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image1"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title1"
                                                                        class="form-control" id="title1"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $first_three_column_value->title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title1"
                                                                        class="form-control" id="sub_title1"
                                                                        placeholder="Enter Subtitle"value="{{ $first_three_column_value->sub_title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 1 *</label>
                                                                    <input type="text" name="url1"
                                                                        class="form-control" id="url1"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $first_three_column_value->url1 }}">
                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 2 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $first_three_column_value->image2 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image2"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title2"
                                                                        class="form-control" id="title2"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $first_three_column_value->title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title2"
                                                                        class="form-control" id="sub_title2"
                                                                        placeholder="Enter Subtitle"value="{{ $first_three_column_value->sub_title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 2 *</label>
                                                                    <input type="text" name="url2"
                                                                        class="form-control" id="url2"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $first_three_column_value->url2 }}">
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 3 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $first_three_column_value->image3 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image3"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title3"
                                                                        class="form-control" id="title3"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $first_three_column_value->title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title3"
                                                                        class="form-control" id="sub_title3"
                                                                        placeholder="Enter Subtitle"value="{{ $first_three_column_value->sub_title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 3 *</label>
                                                                    <input type="text" name="url3"
                                                                        class="form-control" id="url3"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $first_three_column_value->url3 }}">
                                                                </div>

                                                                <input type="hidden" name="old_image1"
                                                                    value="{{ $first_three_column_value->image1 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image2"
                                                                    value="{{ $first_three_column_value->image2 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image3"
                                                                    value="{{ $first_three_column_value->image2 }}"
                                                                    id="">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div id="stc" class="tab-pane"><br>

                                                            <form
                                                                action="{{ route('admin.manage-site.second_three_column') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                 @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="key"
                                                                        value="second_three_column" id="">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $second_three_column_value->image1 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image1"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title1"
                                                                        class="form-control" id="title1"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $second_three_column_value->title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title1"
                                                                        class="form-control" id="sub_title1"
                                                                        placeholder="Enter Subtitle"value="{{ $second_three_column_value->sub_title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 1 *</label>
                                                                    <input type="text" name="url1"
                                                                        class="form-control" id="url1"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $second_three_column_value->url1 }}">
                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 2 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $second_three_column_value->image2 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image2"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title2"
                                                                        class="form-control" id="title2"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $second_three_column_value->title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title2"
                                                                        class="form-control" id="sub_title2"
                                                                        placeholder="Enter Subtitle"value="{{ $second_three_column_value->sub_title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 2 *</label>
                                                                    <input type="text" name="url2"
                                                                        class="form-control" id="url2"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $second_three_column_value->url2 }}">
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 3 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $second_three_column_value->image3 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image3"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title3"
                                                                        class="form-control" id="title3"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $second_three_column_value->title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title3"
                                                                        class="form-control" id="sub_title3"
                                                                        placeholder="Enter Subtitle"value="{{ $second_three_column_value->sub_title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 3 *</label>
                                                                    <input type="text" name="url3"
                                                                        class="form-control" id="url3"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $second_three_column_value->url3 }}">
                                                                </div>

                                                                <input type="hidden" name="old_image1"
                                                                    value="{{ $second_three_column_value->image1 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image2"
                                                                    value="{{ $second_three_column_value->image2 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image3"
                                                                    value="{{ $second_three_column_value->image2 }}"
                                                                    id="">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="ftc1" class="tab-pane"><br>
                                                            <form
                                                                action="{{ route('admin.manage-site.four_three_column') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="key"
                                                                        value="four_three_column" id="">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $four_three_column_value->image1 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image1"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title1"
                                                                        class="form-control" id="title1"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $four_three_column_value->title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title1"
                                                                        class="form-control" id="sub_title1"
                                                                        placeholder="Enter Subtitle"value="{{ $four_three_column_value->sub_title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 1 *</label>
                                                                    <input type="text" name="url1"
                                                                        class="form-control" id="url1"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $four_three_column_value->url1 }}">
                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 2 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $four_three_column_value->image2 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image2"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title2"
                                                                        class="form-control" id="title2"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $four_three_column_value->title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title2"
                                                                        class="form-control" id="sub_title2"
                                                                        placeholder="Enter Subtitle"value="{{ $four_three_column_value->sub_title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 2 *</label>
                                                                    <input type="text" name="url2"
                                                                        class="form-control" id="url2"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $four_three_column_value->url2 }}">
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 3 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $four_three_column_value->image3 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image3"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title3"
                                                                        class="form-control" id="title3"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $four_three_column_value->title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title3"
                                                                        class="form-control" id="sub_title3"
                                                                        placeholder="Enter Subtitle"value="{{ $four_three_column_value->sub_title3 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 3 *</label>
                                                                    <input type="text" name="url3"
                                                                        class="form-control" id="url3"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $four_three_column_value->url3 }}">
                                                                </div>

                                                                <input type="hidden" name="old_image1"
                                                                    value="{{ $four_three_column_value->image1 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image2"
                                                                    value="{{ $four_three_column_value->image2 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image3"
                                                                    value="{{ $four_three_column_value->image2 }}"
                                                                    id="">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="ttc" class="tab-pane"><br>
                                                            <form
                                                                action="{{ route('admin.manage-site.third_two_column') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                   @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="key"
                                                                        value="third_two_column" id="">
                                                                    <label for="name">Image 1 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $third_two_column_value->image1 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image1"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title1"
                                                                        class="form-control" id="title1"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $third_two_column_value->title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title1"
                                                                        class="form-control" id="sub_title1"
                                                                        placeholder="Enter Subtitle"value="{{ $third_two_column_value->sub_title1 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 1 *</label>
                                                                    <input type="text" name="url1"
                                                                        class="form-control" id="url1"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $third_two_column_value->url1 }}">
                                                                </div>

                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="name">Image 2 *</label>
                                                                    <br>
                                                                    <img class="admin-img"
                                                                        src="{{ asset('storage') }}/{{ $third_two_column_value->image2 }}"
                                                                        alt="No Image Found">
                                                                    <br>
                                                                    <span class="mt-1">Image Size Should Be 496 x
                                                                        204.</span>
                                                                </div>
                                                                <div class="form-group position-relative">
                                                                    <label class="file">
                                                                        <input type="file" accept="image/*"
                                                                            class="upload-photo" name="image2"
                                                                            id="file"
                                                                            aria-label="File browser example">
                                                                        <span class="file-custom text-left">Upload
                                                                            Image...</span>
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="title1">Title *</label>
                                                                    <input type="text" name="title2"
                                                                        class="form-control" id="title2"
                                                                        placeholder="Enter Title"
                                                                        value="{{ $third_two_column_value->title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="subtitle1">Subtitle </label>
                                                                    <input type="text" name="sub_title2"
                                                                        class="form-control" id="sub_title2"
                                                                        placeholder="Enter Subtitle"value="{{ $third_two_column_value->sub_title2 }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="url1">URL 2 *</label>
                                                                    <input type="text" name="url2"
                                                                        class="form-control" id="url2"
                                                                        placeholder="Enter Url"
                                                                        value="{{ $third_two_column_value->url2 }}">
                                                                </div>

                                                                <input type="hidden" name="old_image1"
                                                                    value="{{ $third_two_column_value->image1 }}"
                                                                    id="">
                                                                <input type="hidden" name="old_image2"
                                                                    value="{{ $third_two_column_value->image2 }}"
                                                                    id="">
                                                                <div class="form-group d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary ">Submit</button>
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
            </div>
        </div>
    </div>
@endsection
