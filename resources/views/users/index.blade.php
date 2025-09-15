@extends('layouts.main-body-structer')

@section('page-title')
    المستخدمين
@endsection

@section('content')
    <x-card title="قائمة المستخدمين">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th>رقم الهاتف</th>
                        <th>الصلاحية</th>
                        <th>اجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info-transparent btn-b">عرض</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning-transparent">تعديل</a>
                                <x-delete-form action="{{ route('users.destroy', $user->id) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
