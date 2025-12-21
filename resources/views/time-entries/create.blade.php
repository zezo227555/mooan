@extends('layouts.main-body-structer')

@section('page-title')
    إضافة سجل وقت
@endsection

@section('content')
    <x-card title="إضافة سجل وقت - {{ $legalCase->title }}">
        <x-slot name="body">
            <form action="{{ route('time-entries.store', $legalCase->id) }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="work_date" class="form-control"
                                value="{{ old('work_date', now()->toDateString()) }}">
                            <label>التاريخ</label>
                        </div>
                        @error('work_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="duration_minutes" class="form-control" placeholder="المدة بالدقائق"
                                min="1" value="{{ old('duration_minutes') }}">
                            <label>المدة (بالدقائق)</label>
                        </div>
                        @error('duration_minutes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" rows="4" placeholder="وصف العمل">{{ old('description') }}</textarea>
                            <label>الوصف</label>
                        </div>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-2">حفظ البيانات</button>
            </form>
        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('time-entries.index', $legalCase->id) }}" class="btn btn-secondary">
                ← العودة إلى سجل الوقت
            </a>
        </x-slot>
    </x-card>
@endsection
