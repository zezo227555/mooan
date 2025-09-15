@extends('layouts.main-body-structer')

@section('page-title')
    الملاحظات
@endsection

@section('page-actions')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-note">
        اضافة ملاحظة
    </button>
@endsection

@section('content')
    <x-card title="قائمة الملاحظات">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>المحتوى</th>
                        <th>الموظف</th>
                        <th>التاريخ</th>
                        <th>اجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->body }}</td>
                            <td>{{ $note->user->name }}</td>
                            <td>{{ $note->created_at->format('Y-m-d') }}</td>
                            <td>
                                {{-- <a href="{{ route('case-notes.show', $note->id) }}" class="btn btn-sm btn-info-transparent btn-b">عرض</a> --}}
                                <a href="{{ route('case-notes.edit', [$legalCase->id, $note->id]) }}"
                                    class="btn btn-sm btn-warning-transparent">تعديل</a>
                                <x-delete-form action="{{ route('case-notes.destroy', [$legalCase->id, $note->id]) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>

    <x-modal-form id="add-note" action="{{ route('case-notes.store', $legalCase->id) }}" method="POST"
        title="اضافة ملاحظة" size="modal-lg">
        <div class="mb-2">
            <label class="form-lable">العنوان</label>
            <input name="title" class="form-control mt-2"></input>
        </div>
        <div class="mb-2">
            <label class="form-lable">الملاحظة</label>
            <textarea name="body" class="form-control mt-2 p-2" rows="7"></textarea>
        </div>
    </x-modal-form>
@endsection
