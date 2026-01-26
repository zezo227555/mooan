@extends('layouts.main-body-structer')

@section('page-title')
    لوحة العميل
@endsection

@section('content')

    {{-- 👋 Welcome --}}
    <x-card title="مرحباً {{ auth('client')->user()->getFullNameAttribute() }}">
        <x-slot name="body">
            <div class="text-muted">
                يمكنك متابعة قضاياك الحالية ومعرفة حالتها من هنا
            </div>
        </x-slot>
    </x-card>

    {{-- 🔢 KPIs --}}
    <x-card title="ملخص القضايا" class="mt-3">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-4">
                    <div class="fw-bold fs-3">{{ $stats['total_cases'] }}</div>
                    <div class="text-muted">إجمالي القضايا</div>
                </div>

                <div class="col-md-4">
                    <div class="fw-bold fs-3 text-warning">{{ $stats['open_cases'] }}</div>
                    <div class="text-muted">قضايا مفتوحة</div>
                </div>

                <div class="col-md-4">
                    <div class="fw-bold fs-3 text-success">{{ $stats['closed_cases'] }}</div>
                    <div class="text-muted">قضايا مغلقة</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- 📂 Case List --}}
    <x-card title="قضاياي" class="mt-3">
        <x-slot name="body">

            @if ($cases->isEmpty())
                <div class="text-center text-muted">
                    لا توجد قضايا مسجلة حتى الآن
                </div>
            @else
                <table class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>رقم القضية</th>
                            <th>العنوان</th>
                            <th>المحكمة</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cases as $case)
                            <tr>
                                <td>{{ $case->case_number }}</td>
                                <td>{{ $case->title }}</td>
                                <td>{{ $case->courtSpecification?->name ?? '-' }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $case->status === 'open' ? 'warning' : ($case->status === 'closed' ? 'success' : 'secondary') }}">
                                        {{ $case->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </x-slot>
    </x-card>

@endsection
