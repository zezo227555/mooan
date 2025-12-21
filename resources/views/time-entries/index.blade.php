@extends('layouts.main-body-structer')

@section('page-title')
    سجلات الوقت
@endsection

@section('content')
    <x-card title="قائمة سجلات الوقت - {{ $legalCase->title }}">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المستخدم</th>
                        <th>التاريخ</th>
                        <th>المدة</th>
                        <th>الوصف</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $entry->user->name ?? '—' }}</td>
                            <td>{{ $entry->work_date->format('Y-m-d') }}</td>
                            <td>{{ $entry->duration_minutes }} دقيقة ({{ $entry->duration_hours }} ساعة)</td>
                            <td>{{ \Illuminate\Support\Str::limit($entry->description, 50) }}</td>
                            <td>
                                <a href="{{ route('time-entries.edit', [$legalCase->id, $entry->id]) }}"
                                    class="btn btn-sm btn-warning-transparent">تعديل</a>

                                <x-delete-form action="{{ route('time-entries.destroy', [$legalCase->id, $entry->id]) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('legal-cases.show', $legalCase->id) }}" class="btn btn-secondary">
                ← العودة إلى القضية
            </a>
            <a href="{{ route('time-entries.create', $legalCase->id) }}" class="btn btn-primary">
                + إضافة سجل وقت
            </a>
        </x-slot>
    </x-card>
@endsection
