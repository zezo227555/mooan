@extends('layouts.main-body-structer')

@section('page-title')
    القضايا
@endsection

@section('content')
    <x-card title="قائمة القضايا">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>العميل</th>
                        <th>العنوان</th>
                        <th>رقم القضية</th>
                        <th>الحالة</th>
                        <th>اجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $case)
                        <tr>
                            <td>{{ $case->client->getFullNameAttribute() }}</td>
                            <td>{{ $case->title }}</td>
                            <td>{{ $case->case_number }}</td>
                            <td>{{ $case->status }}</td>
                            <td>
                                <a href="{{ route('documents.index', $case->id) }}" class="btn btn-sm btn-success-transparent">الوثائق</a>
                                <a href="{{ route('case-users.index', $case->id) }}" class="btn btn-sm btn-info-transparent btn-b">الموظفين</a>
                                <a href="{{ route('case-notes.index', $case->id) }}" class="btn btn-sm btn-secondary-transparent btn-b">الملاحظات</a>
                                <a href="{{ route('legal-cases.edit', $case->id) }}" class="btn btn-sm btn-warning-transparent">تعديل</a>
                                <x-delete-form action="{{ route('legal-cases.destroy', $case->id) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
