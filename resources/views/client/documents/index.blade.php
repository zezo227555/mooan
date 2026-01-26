@extends('layouts.main-body-structer')

@section('page-title')
    المستندات
@endsection

@section('content')
    <x-card title="المستندات الخاصة بي">
        <x-slot name="body">
            <table class="table table-bordered text-nowrap w-100">
                <thead>
                <tr>
                    <th>العنوان</th>
                    <th>القضية</th>
                    <th>النوع</th>
                    <th>تحميل</th>
                </tr>
                </thead>
                <tbody>
                @forelse($documents as $doc)
                    <tr>
                        <td>{{ $doc->title }}</td>
                        <td>{{ $doc->Case->title }}</td>
                        <td>{{ $doc->mime_type ?? '-' }}</td>
                        <td>
                            <a href="{{ asset($doc->file_path) }}"
                               class="btn btn-sm btn-primary"
                               target="_blank">
                                تحميل
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            لا توجد مستندات
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
