@extends('layouts.main-body-structer')

@section('page-title')
    الخزينة
@endsection

@section('content')
    {{-- 💰 SUMMARY --}}
    <x-card title="ملخص الخزينة">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-6">
                    <div class="fw-bold fs-3 text-success">
                        {{ number_format($totalPaid, 2) }}
                    </div>
                    <div class="text-muted">إجمالي المقبوض</div>
                </div>

                <div class="col-md-6">
                    <div class="fw-bold fs-3 text-danger">
                        {{ number_format($totalUnpaid, 2) }}
                    </div>
                    <div class="text-muted">إجمالي المستحق</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- ✅ PAID INVOICES --}}
    <x-card title="الإيصالات المدفوعة" class="mt-3">
        <x-slot name="body">
            <table class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>العميل</th>
                        <th>القضية</th>
                        <th>المبلغ</th>
                        <th>تاريخ الإصدار</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paidInvoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->legalCase->client->getFullNameAttribute() }}</td>
                            <td>{{ $invoice->legalCase->title }}</td>
                            <td class="text-success">
                                {{ number_format($invoice->total_amount, 2) }}
                            </td>
                            <td>{{ $invoice->issue_date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                لا توجد إيصالات مدفوعة
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-card>

    {{-- ⏳ UNPAID INVOICES --}}
    <x-card title="الإيصالات غير المدفوعة" class="mt-3">
        <x-slot name="body">
            <table class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>العميل</th>
                        <th>القضية</th>
                        <th>المبلغ</th>
                        <th>تاريخ الاستحقاق</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unpaidInvoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->legalCase->client->getFullNameAttribute() }}</td>
                            <td>{{ $invoice->legalCase->title }}</td>
                            <td class="text-danger">
                                {{ number_format($invoice->total_amount, 2) }}
                            </td>
                            <td>{{ $invoice->due_date ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                لا توجد إيصالات غير مدفوعة
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
