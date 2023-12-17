@extends('layouts.app')
@section('title')
    Faq
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Faq</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3 pb-3">
        <div class="row pb-4">
            @foreach ($faq_categories as $faq)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('user.faqs', ['slug' => $faq->slug]) }}" class="card mb-4 faq-box">
                    <div class="card-body">
                        <h6 class="card-title">{{ $faq->name }}</h6>
                        <p class="card-text">{{ $faq->text }}</p>
                        <span class="text-sm text-muted link">View Details <i class="icon-chevron-right"></i></span>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
@endsection
