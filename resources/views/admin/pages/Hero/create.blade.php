@extends('admin.blank')

{{-- @section('title', 'إضافة صورة جديدة') --}}

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">إضافة صورة جديدة</h6>
                <a href="{{ route('hero.index') }}" class="btn btn-secondary btn-sm">العودة</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">العنوان</label>
                        <span class="text-danger">*</span>
                        <input type="text" name="title" class="form-control" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                        <span class="text-danger">*</span>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">الصورة</label>
                        <span class="text-danger">*</span>
                        <input class="form-control" name="image" type="file" id="formFile" required>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">إنشاء</button>
                </form>
            </div>
        </div>
    @endsection
