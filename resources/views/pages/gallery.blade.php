@extends('components.layout')

@section('container')
    @include('components.header')

    @isset($articles)
        <div class="gallery">
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="image-map border">
                            <img src="{{ asset('assets/images/map.png') }}" class="img-fluid img-thumbnail" alt="...">
                            <a href="{{ route('viewToUsers', 'shirts') }}" class="shirt-link">
                                <img src="{{ asset('assets/images/shirt.png') }}" class="img-fluid bg-transparent"
                                    alt="...">
                            </a>
                            <a href="{{ route('viewToUsers', 'trips') }}" class="trip-link">
                                <img src="{{ asset('assets/images/trip.png') }}" class="img-fluid bg-transparent"
                                    alt="...">
                            </a>
                            <a href="{{ route('home') }}" class="home-link">
                                <img src="{{ asset('assets/images/home.png') }}" class="img-fluid bg-transparent"
                                    alt="...">
                            </a>
                            <a href="{{ route('viewToUsers', 'discoveries') }}" class="discovery-link">
                                <img src="{{ asset('assets/images/discovery.png') }}"class="img-fluid bg-transparent"
                                    alt="...">
                            </a>
                            <a href="{{ route('viewToUsers', 'archives') }}" class="archive-link">
                                <img src="{{ asset('assets/images/archive.png') }}" width="70"
                                    class="img-fluid bg-transparent" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-4 pb-5">
                <h2 class="heading">المقالات</h2>
                <div class="row justify-content-start">
                    <div class="col-sm-12 col-md-3">
                        <select id="selectChange" class="form-select" aria-label="Default select example">
                            <option value="0">كل المقالات</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="article-list" name="article-list">
                    <div class="row row-cols-1 row-cols-md-3 gy-4 mt-4">
                        @foreach ($articles as $article)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="article card h-100">
                                    <img src="{{ asset($article->image) }}" style="height: 260px"
                                        class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->title}}</h5>
                                        <p class="card-text">
                                            {{ substr($article->description, 0, 80) }}...
                                        </p>
                                        <a href="{{route('blogs.show', $article->id)}}" class="btn btn-warning fw-bold">إقرأ المزيد</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @push('ajaxGallery')
    <script>
        $(document).ready(function() {
            $('#selectChange').on("change", function () {
                let countryId = $('#selectChange').val();
                $.ajax({
                    type:'GET',
                    url:`/blog/articles/${countryId}`,
                    success:function(articles) {
                        let articleObject = articles.articles
                        let articleList = Object.keys(articleObject).map((key) => [articleObject[key]]);
                        let articleHTML = ``;
                        let link = "";
                        let urlArr = "";
                        let idLast ="";
                        let url = "";
                        articleList.map((art) => {
                            urlArr = "{{route('blogs.show', $article->id)}}".split('/');
                            idLast = ["{{route('blogs.show', $article->id)}}".split('/').length - 1];
                            urlArr[idLast] = art[0].id;
                            url = urlArr.join(",").replaceAll(",", "\\");
                            articleHTML += `
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="trip card h-100">
                                        <img src="${art[0].image}" style="height: 260px"
                                            class="card-img-top img-fluid" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">${art[0].title}</h5>
                                            <p class="card-text">
                                                ${art[0].body.slice(0, 80)}...
                                            </p>
                                            <a href="${url}" class="btn btn-warning fw-bold">إقرأ المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        })
                        let resHTML = `
                        <div class="row row-cols-1 row-cols-md-3 gy-4 mt-4">
                            ${articleHTML}
                        </div>
                        `
                        $('#article-list').empty();
                        $('#article-list').append(resHTML);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            })
        })
    </script>
    @endpush
    @endisset

    @isset($trips)
        <div class="gallery">
            <div class="container pt-4 pb-5">
                <h2 class="heading">رحلات يحيى</h2>
                <div class="row row-cols-1 row-cols-md-3 gy-4">
                    @foreach ($trips as $trip)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="trip card h-100">
                                <img src="{{ asset($trip->image) }}" style="height: 260px" class="card-img-top img-fluid"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $trip->title }}</h5>
                                    <p class="card-text">
                                        {{ substr($trip->body, 0, 80) }}...
                                    </p>
                                    <a href="#" class="btn btn-warning fw-bold">إقرأ المزيد</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @isset($shirts)
        <div class="gallery">
            <div class="container pt-4 pb-5">
                <h2 class="heading">تشيرت السفر</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($shirts as $shirt)
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="shirt card h-100 position-relative">
                                <div class="image" style="height: 100%; width:100%">
                                    <img src="{{ asset($shirt->image) }}" style="height: 100%; width:100%"
                                        class="card-img-top img-fluid" alt="...">
                                </div>
                                <p class='position-absolute text-light fw-bold fs-3'>{{ $shirt->country->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @isset($discoveries)
        <div class="gallery">
            <div class="container pt-4 pb-5">
                <h2 class="heading">اكتشاف الأصدقاء</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($discoveries as $discovery)
                        <div class="col-sm-12 col-md-6">
                            <div class="discovery card h-100 position-relative">
                                <a href="{{ $discovery->url }}" class="image" style="height: 100%; width:100%">
                                    <img src="{{ asset($discovery->image) }}" style="height: 100%; width:100%"
                                        class="card-img-top img-fluid" alt="...">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @isset($archives)
        <div class="gallery">
            <div class="container pt-4 pb-5">
                <h2 class="heading">أرشيف الصور</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($archives as $archive)
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="archive card h-100 position-relative">
                                <div class="image" style="height: 100%; width:100%">
                                    <img src="{{ asset($archive->image) }}" style="height: 100%; width:100%"
                                        class="card-img-top img-fluid" alt="...">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @include('components.footer')
@endsection
