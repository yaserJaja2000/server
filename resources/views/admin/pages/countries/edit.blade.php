@extends('admin.blank')

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">تعديل الدولة </h6>
                <a href="{{ route('countries.index') }}" class="btn btn-secondary btn-sm">العودة</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('countries.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الدولة</label>
                        <input type="text" name="name" value="{{$country->name}}" class="form-control ">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label d-block">أيقونة الدولة الحالية</label>
                        @if ($country->icon)
                            <img
                                src="{{asset($country->icon)}}"
                                width="150"
                                height="100"
                                class="mt-2"
                                alt="Imgae"
                            >
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">تعديل الأيقونة</label>
                        <input class="form-control" name="icon" type="file" id="formFile">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">تعديل</button>
                </form>
            </div>
        </div>
    @endsection
