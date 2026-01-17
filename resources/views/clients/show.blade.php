@extends('layouts.main-body-structer')

@section('page-title')
    تفاصيل العميل
@endsection

@section('content')

    {{-- 🧍 Client Information --}}
    <x-card title="معلومات العميل">
        <x-slot name="body">
            <div class="row">

                <div class="col-md-4">
                    <strong>الاسم:</strong>
                    <div>{{ $client->getFullNameAttribute() }}</div>
                </div>

                <div class="col-md-4">
                    <strong>البريد الإلكتروني:</strong>
                    <div>{{ $client->email ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <strong>رقم الهاتف:</strong>
                    <div>{{ $client->phone ?? '-' }}</div>
                </div>

                <div class="col-md-12 mt-2">
                    <strong>العنوان:</strong>
                    <div>{{ $client->address ?? '-' }}</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- 📂 Client Legal Cases --}}
    <x-card title="قضايا العميل" class="mt-3">
        <x-slot name="body">

            @if ($client->cases->isEmpty())
                <div class="text-center text-muted">
                    لا توجد قضايا مسجلة لهذا العميل
                </div>
            @else
                <table class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>رقم القضية</th>
                            <th>العنوان</th>
                            <th>الحالة</th>
                            <th>المحكمة</th>
                            <th>إجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client->cases as $case)
                            <tr>
                                <td>{{ $case->case_number }}</td>
                                <td>{{ $case->title }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $case->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $case->courtSpecification?->name ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('legal-cases.show', $case->id) }}"
                                        class="btn btn-sm btn-primary-transparent">
                                        عرض القضية
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">
                تعديل بيانات العميل
            </a>

            <a href="{{ route('clients.index') }}" class="btn btn-light">
                رجوع
            </a>
        </x-slot>
    </x-card>

@endsection
