<nav class="header-pure navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{ asset('assets/images/logo.png') }}" width="200" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-row-reverse align-items-center">
                <li class="nav-item ms-lg-1 ms-xl-3">
                    <a href="{{$setting->whatsapp}}" class="">
                        <img src="{{ asset('assets/images/whatsapp1.png') }}" width="30" alt="">
                    </a>
                    <a href="https://shop.tulineturizm.com/" class="">
                        <img src="{{ asset('assets/images/store.png') }}" width="25" alt="">
                    </a>
                    @auth
                        <a href="{{ route('settings.edit', 1) }}" class="">
                            <img src="{{ asset('assets/images/dashboard.png') }}" width="25" alt="">
                        </a>
                    @endauth
                </li>
                <li class="nav-item me-lg-1">
                    <a class="nav-link active" href="{{ route('home') }}#">الرئيسية</a>
                </li>
                <li class="nav-item me-lg-1">
                    <a class="nav-link" href="{{ route('viewToUsers') }}">المدونة الإلكترونية</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        وجهاتنا
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($countries as $country)
                            <li class="nav-item dropend">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{$country->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($country->sections as $section)
                                        <li><a class="dropdown-item" href="{{route('sections.show', $section->id)}}">{{$section->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item me-lg-1">
                    <a class="nav-link" href="{{route('home')}}#deals">الصفقات</a>
                </li>
                <li class="nav-item me-lg-1">
                    <a class="nav-link" href="#">الأخبار السياحية</a>
                </li>
                <li class="nav-item me-lg-1">
                    <a class="nav-link" href="https://shop.tulineturizm.com/">المتجر الإلكتروني</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
