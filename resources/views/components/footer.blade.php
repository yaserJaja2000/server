<div style="padding: 50px 0 20px;" class="footer" id="footer">
    <div class="d-flex justify-content-evenly">
        <div class="mb-4">
            <h4 class="text-light fs-5 mb-3">Patagonia</h4>
            <p>Enjoy the Journey ,Not The destination</p>
            <img class="rounded" src="{{ asset('assets/images/footer.jpeg') }}" width="200" alt="">
        </div>
        <div class="contact-us mb-4">
            <h4 class="text-light fs-5 mb-3">Contact Us</h4>
            <p><a class="" href="{{$setting->url}}">{{$setting->url}}</a></p>
            <p class="">{{$setting->country}} , {{$setting->city}}</p>
            <p class="">+{{$setting->phone}}</p>
        </div>
        <div class="mb-4">
            <h4 class="text-light fs-5 mb-3">Follow us</h4>
            <ul class="nav mb-4">
                <li class="nav-item">
                    <a href="{{url($setting->facebook)}}" class="nav-link me-2 p-0  fs-5"><i class="bi bi-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{url($setting->instagram)}}" class="nav-link mx-2 p-0  fs-5"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{url($setting->telegram)}}" class="nav-link mx-2 p-0  fs-5"><i class="bi bi-telegram"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{$setting->whatsapp}}" class="nav-link mx-2 p-0  fs-5"><i class="bi bi-whatsapp"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{$setting->twitter}}" class="nav-link mx-2 p-0  fs-5"><i class="bi bi-people-fill"></i></a>
                </li>
            </ul>
            <h4 class="text-light fs-5 mb-3">Subscribe</h4>
            <form action="{{$setting->url_email}}" method="POST" class="d-flex">
                @csrf
                <input type="email" class="form-control me-2" placeholder="Your Email" name="email" id="">
                <button type="submit" class="btn rounded-circle text-light fw-bold"><i
                        class="bi bi-chevron-right"></i>
                </button>
            </form>
        </div>
    </div>
    <hr>
    @if ($setting->app_store && $setting->googl_play)
        <div class="soon d-flex flex-row-reverse align-items-center justify-content-center">
            <h5 class="ms-3">تطبيقنا</h3>
            <a class="ms-1" href="{{$setting->googl_play}}">
                <img class="ms-1" src="{{asset('assets/images/google.png')}}" width="100" alt="">
            </a>
            <a class="ms-1" href="{{$setting->app_store}}">
                <img class="ms-1" src="{{asset('assets/images/app.png')}}" width="100" alt="">
            </a>
        </div>
    @else
        <div class="soon d-flex flex-row-reverse align-items-center justify-content-center">
            <h5 class="ms-3">تطبيقنا قريباً </h3>
            <img class="ms-1" src="{{asset('assets/images/google.png')}}" width="100" alt="">
            <img class="ms-1" src="{{asset('assets/images/app.png')}}" width="100" alt="">
        </div>
    @endif
</div>
