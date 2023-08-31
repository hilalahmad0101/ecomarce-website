@extends('layouts.admin')
@section('title')
    Manage Site
@endsection
@section('content')
    @php
        $basic_value = json_decode($basic_setting->value);
        $home_page_value = json_decode($home_page_setting->value);
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
                                <form class="admin-form" action="{{ route('admin.manage-site.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
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
                                                <a class="nav-link" data-toggle="pill" href="#links">Menu</a>
                                                <a class="nav-link" data-toggle="pill" href="#custom_css"
                                                    id="newcss">Custom Css</a>
                                                <a class="nav-link" data-toggle="pill" href="#google_recaptcha">Scripts</a>
                                                <a class="nav-link" data-toggle="pill" href="#shop">Shop &amp; Checkout
                                                    Page</a>
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
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label for="title">App Name *</label>
                                                                        <input type="text" name="app_name"
                                                                            value="{{ $basic_value->app_name }}"
                                                                            class="form-control" id="app_name"
                                                                            placeholder="Enter Website App_name"
                                                                            value="OmniMart">
                                                                        <input type="hidden" name="key"
                                                                            value="basic_setting" class="form-control"
                                                                            id="key"
                                                                            placeholder="Enter Website App_name"
                                                                            value="OmniMart">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label for="home_page_title">Home Page Title
                                                                            *</label>
                                                                        <input type="text" name="home_page_title"
                                                                            class="form-control" id="home_page_title"
                                                                            value="{{ $basic_value->home_page_title }}"
                                                                            placeholder="Enter Home Page Title"
                                                                            value="Ecommerce Shopping Platform">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div id="herosectionbanner" class="tab-pane"><br>
                                                            <input type="hidden" name="key" value="home_page"
                                                                id="">
                                                            <div class="form-group">
                                                                <label for="name">Image 1 *</label>
                                                                <br>
                                                                <img class="admin-img"
                                                                    src="{{ asset('storage') }}/{{ $home_page_value->image1 }}"
                                                                    alt="No Image Found">
                                                                <br>
                                                                <span class="mt-1">Image Size Should Be 496 x 204.</span>
                                                            </div>
                                                            <div class="form-group position-relative">
                                                                <label class="file">
                                                                    <input type="file" accept="image/*"
                                                                        class="upload-photo" name="image1"
                                                                        id="file" aria-label="File browser example">
                                                                    <span class="file-custom text-left">Upload
                                                                        Image...</span>
                                                                </label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title1">Title *</label>
                                                                <input type="text" name="title1" class="form-control"
                                                                    id="title1" placeholder="Enter Title"
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
                                                                <input type="text" name="url1" class="form-control"
                                                                    id="url1" placeholder="Enter Url"
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
                                                                <span class="mt-1">Image Size Should Be 496 x 204.</span>
                                                            </div>
                                                            <div class="form-group position-relative">
                                                                <label class="file">
                                                                    <input type="file" accept="image/*"
                                                                        class="upload-photo" name="image2"
                                                                        id="file" aria-label="File browser example">
                                                                    <span class="file-custom text-left">Upload
                                                                        Image...</span>
                                                                </label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title1">Title *</label>
                                                                <input type="text" name="title2" class="form-control"
                                                                    id="title2" placeholder="Enter Title"
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
                                                                <input type="text" name="url2" class="form-control"
                                                                    id="url2" placeholder="Enter Url"
                                                                    value="{{ $home_page_value->url2 }}">
                                                            </div>

                                                            <input type="hidden" name="old_image1"
                                                                value="{{ $home_page_value->image1 }}" id="">
                                                            <input type="hidden" name="old_image2"
                                                                value="{{ $home_page_value->image2 }}" id="">
                                                        </div>

                                                        <div id="media" class="tab-pane"><br>
                                                            <input type="hidden" name="key" value="media"
                                                                id="">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-8">
                                                                    <ul
                                                                        class="nav nav-pills nav-justified nav-secondary nav-pills-no-bd">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" data-toggle="pill"
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
                                                                                    <input type="hidden" name="old_logo"
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

                                                                        <div id="favicon" class="container tab-pane">
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

                                                                        <div id="loader" class="container tab-pane">
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

                                                        </div>

                                                        <div id="seo" class="tab-pane"><br>

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
                                                                        <label for="meta_description">Site Meta Description
                                                                            *</label>
                                                                        <textarea name="meta_description" id="meta_description" class="form-control" rows="5"
                                                                            placeholder="Enter Site Meta Description">{{ $seo_value->meta_description }}</textarea>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div id="custom_css" class="tab-pane">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label>Custom Css *</label>
                                                                        <textarea name="custom_css" class="form-control" id="custom_css_area" placeholder="Custom Css"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="links" class="tab-pane"><br>

                                                            <div class="row justify-content-center">

                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_shop" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Shop</span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_blog" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Blog</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_campaign" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display
                                                                                Campaign</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_brands" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Brand</span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_faq" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Faq</span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 offset-lg-3">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_contact" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display
                                                                                Contact</span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div id="footer" class="tab-pane"><br>
                                                            <input type="hidden" name="key" value="footer"
                                                                id="">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-8">

                                                                    <div class="tab-content">

                                                                        <div id="footer_basic"
                                                                            class="container tab-pane active"><br>
                                                                            <div class="row justify-content-center">

                                                                                <div class="col-lg-12">

                                                                                    <div class="form-group">
                                                                                        <label for="footer_address">Store
                                                                                            Address *</label>
                                                                                        <input type="text"
                                                                                            name="footer_address"
                                                                                            class="form-control"
                                                                                            id="footer_address"
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
                                                                                            value="{{ $footer_value->face }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="email">Store
                                                                                            Email *</label>
                                                                                        <input type="text"
                                                                                            name="twitter"
                                                                                            class="form-control"
                                                                                            id="twitter"
                                                                                            placeholder="Twitter Link"
                                                                                            value="demoemail123@gmail.com">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="email">Store
                                                                                            Email *</label>
                                                                                        <input type="text"
                                                                                            name="youtube"
                                                                                            class="form-control"
                                                                                            id="youtube"
                                                                                            placeholder="Youtube Link"
                                                                                            value="demoemail123@gmail.com">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="email">Store
                                                                                            Email *</label>
                                                                                        <input type="text"
                                                                                            name="linkedin"
                                                                                            class="form-control"
                                                                                            id="linkedin"
                                                                                            placeholder="LinkeDin Link"
                                                                                            value="demoemail123@gmail.com">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="copy_right">Copyright
                                                                                            *</label>
                                                                                        <textarea name="copyright" id="copyright" class="form-control" rows="3" placeholder="Copyright">OmniMart © All rights reserved.</textarea>
                                                                                    </div>


                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div id="google_recaptcha" class="tab-pane"><br>
                                                            <div class="row justify-content-center">

                                                                <div class="col-lg-8">

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_google_analytics" value="1">
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Google
                                                                                Analytics</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Google Analytics *</label>
                                                                        <textarea name="google_analytics" class="form-control" id="" placeholder="Google Analytics"></textarea>
                                                                    </div>

                                                                    <hr>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_google_adsense" value="1">
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Google Adsense
                                                                                Code</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Google Adsense Code *</label>
                                                                        <textarea name="google_adsense" class="form-control" id="" placeholder="Google Adsense Code"></textarea>
                                                                    </div>


                                                                    <hr>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="recaptcha" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Google
                                                                                Recaptcha</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="google_recaptcha_site_key">Google
                                                                            Rechaptcha Site Key *</label>
                                                                        <input type="text"
                                                                            name="google_recaptcha_site_key"
                                                                            class="form-control"
                                                                            id="google_recaptcha_site_key"
                                                                            placeholder="Google Rechaptcha Site Key"
                                                                            value="6LcnPoEaAAAAAF6QhKPZ8V4744yiEnr41li3SYDn">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="google_recaptcha_secret_key">Google
                                                                            Rechaptcha Secret Key</label>
                                                                        <input type="text"
                                                                            name="google_recaptcha_secret_key"
                                                                            class="form-control"
                                                                            id="google_recaptcha_secret_key"
                                                                            placeholder="Google Rechaptcha Secret Key"
                                                                            value="6LcnPoEaAAAAACV_xC4jdPqumaYKBnxz9Sj6y0zk">
                                                                    </div>


                                                                    <hr>



                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_facebook_pixel" value="1">
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Facebook
                                                                                Pixel</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Facebook Pixel *</label>
                                                                        <textarea name="facebook_pixel" class="form-control" id="" placeholder="Facebook Pixel"></textarea>
                                                                    </div>


                                                                    <hr>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_facebook_messenger"
                                                                                value="1">
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Facebook
                                                                                Messenger</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Facebook Messenger *</label>
                                                                        <textarea name="facebook_messenger" class="form-control" id="" placeholder="Facebook Messenger">&lt;!-- Messenger Chat Plugin Code --&gt;
