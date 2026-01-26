@extends('layouts.main-body-structer')

@section('page-title')
    قضايا الموظفين
@endsection

@section('page-actions')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-lower">
        اضافة الموظف
    </button>
@endsection

@section('content')
    <x-card title="{{ $legalCase->title }}">
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
                    @foreach ($assignedUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}"
                                    class="btn btn-sm btn-info-transparent btn-b">عرض</a>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-warning-transparent">تعديل</a>
                                <x-delete-form action="{{ route('case-users.destroy', [$legalCase->id, $user->id]) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>

    <x-modal-form id="add-lower" action="{{ route('case-users.store', $legalCase->id) }}" method="POST" title="اضافة محامي"
        size="modal-lg">
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">الموظفين</label>
                <select class="form-control mt-2 p-3" data-trigger name="user_id" id="choices-multiple-groups">
                    @foreach ($allUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">دور الموظف فالقضية</label>
                    <select name="role" data-trigger class="form-control choices-multiple-groups-all">
                        <option value="attorney">Attorney</option>
                        <option value="intern">Intern</option>
                    </select>
                </div>
            </div>
        </div>
    </x-modal-form>
@endsection
