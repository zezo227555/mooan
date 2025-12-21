@extends('layouts.main-body-structer')

@section('page-title')
    تفاصيل المحكمة
@endsection

@section('content')
    {{-- Court Overview --}}
    <x-card title="معلومات المحكمة">
        <x-slot name="body">
            <div class="row">
                <div class="col-md-4">
                    <strong>اسم المحكمة:</strong>
                    <div>{{ $courtSpecification->name }}</div>
                </div>

                <div class="col-md-4">
                    <strong>الكود الداخلي:</strong>
                    <div>{{ $courtSpecification->code }}</div>
                </div>

                <div class="col-md-4">
                    <strong>الحالة:</strong>
                    <span class="badge bg-{{ $courtSpecification->active ? 'success' : 'secondary' }}">
                        {{ $courtSpecification->active ? 'مفعلة' : 'معطلة' }}
                    </span>
                </div>

                <div class="col-md-12 mt-2">
                    <strong>الوصف:</strong>
                    <div>{{ $courtSpecification->description ?? '-' }}</div>
                </div>
            </div>
        </x-slot>
    </x-card>

    {{-- Quick Stats --}}
    <x-card title="ملخص القضايا">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-3">
                    <div class="fw-bold fs-5">{{ $courtSpecification->total_cases }}</div>
                    <div class="text-muted">إجمالي القضايا</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-5">{{ $courtSpecification->open_cases }}</div>
                    <div class="text-success">قضايا مفتوحة</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-5">{{ $courtSpecification->closed_cases }}</div>
                    <div class="text-secondary">قضايا مغلقة</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-5">{{ $courtSpecification->suspended_cases }}</div>
                    <div class="text-warning">قضايا معلقة</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- Footer Actions --}}
    <a href="{{ route('court-specifications.edit', $courtSpecification->id) }}" class="btn btn-warning">
        تعديل المحكمة
    </a>
    <a href="{{ route('court-specifications.index') }}" class="btn btn-light">
        رجوع
    </a>
@endsection
