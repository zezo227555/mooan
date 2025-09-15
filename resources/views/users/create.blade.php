@extends('layouts.main-body-structer')

@section('page-title')
    المستخدمين
@endsection

@section('content')
    <x-card title="اضافة مستخدم">
        <x-slot name="body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" placeholder="الاسم">
                            <label for="floatingInput">الاسم</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                            <label for="floatingInput">البريد الالكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف">
                            <label for="floatingInput">رقم الهاتف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                            <label for="floatingInput">كلمة المرور</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" name="role">
                                <option value="customer">زبون</option>
                                <option value="admin">مدير</option>
                                <option value="staff">موظف</option>
                                <option value="logistics">لوجستيات</option>
                            </select>
                            <label for="floatingSelect">الصلاحية</label>
                        </div>
                    </div>

                </div>
                <button type="submit" role="submit" class="btn btn-primary mt-2">حفظ البيانات</button>
            </form>
        </x-slot>
    </x-card>
@endsection
