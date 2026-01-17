@extends('layouts.main-body-structer')

@section('page-title')
    عرض الفاتورة
@endsection

@section('content')

    {{-- Invoice Header --}}
    <x-card title="معلومات الفاتورة">
        <x-slot name="body">
            <div class="row">
                <div class="col-md-4">
                    <strong>رقم الفاتورة:</strong>
                    <div>{{ $invoice->invoice_number }}</div>
                </div>

                <div class="col-md-4">
                    <strong>تاريخ الإصدار:</strong>
                    <div>{{ $invoice->issue_date }}</div>
                </div>

                <div class="col-md-4">
                    <strong>الحالة:</strong>
                    <span class="badge bg-info">
                        {{ __('billing.status.' . $invoice->status) }}
                    </span>
                </div>
            </div>
        </x-slot>
    </x-card>

    {{-- Case & Client --}}
    <x-card title="بيانات القضية والعميل" class="mt-3">
        <x-slot name="body">
            <div class="row">
                <div class="col-md-6">
                    <strong>القضية:</strong>
                    <div>{{ $invoice->legalCase->title }}</div>
                </div>

                <div class="col-md-6">
                    <strong>العميل:</strong>
                    <div>{{ $invoice->legalCase->client->getFullNameAttribute() }}</div>
                </div>
            </div>
        </x-slot>
    </x-card>

    {{-- Invoice Items --}}
    <x-card title="بنود الفاتورة" class="mt-3">
        <x-slot name="body">

            @if ($invoice->items->isEmpty())
                <div class="text-muted text-center">
                    لا توجد بنود مضافة لهذه الفاتورة
                </div>
            @else
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>الوصف</th>
                            <th>الكمية</th>
                            <th>سعر الوحدة</th>
                            <th>الإجمالي</th>
                            <th>اجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $item)
                            <tr>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->unit_price, 2) }}</td>
                                <td>{{ number_format($item->total_amount, 2) }}</td>
                                <td>
                                    <x-delete-form action="{{ route('invoice-items.destroy', $item->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </x-slot>
    </x-card>

    {{-- Invoice Total --}}
    <x-card title="الإجمالي" class="mt-3">
        <x-slot name="body">
            <h4>{{ number_format($invoice->total_amount, 2) }}</h4>
        </x-slot>
    </x-card>

    {{-- Actions --}}
    <x-card class="mt-3">
        <x-slot name="footer">
            <a href="{{ route('legal-cases.show', $invoice->legalCase->id) }}" class="btn btn-light">
                رجوع للقضية
            </a>

            {{-- Next step buttons will go here --}}
        </x-slot>
    </x-card>

@endsection
