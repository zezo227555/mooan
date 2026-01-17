@extends('layouts.main-body-structer')

@section('page-title')
    العملاء
@endsection

@section('content')
    <x-card title="قائمة العملاء">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th>رقم الهاتف</th>
                        <th>البريد</th>
                        <th>اجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->getFullNameAttribute() }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info-transparent btn-b">عرض</a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning-transparent">تعديل</a>
                                <x-delete-form action="{{ route('clients.destroy', $client->id) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
