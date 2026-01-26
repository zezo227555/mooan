@extends('layouts.main-body-structer')

@section('page-title')
    الملف الشخصي
@endsection

@section('content')
    {{-- 👤 Personal Info --}}
    <x-card title="البيانات الشخصية">
        <x-slot name="body">
            <form method="POST" action="{{ route('client.profile.update') }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" class="form-control" value="{{ $client->first_name }}"
                                required>
                            <label>الاسم الأول</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" class="form-control" value="{{ $client->last_name }}"
                                required>
                            <label>اسم العائلة</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
                            <label>رقم الهاتف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" value="{{ $client->address }}">
                            <label>العنوان</label>
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
            <form method="POST" action="{{ route('client.profile.password') }}">
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
