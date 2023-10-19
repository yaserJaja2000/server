@extends('components.layout')

@section('container')

    @include('components.header')

    {{-- Hero start --}}
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" dir="rtl">
            @foreach ($lists as $list)
                <div class="carousel-item {{ $list->id === 1 ? 'active' : '' }}">
                    <div class="image" style="background-image: url({{ asset($list->image) }})">
                        <div class="carousel-caption">
                            <h5 class="animated bounceInRight mb-3" style="animation-delay: 1s">{{ $list->title }}</h5>
                            <p class="animated bounceInLeft mb-3 body Hero" style="animation-delay: 2s">
                                {{ substr($list->description, 0, 250) }}
                                <span class="dots">...</span>
                            </p>
                            <p class="animated bounceInRight" style="animation-delay: 3s"><a href="{{route('hero.show', $list->id)}}" class="btn btn-warning"">اقرأ المزيد</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Hero end --}}

    {{-- Our Destination start --}}
    <div class="destination" id="destination">
        <div class="text-center">
            <h2 class="heading">اكتشف وجهاتنا</h2>
        </div>
        <div class="container">
            <div class="swiper mySwiper pb-4">
                <ul class="swiper-wrapper image-list">
                    @foreach ($countries as $country)
                        @foreach ($country->sections as $key => $section )
                            @if($key === 0)
                                <div class="card h-100 swiper-slide">
                                    <a href="{{route('countries.show', $section->id)}}">
                                        <div class="image img-fluid" style="background-image: url({{asset($section->image)}})"></div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-text text-end px-1 text-dark">{{$country->name}}</h5>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>
            </div>
        </div>
    </div>
    {{-- Our Destination end --}}

    {{-- Deals start --}}
    <div class="deals" id="deals">
        <div class="text-center">
            <h2 class="heading">الصفقات الذكية</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($deals as $deal)
                    <div class="deal col-sm-12 col-md-12 col-lg-6 mb-3">
                        <div class="card mb-3 w-full">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset($deal->image) }}" width="100%" height="100%"
                                        class="rounded-start" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body" dir="rtl">
                                        <h5 class="card-title">{{$deal->title}}</h5>
                                        <p class="card-text">{{substr($deal->body, 0, 160)}}...</p>
                                        <p class="card-text"><a href="{{route('deals.show', $deal->id)}}" class="btn btn-warning btn-sm">أقرأ المزيد</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Deals end --}}

    {{--  Promotions start --}}
    <div class="promotions" id="promotions" dir="rtl">
        <div class="text-center">
            <h2 class="heading">العروض الترويجية</h2>
        </div>
        <div class="container">
            <ul class="nav nav-pills mb-3 justify-content-center mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">الأكثر مبيعا</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">كوبونات</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">كومبو</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="swiper mySwiper pb-5">
                        <div class="swiper-wrapper">
                            @foreach ($offers1 as $offer)
                                <div class="card h-100 swiper-slide">
                                    <img src="{{ asset($offer->image) }}" class="img-fluid" style="height: 225px"
                                    width="100%"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $offer->title }}</h5>
                                        <p class="card-text">{{ substr($offer->body, 0, 125) }}...</p>
                                        <div class="offer-btns">
                                            <a href="{{ $offer->url }}"
                                                class="btn btn-warning btn-sm rounded {{ $offer->url ? '' : 'disabled' }}">الحجز</a>
                                            <a href="{{route('offers.show', $offer->id)}}" class="btn btn-outline-warning btn-sm rounded">قراءة
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next swiper-btn"></div>
                        <div class="swiper-button-prev swiper-btn"></div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="swiper mySwiper pb-5">
                        <div class="swiper-wrapper">
                            @foreach ($offers2 as $offer)
                                <div class="card h-100 swiper-slide">
                                    <img src="{{ asset($offer->image) }}" class="img-fluid" style="height: 225px"
                                    width="100%"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $offer->title }}</h5>
                                        <p class="card-text">{{ substr($offer->body, 0, 125) }}...</p>
                                        <div class="offer-btns">
                                            <a href="{{ $offer->url }}"
                                                class="btn btn-warning btn-sm rounded {{ $offer->url ? '' : 'disabled' }}">الحجز</a>
                                            <a href="{{route('offers.show', $offer->id)}}" class="btn btn-outline-warning btn-sm rounded">قراءة
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next swiper-btn"></div>
                        <div class="swiper-button-prev swiper-btn"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="swiper mySwiper pb-5">
                        <div class="swiper-wrapper">
                            @foreach ($offers3 as $offer)
                                <div class="card h-100 swiper-slide">
                                    <img src="{{ asset($offer->image) }}" class="img-fluid" style="height: 225px"
                                    width="100%"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $offer->title }}</h5>
                                        <p class="card-text">{{ substr($offer->body, 0, 125) }}...</p>
                                        <div class="offer-btns">
                                            <a href="{{ $offer->url }}"
                                                class="btn btn-warning btn-sm rounded {{ $offer->url ? '' : 'disabled' }}">الحجز</a>
                                            <a href="{{route('offers.show', $offer->id)}}" class="btn btn-outline-warning btn-sm rounded">قراءة
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next swiper-btn"></div>
                        <div class="swiper-button-prev swiper-btn"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  Promotions end --}}

    {{--  Contact start --}}
    {{-- @include('components.contact') --}}
    {{--  Contact end --}}

    @include('components.footer')
