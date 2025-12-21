@extends('layouts.main-body-structer')

@section('page-title')
    المحاكم
@endsection

@section('content')
    <x-card title="إدارة المحاكم">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الكود</th>
                        <th>عدد القضايا</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courts as $court)
                        <tr>
                            <td>{{ $court->name }}</td>
                            <td>{{ $court->code }}</td>
                            <td class="text-center">
                                <span class="badge bg-primary">
                                    {{ $court->legal_cases_count }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $court->active ? 'success' : 'secondary' }}">
                                    {{ $court->active ? 'مفعلة' : 'معطلة' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('court-specifications.show', $court->id) }}"
                                    class="btn btn-sm btn-info-transparent">عرض</a>
                                <a href="{{ route('court-specifications.edit', $court->id) }}"
                                    class="btn btn-sm btn-warning-transparent">تعديل</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('court-specifications.create') }}" class="btn btn-primary">إضافة محكمة</a>
        </x-slot>
    </x-card>
@endsection
