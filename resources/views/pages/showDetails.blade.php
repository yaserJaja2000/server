@extends('components.layout')

@section('container')
    @include('components.header')

    @isset($blog)
        <div class="show-details" class="" dir="rtl">
            <div class="image" style="background-image: url({{ asset($blog->image) }});"></div>
            <h2 class="heading pt-3 text-center">{{ $blog->title }}</h5>
                <p class="fs-5">{{ $blog->body }}</p>
        </div>
    @endisset

    @isset($section)
        <div class="section-show-details show-details" class="" dir="rtl">
            <div class="image" style="background-image: url({{ asset($section->image) }});">
                <div class="text d-flex align-items-center justify-content-start">
                    <h3 class="text-light">{{ $section->country->name }}</h3>
                    <h3 class="text-light">/</span>
                        <h5 class="text-light">{{ $section->name }}
                    </h3>
                </div>
            </div>
            <h2 class="heading pt-3 text-center">{{ $section->title }}</h5>
            <p class="fs-5">{{ $section->body }}</p>
        </div>
        <div class="" style="background: #f1f4fd; width: 100%" dir="rtl">
            <div class="container pb-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($images as $image)
                        <div class="col-sm-12 col-md-6">
                            <div class="discovery card h-100 position-relative">
                                <a href="#" class="image" style="height: 100%; width:100%">
                                    <img src="{{ asset($image->image) }}" style="height: 100%; width:100%"
                                        class="card-img-top img-fluid img-thumbnail" alt="...">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @isset($list)
        <div class="show-details" class="" dir="rtl">
            <div class="image" style="background-image: url({{ asset($list->image) }});"></div>
            <h2 class="heading pt-3 text-center">{{ $list->title }}</h5>
                <p class="fs-5">{{ $list->description }}</p>
        </div>
    @endisset

    @isset($deal)
        <div class="show-details" class="" dir="rtl">
            <div class="image" style="background-image: url({{ asset($deal->image) }});"></div>
            <h2 class="heading pt-3 text-center">{{ $deal->title }}</h5>
                <p class="fs-5">{{ $deal->body }}</p>
        </div>
    @endisset

    @isset($offer)
        <div class="show-details" dir="rtl">
            <div class="image" style="background-image: url({{ asset($offer->image) }});"></div>
            <h2 class="heading pt-3">{{ $offer->title }}</h5>
            <div class="content">
                <p class="fs-5">{{ $offer->body }}</p>
                <a href="{{ $offer->url }}" class="{{ $offer->url ? '' : 'disabled' }} btn btn-warning">
                    الحجز
                </a>
            </div>
        </div>
    @endisset

    @include('components.footer')
@endsection
