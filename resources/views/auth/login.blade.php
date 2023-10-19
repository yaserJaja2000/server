@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-end">تسجيل الدخول</div>
                <div class="container">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.login') }}">
                            @csrf
                            <div class="row d-flex" dir="rtl">
                                <div class="col-md-12 mb-2">
                                    <label for="email" class="d-block mb-2 text-end">البريد الإلكتروني</label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="email" style="background: #eee;" type="email" class=" border-secondary form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="email" class="d-block mb-2 text-end">كلمة المرور</label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="password" style="background: #eee;" type="password" class=" border-secondary form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="remember">
                                            <input class="form-check-input border-secondary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>تذكرني</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        تسجيل الدخول
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
