@extends('admin.blank')

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">تعديل الصفقة </h6>
                <a href="{{ route('deals.index') }}" class="btn btn-secondary btn-sm">العودة</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">العنوان</label>
                        <input type="text" name="title" value="{{$deal->title}}" class="form-control ">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{$deal->body}}</textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="name" class="form-label">الرابط</label>
                        <input type="text" name="url" value="{{$deal->url}}" class="form-control">
                        @error('url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="formFile" class="form-label d-block">الصورة الحالية</label>
                        @if ($deal->image)
                            <img
                                src="{{asset($deal->image)}}"
                                width="150"
                                height="100"
                                class="mt-2"
                                alt="Imgae"
                            >
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">تعديل الصورة</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">تعديل</button>
                </form>
            </div>
        </div>
    @endsection
