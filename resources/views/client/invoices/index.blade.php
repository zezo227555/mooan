@extends('layouts.main-body-structer')

@section('page-title')
    الفواتير
@endsection

@section('content')
    <x-card title="الفواتير">
        <x-slot name="body">
            <table class="table table-bordered text-nowrap w-100">
                <thead>
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>القضية</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                    <th>تاريخ الإصدار</th>
                </tr>
                </thead>
                <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->legalCase->title }}</td>
                        <td>{{ number_format($invoice->total_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-{{
                                $invoice->status === 'paid' ? 'success' : 'warning'
                            }}">
                                {{ $invoice->status }}
                            </span>
                        </td>
                        <td>{{ $invoice->issue_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            لا توجد فواتير
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
