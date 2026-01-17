@extends('layouts.auth-body-structer')

@section('custom-css')
    <style>
        .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
            margin-right: calc(var(--bs-border-width) * -1);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-top-left-radius: 0.25rem !important;
            border-bottom-left-radius: 0.25rem !important;
        }

        .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n+3),
        .input-group:not(.has-validation)>.form-floating:not(:last-child)>.form-control,
        .input-group:not(.has-validation)>.form-floating:not(:last-child)>.form-select,
        .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu):not(.form-floating) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 0.25rem !important;
            border-bottom-right-radius: 0.25rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="card custom-card">
        <div class="card-body p-5">
            <p class="h5 fw-semibold mb-2 text-center">تسجيل الدخول</p>
            @if ($errors->has('login_error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('login_error') }}
                </div>
            @endif
            <form action="{{ route('client.login') }}" method="POST">
                @csrf
                <div class="row gy-3">
                    <div class="col-xl-12">
                        <label for="signin-username" class="form-label text-default">اسم المستحدم</label>
                        <input type="email" name="email" class="form-control form-control-lg" id="signin-username"
                            placeholder="اسم المستخدم">
                    </div>
                    <div class="col-xl-12 mb-2">
                        <label for="signin-password" class="form-label text-default d-block">كلمة المرور</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="signin-password"
                                placeholder="كلمة المرور">
                            <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)"
                                id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-2">
                        <button type="submit" role="submit" class="btn btn-lg btn-primary">تسجيل الدخول</button>
                    </div>
                </div>
            </form>
            <div class="text-center my-3 authentication-barrier">
                <span>أو</span>
            </div>
            <div class="btn-list text-center">
                <button class="btn btn-icon btn-light">
                    <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                </button>
                <button class="btn btn-icon btn-light">
                    <i class="ri-google-line fw-bold text-dark op-7"></i>
                </button>
                <button class="btn btn-icon btn-light">
                    <i class="ri-twitter-x-line fw-bold text-dark op-7"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
