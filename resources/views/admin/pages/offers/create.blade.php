@extends('admin.blank')

@section('content')
    <div class="container mt-3 text-end">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-secondary">إضافة عرض جديدة</h6>
                <a href="{{ route('offers.index') }}" class="btn btn-secondary btn-sm">العودة</a>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="rtl">
                <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">العنوان
                            <span class="text-danger"> * </span>
                        </label>
                        <input type="text" name="title" class="form-control" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">الوصف
                            <span class="text-danger"> * </span>
                        </label>
                        <textarea required class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">القسم <span class="text-danger"> * </span></label>
                        <select required name="category" class="form-select form-select-md mb-3" aria-label="Large select example">
                            <option value="">اختر قسم</option>
                            <option value="1">الأكثر مبيعاً</option>
                            <option value="2">كوبونات</option>
                            <option value="3">كومبو</option>
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">رابط الحجز</label>
                        <input type="text" name="url" class="form-control">
                        @error('url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">الصورة
                            <span class="text-danger"> * </span>
                        </label>
                        <input required class="form-control" name="image" type="file" id="formFile">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">إنشاء</button>
                </form>
            </div>
        </div>
    @endsection
