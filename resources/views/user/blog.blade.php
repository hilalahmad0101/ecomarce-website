@extends('layouts.app')
@section('title')
    Blog
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
            <!-- Content-->
            <div class="col-xl-9 col-lg-8 order-lg-2">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <a href="{{ route('user.blog_details', ['id'=>$blog->id]) }}"
                            class="blog-post">
                            <div class="post-thumb">
                                <img class="lazy" alt="Blog Post"
                                    src="{{ asset('storage') }}/{{ $blog->image }}"
                                    style="">
                            </div>
                            <div class="post-body">

                                <h3 class="post-title"> {{ $blog->title }}
                                </h3>
                                <ul class="post-meta">

                                    <li><i class="icon-user"></i>Admin</li>
                                    <li><i class="icon-clock"></i>{{ \Carbon\Carbon::now()->format('Y, M d',strtotime($blog->created_at)) }}</li>
                                </ul>
                                <p>{!! substr($blog->description, 0, 50) !!}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                   
                </div>
            </div>
            <!-- Sidebar          -->
          @include('includes.blog-sidebar')

        </div>
    </div>
@endsection
