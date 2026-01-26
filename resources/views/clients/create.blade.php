@extends('layouts.main-body-structer')

@section('page-title')
    العملاء
@endsection

@section('content')
    <x-card title="اضافة عميل">
        <x-slot name="body">
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="الاسم الاول">
                            <label for="floatingInput">الاسم الاول</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="الاسم الاخير">
                            <label for="floatingInput">الاسم الاخير</label>
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
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                            <label for="floatingInput">البريد الالكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" placeholder="رقم الهاتف">
                            <label for="floatingInput">العنوان</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="national_id" class="form-control" placeholder="رقم الهاتف">
                            <label for="floatingInput">الرقم الوطني</label>
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

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="ملاحظات" name="notes"></textarea>
                                <label for="floatingTextarea2">ملاحظات</label>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" role="submit" class="btn btn-primary mt-2">حفظ البيانات</button>
            </form>
        </x-slot>
    </x-card>
@endsection