&lt;div id=&quot;fb-root&quot;&gt;&lt;/div&gt;

&lt;!-- Your Chat Plugin code --&gt;
&lt;div id=&quot;fb-customer-chat&quot; class=&quot;fb-customerchat&quot;&gt;
&lt;/div&gt;

&lt;script&gt;
  var chatbox = document.getElementById(&#039;fb-customer-chat&#039;);
  chatbox.setAttribute(&quot;page_id&quot;, &quot;858401617860382&quot;);
  chatbox.setAttribute(&quot;attribution&quot;, &quot;biz_inbox&quot;);
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : &#039;v11.0&#039;
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = &#039;https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js&#039;;
    fjs.parentNode.insertBefore(js, fjs);
  }(document, &#039;script&#039;, &#039;facebook-jssdk&#039;));
&lt;/script&gt;</textarea>
                                                                    </div>


                                                                    <hr>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_disqus" value="1" checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Display Disqus</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Disqus Script *</label>
                                                                        <textarea name="disqus" class="form-control" id="" placeholder="Disqus Script">&lt;div id=&quot;disqus_thread&quot;&gt;&lt;/div&gt;
&lt;script&gt;
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page&#039;s canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page&#039;s unique identifier variable
};
*/
(function() { // DON&#039;T EDIT BELOW THIS LINE
var d = document, s = d.createElement(&#039;script&#039;);
s.src = &#039;https://omnimart.disqus.com/embed.js&#039;;
s.setAttribute(&#039;data-timestamp&#039;, +new Date());
(d.head || d.body).appendChild(s);
})();
&lt;/script&gt;</textarea>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>



                                                        <div id="shop" class="tab-pane"><br>
                                                            <div class="row justify-content-center">

                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_attribute_search" value="1"
                                                                                checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Filter By
                                                                                Attribute &amp; Attribute Options</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_range_search" value="1"
                                                                                checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Filter By
                                                                                Price Range</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="view_product">View Product *</label>
                                                                        <input type="text" name="view_product"
                                                                            class="form-control" id="view_product"
                                                                            placeholder="View Product" value="16">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="max_price">Price Range Max *</label>
                                                                        <input type="text" name="max_price"
                                                                            class="form-control" id="max_price"
                                                                            placeholder="Price Range Max" value="10000">
                                                                    </div>

                                                                    <hr>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_guest_checkout" value="1"
                                                                                checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Guest
                                                                                Checkout</span>
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="switch-primary">
                                                                            <input type="checkbox"
                                                                                class="switch switch-bootstrap status"
                                                                                name="is_privacy_trams" value="1"
                                                                                checked>
                                                                            <span class="switch-body"></span>
                                                                            <span class="switch-text">Enable Privacy &amp;
                                                                                Terms Conditions</span>
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="policy_link">Privacy Policy Link
                                                                            *</label>
                                                                        <input type="text" name="policy_link"
                                                                            class="form-control" id="policy_link"
                                                                            placeholder="Privacy Policy"
                                                                            value="http://localhost/my/omnimart3/privacy-policy">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="terms_link">Terms of Service Link
                                                                            *</label>
                                                                        <input type="text" name="terms_link"
                                                                            class="form-control" id="terms_link"
                                                                            placeholder="Terms of Service"
                                                                            value="http://localhost/my/omnimart3/terms-and-service">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex justify-content-center">
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
        </div>
    </div>
@endsection
