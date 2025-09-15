@extends('layouts.main-body-structer')

@section('page-title')
    الوثائق
@endsection

@section('page-actions')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-document">
        اضافة وثيقة
    </button>
@endsection

@section('content')
    <x-card title="{{ $legalCase->title }}">
        <x-slot name="body">
            <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>الملف</th>
                        <th>تاريخ الانشاء</th>
                        <th>اجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->description }}</td>
                            <td>
                                <a href="{{ asset("storage/$document->file_path") }}"
                                    class="btn btn-sm btn-secondary-transparent">تحميل <i
                                        class="bi bi-file-arrow-down-fill"></i></a>
                            </td>
                            <td>{{ $document->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('documents.show', [$legalCase->id, $document->id]) }}"
                                    class="btn btn-sm btn-info-transparent btn-b">عرض</a>
                                <x-delete-form action="{{ route('documents.destroy', [$legalCase->id, $document->id]) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>

    <x-modal-form id="add-document" action="{{ route('documents.store', $legalCase->id) }}" method="POST"
        title="اضافة محامي" size="modal-lg">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-lable">العنوان</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-lable">الملف</label>
                <input type="file" name="file" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-lable">الوصف</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
    </x-modal-form>
@endsection
