@extends('layouts.main-body-structer')

@section('page-title')
    تعديل محكمة
@endsection

@section('content')
    <x-card title="تعديل المحكمة">
        <x-slot name="body">
            <form action="{{ route('court-specifications.update', $courtSpecification->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" placeholder="اسم المحكمة"
                                value="{{ $courtSpecification->name }}" required>
                            <label>اسم المحكمة</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="code" class="form-control" placeholder="الكود الداخلي"
                                value="{{ $courtSpecification->code }}" required>
                            <label>الكود الداخلي</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" placeholder="الوصف" style="height:80px;">{{ $courtSpecification->description }}</textarea>
                            <label>الوصف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="active" value="1" id="activeSwitch"
                                {{ $courtSpecification->active ? 'checked' : '' }}>
                            <label class="form-check-label" for="activeSwitch">مفعلة</label>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-warning mt-2">تحديث المحكمة</button>
            </form>
        </x-slot>
    </x-card>
@endsection
