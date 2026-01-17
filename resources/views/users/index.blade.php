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
                        <th>البريد الإلكتروني</th>
                        <th>الدور</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                    {{ $user->is_active ? 'نشط' : 'معطل' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}"
                                    class="btn btn-sm btn-primary-transparent">عرض</a>

                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-warning-transparent">تعديل</a>

                                <x-delete-form action="{{ route('users.destroy', $user->id) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                + إضافة مستخدم
            </a>
        </x-slot>
    </x-card>
@endsection
