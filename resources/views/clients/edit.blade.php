@extends('layouts.main-body-structer')

@section('page-title')
    العملاء
@endsection

@section('content')
    <x-card title="تعديل بيانات عميل">
        <x-slot name="body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="الاسم الاول"
                                value="{{ $client->first_name }}">
                            <label for="floatingInput">الاسم الاول</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="الاسم الاخير"
                                value="{{ $client->last_name }}">
                            <label for="floatingInput">الاسم الاخير</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف"
                                value="{{ $client->phone }}">
                            <label for="floatingInput">رقم الهاتف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني"
                                value="{{ $client->email }}">
                            <label for="floatingInput">البريد الالكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" placeholder="العنوان"
                                value="{{ $client->address }}">
                            <label for="floatingInput">العنوان</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="national_id" class="form-control" placeholder="الرقم الوطني"
                                value="{{ $client->national_id }}">
                            <label for="floatingInput">الرقم الوطني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="ملاحظات" name="notes">{{ $client->notes }}"</textarea>
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
