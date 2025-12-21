@extends('layouts.main-body-structer')

@section('page-title')
    القضايا
@endsection

@section('content')
    <x-card title="قائمة القضايا">
        <x-slot name="body">
            <form method="GET" class="row mb-3">
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="court_specification_id" class="form-select" onchange="this.form.submit()">
                            <option value="">جميع المحاكم</option>
                            @foreach ($courtSpecifications as $court)
                                <option value="{{ $court->id }}" @selected(request('court_specification_id') == $court->id)>
                                    {{ $court->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>المحكمة المختصة</label>
                    </div>
                </div>
            </form>
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العميل</th>
                        <th>العنوان</th>
                        <th>رقم القضية</th>
                        <th>المحكمة</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $case)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $case->client->getFullNameAttribute() }}</td>
                            <td>{{ $case->title }}</td>
                            <td>{{ $case->case_number }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $case->courtSpecification->name ?? 'غير محدد' }}
                                </span>
                            </td>

                            <td>
                                @php
                                    $statusClasses = [
                                        'open' => 'badge bg-success',
                                        'in_progress' => 'badge bg-warning',
                                        'closed' => 'badge bg-danger',
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$case->status] ?? 'badge bg-secondary' }}">
                                    {{ $case->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    {{-- Core actions --}}
                                    <a href="{{ route('legal-cases.show', $case->id) }}"
                                        class="btn btn-sm btn-primary-transparent">عرض</a>
                                    <a href="{{ route('legal-cases.edit', $case->id) }}"
                                        class="btn btn-sm btn-warning-transparent">تعديل</a>
                                    <x-delete-form action="{{ route('legal-cases.destroy', $case->id) }}" />

                                    {{-- Dropdown for related actions --}}
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info-transparent dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            المزيد
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('documents.index', $case->id) }}">الوثائق</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('case-users.index', $case->id) }}">الموظفين</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('case-notes.index', $case->id) }}">الملاحظات</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
