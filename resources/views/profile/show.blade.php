@extends('layouts.main-body-structer')

@section('page-title')
    الملف الشخصي
@endsection

@section('content')
    {{-- 👤 Profile Info --}}
    <x-card title="البيانات الشخصية">
        <x-slot name="body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            <label>الاسم</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            <label>البريد الإلكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            <label>رقم الهاتف</label>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary">حفظ التعديلات</button>
            </form>
        </x-slot>
    </x-card>

    {{-- 🔐 Change Password --}}
    <x-card title="تغيير كلمة المرور" class="mt-3">
        <x-slot name="body">
            <form method="POST" action="{{ route('profile.password') }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="password" name="current_password" class="form-control" required>
                            <label>كلمة المرور الحالية</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" required>
                            <label>كلمة المرور الجديدة</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control" required>
                            <label>تأكيد كلمة المرور</label>
                        </div>
                    </div>

                </div>

                <button class="btn btn-warning">تغيير كلمة المرور</button>
            </form>
        </x-slot>
    </x-card>
@endsection
