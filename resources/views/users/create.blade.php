@extends('layouts.main-body-structer')

@section('page-title')
    إضافة مستخدم
@endsection

@section('content')
    <x-card title="إضافة مستخدم جديد">
        <x-slot name="body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                            <label>الاسم</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني"
                                required>
                            <label>البريد الإلكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف">
                            <label>رقم الهاتف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="role" class="form-select" required>
                                <option value="admin">مدير</option>
                                <option value="attorney">محامي</option>
                                <option value="reception">استقبال</option>
                            </select>
                            <label>الدور</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                            <label>كلمة المرور</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="تأكيد كلمة المرور" required>
                            <label>تأكيد كلمة المرور</label>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary">حفظ</button>
            </form>
        </x-slot>
    </x-card>
@endsection
