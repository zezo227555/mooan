@extends('layouts.main-body-structer')

@section('page-title')
    إنشاء فاتورة
@endsection

@section('content')
    <x-card title="إنشاء فاتورة جديدة">
        <x-slot name="body">

            <div class="mb-3">
                <strong>القضية:</strong>
                <div>{{ $legalCase->title }} ({{ $legalCase->case_number }})</div>
            </div>

            <form action="{{ route('legal-cases.invoices.store', $legalCase->id) }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="issue_date" class="form-control" required>
                            <label>تاريخ الإصدار</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" name="due_date" class="form-control">
                            <label>تاريخ الاستحقاق</label>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary">إنشاء الفاتورة</button>
                <a href="{{ route('legal-cases.show', $legalCase->id) }}" class="btn btn-light">
                    إلغاء
                </a>
            </form>

        </x-slot>
    </x-card>
@endsection
