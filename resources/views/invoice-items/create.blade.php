@extends('layouts.main-body-structer')

@section('page-title')
    إضافة بند فاتورة
@endsection

@section('content')
    <x-card title="إضافة بند جديد للفاتورة">
        <x-slot name="body">

            {{-- Context --}}
            <div class="mb-3">
                <strong>القضية:</strong>
                {{ $invoice->legalCase->title }} —
                {{ $invoice->legalCase->case_number }}
                <br>
                <strong>رقم الفاتورة:</strong>
                {{ $invoice->invoice_number }}
            </div>

            <form method="POST" action="{{ route('invoice-items.store', $invoice->id) }}">
                @csrf

                <div class="row">

                    {{-- Description --}}
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" placeholder="وصف البند" style="height:80px;" required>{{ old('description') }}</textarea>
                            <label>وصف البند</label>
                        </div>
                    </div>

                    {{-- Quantity --}}
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="number" name="quantity" step="0.01" min="0.01" class="form-control"
                                value="{{ old('quantity', 1) }}" required>
                            <label>الكمية</label>
                        </div>
                    </div>

                    {{-- Unit Price --}}
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="number" name="unit_price" step="0.01" min="0" class="form-control"
                                value="{{ old('unit_price') }}" required>
                            <label>سعر الوحدة</label>
                        </div>
                    </div>

                    {{-- Total (readonly hint) --}}
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="يتم الحساب تلقائياً" disabled>
                            <label>الإجمالي</label>
                        </div>
                    </div>

                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-success">
                        حفظ البند
                    </button>

                    <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-light">
                        إلغاء
                    </a>
                </div>

            </form>

        </x-slot>
    </x-card>
@endsection
