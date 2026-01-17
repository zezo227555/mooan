@extends('layouts.main-body-structer')

@section('page-title')
    تفاصيل القضية
@endsection

@section('content')
    <div class="container">

        {{-- 🔹 Quick Stats --}}
        <x-card title="ملخص سريع">
            <x-slot name="body">
                <div class="row text-center">

                    <div class="col-md-3">
                        <div class="fw-bold fs-5">{{ $stats['documents'] }}</div>
                        <div class="text-muted">الوثائق</div>
                    </div>

                    <div class="col-md-3">
                        <div class="fw-bold fs-5">{{ $stats['notes'] }}</div>
                        <div class="text-muted">الملاحظات</div>
                    </div>

                    <div class="col-md-3">
                        <div class="fw-bold fs-5">{{ $stats['team'] }}</div>
                        <div class="text-muted">فريق القضية</div>
                    </div>

                    <div class="col-md-3">
                        <div class="fw-bold fs-5">
                            {{ floor($stats['total_time'] / 60) }} س
                            {{ $stats['total_time'] % 60 }} د
                        </div>
                        <div class="text-muted">إجمالي الوقت</div>
                    </div>

                </div>
            </x-slot>
        </x-card>


        {{-- Case Details --}}
        <x-card title="معلومات القضية">
            <x-slot name="body">
                <p><strong>العميل:</strong> {{ $legalCase->client->getFullNameAttribute() ?? '—' }}</p>
                <p><strong>العنوان:</strong> {{ $legalCase->title }}</p>
                <p><strong>رقم القضية:</strong> {{ $legalCase->case_number }}</p>
                <p>
                    <strong>الحالة:</strong>
                    @php
                        $statusClasses = [
                            'open' => 'badge bg-success',
                            'in_progress' => 'badge bg-warning',
                            'closed' => 'badge bg-danger',
                        ];
                    @endphp
                    <span class="{{ $statusClasses[$legalCase->status] ?? 'badge bg-secondary' }}">
                        {{ $legalCase->status }}
                    </span>
                </p>
                @if ($legalCase->description)
                    <hr>
                    <p><strong>الوصف:</strong></p>
                    <p class="text-muted">{{ $legalCase->description }}</p>
                @endif

            </x-slot>

            <x-slot name="footer">
                <a href="{{ route('legal-cases.index') }}" class="btn btn-secondary">← العودة للقائمة</a>
                <a href="{{ route('legal-cases.edit', $legalCase->id) }}" class="btn btn-warning">تعديل القضية</a>
            </x-slot>
        </x-card>

        {{-- 2️⃣ Court & Status --}}
        <x-card title="المحكمة والحالة" class="mt-3">
            <x-slot name="body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>المحكمة المختصة:</strong><br>
                        <span class="badge bg-info">
                            {{ $legalCase->courtSpecification->name ?? 'غير محدد' }}
                        </span>
                    </div>
                </div>
            </x-slot>
        </x-card>

        {{-- Time Summary --}}
        <x-card title="ملخص الوقت" class="mt-4">
            <x-slot name="body">
                <p><strong>إجمالي الوقت المسجل:</strong> {{ $legalCase->total_minutes }} دقيقة</p>
                <p class="text-muted">ما يعادل {{ $legalCase->total_hours }} ساعة</p>
            </x-slot>

            <x-slot name="footer">
                <a href="{{ route('time-entries.index', $legalCase->id) }}" class="btn btn-outline-primary btn-sm">
                    عرض جميع سجلات الوقت
                </a>
            </x-slot>
        </x-card>

        {{-- 🧾 Invoice Items Overview --}}
        <x-card title="ملخص الفواتير" class="mt-3">
            <x-slot name="body">

                @if ($legalCase->invoices->isEmpty())
                    <div class="text-muted text-center">
                        لا توجد فواتير لهذه القضية
                    </div>
                @else
                    @foreach ($legalCase->invoices as $invoice)
                        <div class="border rounded p-3 mb-3">

                            {{-- Invoice Header --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <strong>فاتورة رقم:</strong> {{ $invoice->invoice_number }} <br>
                                    <small class="text-muted">
                                        {{ $invoice->issue_date }} |
                                        الحالة:
                                        <span class="badge bg-secondary">
                                            {{ $invoice->status }}
                                        </span>
                                    </small>
                                </div>

                                <div>
                                    <strong>{{ number_format($invoice->total_amount, 2) }} د.ل</strong>
                                </div>
                            </div>

                            {{-- Invoice Items --}}
                            @if ($invoice->items->isEmpty())
                                <div class="text-muted">
                                    لا توجد بنود مضافة بعد
                                </div>
                            @else
                                <table class="table table-sm table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>الوصف</th>
                                            <th class="text-center">الكمية</th>
                                            <th class="text-center">سعر الوحدة</th>
                                            <th class="text-center">الإجمالي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoice->items as $item)
                                            <tr>
                                                <td>{{ $item->description }}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-center">
                                                    {{ number_format($item->unit_price, 2) }}
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format($item->total_amount, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            {{-- Invoice Actions --}}
                            <div class="mt-2 d-flex justify-content-end gap-2">

                                {{-- Add Item (Draft Only) --}}
                                @if ($invoice->status === 'draft')
                                    <a href="{{ route('invoice-items.create', $invoice->id) }}"
                                        class="btn btn-sm btn-success">
                                        + إضافة بند
                                    </a>
                                @else
                                    <span class="badge bg-light text-muted align-self-center">
                                        الفاتورة مقفلة
                                    </span>
                                @endif

                                {{-- View Invoice --}}
                                <a href="{{ route('invoices.show', $invoice->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    عرض الفاتورة
                                </a>

                            </div>

                        </div>
                    @endforeach
                @endif

            </x-slot>
        </x-card>


        {{-- Documents --}}
        <x-card title="المستندات" class="mt-4">
            <x-slot name="body">
                @if ($legalCase->documents->count())
                    <ul class="list-group">
                        @foreach ($legalCase->documents as $document)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $document->title }}</span>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('documents.show', [$legalCase->id, $document->id]) }}"
                                        class="btn btn-sm btn-outline-secondary">عرض</a>
                                    <a href="{{ asset("storage/$document->file_path") }}"
                                        class="btn btn-sm btn-secondary-transparent">تحميل <i
                                            class="bi bi-file-arrow-down-fill"></i></a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">لا توجد مستندات مضافة.</p>
                @endif
            </x-slot>

            <x-slot name="footer">
                <a href="{{ route('documents.create', $legalCase->id) }}" class="btn btn-primary btn-sm">+ إضافة مستند</a>
            </x-slot>
        </x-card>

        {{-- Assigned Users --}}
        <x-card title="الفريق المخصص للقضية" class="mt-4">
            <x-slot name="body">
                @if ($legalCase->users->count())
                    <ul class="list-group">
                        @foreach ($legalCase->users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $user->name }}</span>
                                <span class="badge bg-info text-dark">{{ $user->pivot->role }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">لا يوجد موظفين مخصصين لهذه القضية.</p>
                @endif
            </x-slot>

            <x-slot name="footer">
                <a href="{{ route('case-users.index', $legalCase->id) }}" class="btn btn-outline-primary btn-sm">
                    إدارة الفريق
                </a>
            </x-slot>
        </x-card>

        {{-- Case Notes --}}
        <x-card title="الملاحظات" class="mt-4">
            <x-slot name="body">
                @if ($legalCase->notes->count())
                    <ul class="list-group">
                        @foreach ($legalCase->notes as $note)
                            <li class="list-group-item">
                                <strong>{{ $note->user->name ?? '—' }}</strong>
                                <span class="text-muted">({{ $note->created_at->format('Y-m-d') }})</span>
                                <p>{{ $note->content }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">لا توجد ملاحظات لهذه القضية.</p>
                @endif
            </x-slot>

            <x-slot name="footer">
                <a href="{{ route('case-notes.index', $legalCase->id) }}" class="btn btn-outline-primary btn-sm">
                    عرض جميع الملاحظات
                </a>
            </x-slot>
        </x-card>

        {{-- 🔹 Transfer Case to Another Court --}}
        <x-card title="نقل القضية إلى محكمة أخرى" class="mt-3">
            <x-slot name="body">
                <form action="{{ route('legal-cases.transfer', $legalCase->id) }}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- Court Dropdown --}}
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="to_court_id" class="form-select" required>
                                    @foreach ($courts as $court)
                                        @if ($court->id != $legalCase->court_specification_id)
                                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label>اختر المحكمة الجديدة</label>
                            </div>
                        </div>

                        {{-- Optional Reason --}}
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea name="reason" class="form-control" placeholder="سبب النقل (اختياري)" style="height:80px;"></textarea>
                                <label>سبب النقل</label>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">نقل القضية</button>
                </form>
            </x-slot>
        </x-card>

        {{-- 🔹 Transfer History --}}
        <x-card title="سجل نقل القضية" class="mt-3">
            <x-slot name="body">
                @if ($legalCase->transfers->isEmpty())
                    <div class="text-center text-muted">لا يوجد عمليات نقل لهذه القضية</div>
                @else
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th>من المحكمة</th>
                                <th>إلى المحكمة</th>
                                <th>المسؤول</th>
                                <th>السبب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($legalCase->transfers as $transfer)
                                <tr>
                                    <td>{{ $transfer->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $transfer->fromCourt->name }}</td>
                                    <td>{{ $transfer->toCourt->name }}</td>
                                    <td>{{ $transfer->user->name }}</td>
                                    <td>{{ $transfer->reason ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </x-slot>
        </x-card>


    </div>
@endsection
