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
                        <li><a href="/faq">faq</a></li>
                        <li class="separator"></li>
                        <li>{{ $faqcategory->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-1x mb-3">
        @foreach ($faqcategory->faqs as $faq)
            <div class="accordion" id="accordion1">
                <div class="card accordion-item mb-4">
                    <div class="card-header accordion-header" id="heading0">
                        <h6 class="accordion-button">
                            <a href="#collapse0" data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="false"
                                aria-controls="collapse0">{{ $faq->title }}</a>
                        </h6>
                    </div>
                    <div id="collapse0" class="accordion-collapse collapse" aria-labelledby="heading0"
                        data-bs-parent="#accordion1">
                        <div class="card-body">{{ $faq->details }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