@endsection



@push('las')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 15,
            centerSlide: true,
            grabCursor: true,
            fade: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3
                }
            }
        });
    </script>
    <script>
        const initSlider = () => {
            const imageList = document.querySelector(
                ".destination  .slider-wrapper .image-list"
            );
            const slideButtons = document.querySelectorAll(
                ".destination .slider-wrapper .slide-button"
            );
            const sliderScrollbar = document.querySelector(
                ".destination .container .slider-scrollbar"
            );
            const scrollbarThumb = sliderScrollbar.querySelector(
                ".destination .scrollbar-thumb"
            );
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

            // Handle scrollbar thumb drag
            scrollbarThumb.addEventListener("mousedown", (e) => {
                const startX = e.clientX;
                const thumbPosition = scrollbarThumb.offsetLeft;
                const maxThumbPosition =
                    sliderScrollbar.getBoundingClientRect().width -
                    scrollbarThumb.offsetWidth;

                // Update thumb position on mouse move
                const handleMouseMove = (e) => {
                    const deltaX = e.clientX - startX;
                    const newThumbPosition = thumbPosition + deltaX;

                    // Ensure the scrollbar thumb stays within bounds
                    const boundedPosition = Math.max(
                        0,
                        Math.min(maxThumbPosition, newThumbPosition)
                    );
                    const scrollPosition =
                        (boundedPosition / maxThumbPosition) * maxScrollLeft;

                    scrollbarThumb.style.left = `${boundedPosition}px`;
                    imageList.scrollLeft = scrollPosition;
                };

                // Remove event listeners on mouse up
                const handleMouseUp = () => {
                    document.removeEventListener("mousemove", handleMouseMove);
                    document.removeEventListener("mouseup", handleMouseUp);
                };

                // Add event listeners for drag interaction
                document.addEventListener("mousemove", handleMouseMove);
                document.addEventListener("mouseup", handleMouseUp);
            });

            // Slide images according to the slide button clicks
            slideButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction;
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                });
            });

            // Show or hide slide buttons based on scroll position
            const handleSlideButtons = () => {
                slideButtons[0].style.display =
                    imageList.scrollLeft <= 0 ? "none" : "flex";
                slideButtons[1].style.display =
                    imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
            };

            // Update scrollbar thumb position based on image scroll
            const updateScrollThumbPosition = () => {
                const scrollPosition = imageList.scrollLeft;
                const thumbPosition =
                    (scrollPosition / maxScrollLeft) *
                    (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
                scrollbarThumb.style.left = `${thumbPosition}px`;
            };

            // Call these two functions when image list scrolls
            imageList.addEventListener("scroll", () => {
                updateScrollThumbPosition();
                handleSlideButtons();
            });
        };

        window.addEventListener("resize", initSlider);
        window.addEventListener("load", initSlider);
    </script>
@endpush
