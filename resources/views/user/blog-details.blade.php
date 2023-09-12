@extends('layouts.app')
@section('title')
    Blog Details
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1 blog-page">
        <div class="row ">
            <div class="col-xl-9 col-lg-8 order-lg-2">
                <div class="card blog-details-box">
                    <!-- Gallery-->
                    <div class="blog-details-slider owl-carousel owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="">
                                <div class="owl-item cloned" style="width: 831px;"><img
                                        src="{{ asset('storage') }}/{{ $blog->image }}" alt="Image"></div>

                            </div>
                        </div>
                    </div>
                    <div class="blog-details-main-content">
                        <h4 class="pt-4 b-d-title">{{ $blog->title }}</h4>
                        <ul class="post-meta mb-4">
                            <li><i class="icon-user"></i><a href="javascript:;}">Admin</a></li>
                            <li><i class="icon-tag"></i><a
                                    href="{{ route('user.blog.category', ['id' => $blog->cat_id]) }}">Beauty</a></li>
                            <li><i class="icon-clock"></i><a
                                    href="javascript:;">{{ \Carbon\Carbon::now()->format('Y , M d', strtotime($blog->created_at)) }}</a>
                            </li>
                        </ul>
                        <div>
                            {!! $blog->description !!}
                        </div>

                        <!-- Post Tags + Share-->
                        <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-4">

                            <div class="pb-2">
                                Tags :
                                @php
                                    $tags = json_encode($blog->tags);
                                    $tags = json_decode($tags);
                                    $tags = json_decode($tags);
                                @endphp
                                @foreach ($tags as $tag)
                                    <a class="text-sm text-muted navi-link">{{ $tag->value }}</a>,
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.blog-sidebar')
        </div>
    </div>
@endsection
