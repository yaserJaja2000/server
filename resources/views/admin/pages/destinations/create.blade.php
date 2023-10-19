@extends('admin.blank')

@section('title', 'إضافة رحلة جديدة')

@section('content')
    <div class="container mt-3">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">إضافة رحلة جديدة</h6>
                <a href="{{ route('destinations.index') }}" class="btn btn-secondary btn-sm">back</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">الدولة</label>
                        <input type="text" name="title" class="form-control ">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">المدينة</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">الرابط</label>
                        <input type="text" name="url" class="form-control">
                        @error('url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">صورة علم الدولة</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">إنشاء</button>
                </form>
            </div>
        </div>
    @endsection
