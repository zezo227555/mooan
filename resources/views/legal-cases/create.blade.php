@extends('layouts.main-body-structer')

@section('page-title')
    القضايا
@endsection

@section('content')
    <x-card title="اضافة قضية">
        <x-slot name="body">
            <form action="{{ route('legal-cases.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control mt-2 p-3" data-trigger name="client_id" id="choices-multiple-groups">
                            <option value="">اختر العميل</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->getFullNameAttribute() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control" placeholder="العنوان">
                            <label for="floatingInput">العنوان</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="case_number" class="form-control" placeholder="رقم القضية">
                            <label for="floatingInput">رقم القضية</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="court_specification_id" class="form-select">
                                <option value="">اختر المحكمة المختصة</option>
                                @foreach ($courtSpecifications as $court)
                                    <option value="{{ $court->id }}">{{ $court->name }}</option>
                                @endforeach
                            </select>
                            <label>المحكمة المختصة</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="description" class="form-control" placeholder="الوصف">
                            <label for="floatingInput">الوصف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="status" class="form-select">
                                <option value="open">مفتوحة</option>
                                <option value="closed">مغلقة</option>
                                <option value="pending">معقلة</option>
                                <option value="archived">مؤرشفة</option>
                            </select>
                            <label for="floatingInput">الحالة</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="filing_date" class="form-control" placeholder="تاريخ الابلاغ">
                            <label for="floatingInput">تاريخ الابلاغ</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="closing_date" class="form-control" placeholder="تاريخ الاغلاق">
                            <label for="floatingInput">تاريخ الاغلاق</label>
                        </div>
                    </div>

                </div>
                <button type="submit" role="submit" class="btn btn-primary mt-2">حفظ البيانات</button>
            </form>
        </x-slot>
    </x-card>
@endsection
