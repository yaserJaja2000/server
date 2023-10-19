@extends('admin.blank')

@if ($type == "account")
    @section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="container mt-3">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-secondary">تعديل كلمة المرور</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-end">
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row mt-3 d-flex flex-column align-items-start">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">كلمة المرور الحالية</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" style="background: #eee" name="password_confirmation" required value="" class="form-control ">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">كلمة المرور الجديدة</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" style="background: #eee" name="password" required value="" class="form-control ">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-sm fw-bold">تعديل </button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div>
        </div>
    </div>
    @endsection
@elseif ($type == 'settings')
@section('content')
<div class="container mt-3">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-secondary">تعديل معلومات الموقع</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" dir="ltr">
                <form action="{{ route('settings.update', "1") }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="container mt-3">
                        <h5 class="text-success fw-bold mb-3 border-bottom-success" style="width: fit-content">Contact Us</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">URL</label>
                                    <input type="url" style="background: #eee" name="url" value="{{$setting->url}}" class="form-control">
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Phone</label>
                                    <input type="text" style="background: #eee" name="phone" value="{{$setting->phone}}" class="form-control ">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Country</label>
                                    <input type="text" style="background: #eee" name="country" value="{{$setting->country}}" class="form-control ">
                                    @error('country')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">City</label>
                                    <input type="text" style="background: #eee" name="city" value="{{$setting->city}}" class="form-control ">
                                    @error('city')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5  class="text-success fw-bold my-3 border-bottom-success" style="width: fit-content">Follow Us</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Facebook</label>
                                    <input type="url"  style="background: #eee" name="facebook" value="{{$setting->facebook}}" class="form-control">
                                    @error('facebook')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Instagram</label>
                                    <input type="url" style="background: #eee" name="instagram" value="{{$setting->instagram}}" class="form-control ">
                                    @error('instagram')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">WhatsApp</label>
                                    <input type="url" style="background: #eee" name="whatsapp" value="{{$setting->whatsapp}}" class="form-control ">
                                    @error('whatsapp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Whatsapp Group</label>
                                    <input type="url" style="background: #eee" name="twitter" value="{{$setting->twitter}}" class="form-control ">
                                    @error('twitter')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Telegram</label>
                                    <input type="url" style="background: #eee" name="telegram" value="{{$setting->telegram}}" class="form-control ">
                                    @error('telegram')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5  class="text-success fw-bold my-3 border-bottom-success" style="width: fit-content">Subscribe</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">URL Button</label>
                                    <input type="text" style="background: #eee" name="url_email" value="{{$setting->url_email}}" class="form-control ">
                                    @error('url_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5  class="text-success fw-bold my-3 border-bottom-success" style="width: fit-content">Our Application</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Google Play</label>
                                    <input type="url" style="background: #eee" name="googl_play" value="{{$setting->googl_play}}" class="form-control ">
                                    @error('googl_play')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">App Store</label>
                                    <input type="url" style="background: #eee" name="app_store" value="{{$setting->app_store}}" class="form-control">
                                    @error('app_store')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm fw-bold">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-sm-12 col-md-6">
                <div class="container mt-3">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-secondary">تعديل كلمة المرور</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-end">
                            <form action="{{ route('users.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <div class="row mt-3 d-flex flex-column align-items-start">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-bold">الإيميل</label>
                                                <input type="text" style="background: #eee" readonly value="{{$user->email}}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-bold">كلمة المرور الحالية</label>
                                                <span class="text-danger">*</span>
                                                <input type="text" style="background: #eee" name="password_confirmation" required value="" class="form-control ">
                                                @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-bold">كلمة المرور الجديدة</label>
                                                <span class="text-danger">*</span>
                                                <input type="text" style="background: #eee" name="password" required value="" class="form-control ">
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success btn-sm fw-bold">تعديل </button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <div>
            </div>
        </div>
@endsection
@endif
