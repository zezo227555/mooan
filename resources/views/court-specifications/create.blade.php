@extends('layouts.main-body-structer')

@section('page-title')
    إضافة محكمة
@endsection

@section('content')
    <x-card title="إضافة محكمة جديدة">
        <x-slot name="body">
            <form action="{{ route('court-specifications.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" placeholder="اسم المحكمة" required>
                            <label>اسم المحكمة</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="code" class="form-control" placeholder="الكود الداخلي" required>
                            <label>الكود الداخلي</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" placeholder="الوصف" style="height:80px;"></textarea>
                            <label>الوصف</label>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-2">حفظ المحكمة</button>
            </form>
        </x-slot>
    </x-card>
@endsection
