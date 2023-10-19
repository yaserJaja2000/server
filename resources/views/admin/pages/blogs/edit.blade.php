@extends('admin.blank')

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            @if ($category == 1)
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex align-blogs-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-secondary">تعديل المقال</h6>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">العودة</a>
                </div>
                <!-- Card Body -->
                <div class="card-body" dir="rtl">
                    <form action="{{ route('blogs.update', $item) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label text-secondary fw-bold">العنوان</label>
                            <input type="text" name="title" value="{{ $item->title }}" class="form-control ">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="form-label text-secondary fw-bold">المحتوى</label>
                            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{ $item->body }}</textarea>
                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">دولة</label>
                            <select name="country_id" class="form-select " aria-label="Default select example">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة الحالية</label>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" width="150" height="100" class="mt-2"
                                    alt="Imgae">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">تعديل الصورة</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </form>
            @elseif ($category == 2)
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex align-blogs-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-secondary">تعديل الرحلة</h6>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">العودة</a>
                </div>
                <!-- Card Body -->
                <div class="card-body" dir="rtl">
                    <form action="{{ route('blogs.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label text-secondary fw-bold">العنوان</label>
                            <input type="text" name="title" value="{{ $item->title }}" class="form-control ">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="form-label text-secondary fw-bold">الوصف</label>
                            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{ $item->body }}</textarea>
                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة
                                الحالية</label>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" width="150" height="100" class="mt-2"
                                    alt="Imgae">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">تعديل الصورة</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </form>
                </div>
            @elseif ($category == 3)
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex align-blogs-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-secondary">تعديل التيشيرت</h6>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">العودة</a>
                </div>
                <!-- Card Body -->
                <div class="card-body" dir="rtl">
                    <form action="{{ route('blogs.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">دولة</label>
                            <select name="country_id" class="form-select " aria-label="Default select example">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة
                                الحالية</label>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" width="150" height="100"
                                    class="mt-2" alt="Imgae">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">تعديل الصورة</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </form>
                </div>
            @elseif ($category == 4)
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex align-blogs-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-secondary">تعديل اكتشاف الأصدقاء</h6>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">العودة</a>
                </div>
                <!-- Card Body -->
                <div class="card-body" dir="rtl">
                    <form action="{{ route('blogs.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">الرابط</label>
                            <input type="text" name="url" value="{{ $item->url }}"
                                class="form-control">
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة
                                الحالية</label>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" width="150" height="100"
                                    class="mt-2" alt="Imgae">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">تعديل
                                الصورة</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </form>
                </div>
            @elseif ($category == 5)
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex align-blogs-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-secondary">تعديل الأرشيف</h6>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">العودة</a>
                </div>
                <!-- Card Body -->
                <div class="card-body" dir="rtl">
                    <form action="{{ route('blogs.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة
                                الحالية</label>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" width="150" height="100"
                                    class="mt-2" alt="Imgae">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-secondary fw-bold">تعديل
                                الصورة</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
