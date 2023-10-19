@extends('admin.blank')

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">تعديل المقال</h6>
                <a href="{{ route('images.index') }}" class="btn btn-secondary btn-sm">العودة</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="formFile" class="form-label d-block text-secondary fw-bold">الصورة الحالية</label>
                            @if ($image->image)
                                <img src="{{ asset($image->image) }}" width="150" height="100" class="mt-2"
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
                        <div class="mb-3">
                            <label for="name" class="form-label">الرابط</label>
                            <input type="text" name="link" value="{{$image->link}}" class="form-control">
                            @error('link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <label for="formFile" class="form-label text-secondary fw-bold">القسم</label>
                        <select name="section_id" class="form-select" aria-label="Default select example">
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">تعديل</button>
                </form>
            </div>
        </div>
    </div>
@endsection
