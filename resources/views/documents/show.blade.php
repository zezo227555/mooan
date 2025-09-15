@extends('layouts.main-body-structer')

@section('content')
    <x-card title="{{ $document->title }}">
        <x-slot name="body">
            <p><strong>الوصف:</strong></p>
            <p>{{ $document->description ?? 'No description provided.' }}</p>

            <p><strong>القضية ذات الصلة:</strong>
                @if ($document->case)
                    <a href="{{ route('legal-cases.show', $document->case->id) }}">
                        القضية #{{ $document->case->id }} - {{ $document->case->title }}
                    </a>
                @else
                    <span class="text-muted">لم يتم تعيين قضية</span>
                @endif
            </p>

            <p><strong>تاريخ التحميل:</strong> {{ $document->created_at->format('Y-m-d H:i') }}</p>

            <p><strong>الملف:</strong></p>
            @if ($document->file_path)
                <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-primary" target="_blank">
                    عرض الملف
                </a>
            @else
                <span class="text-muted">لا يوجد ملف</span>
            @endif
        </x-slot>
        <x-slot name="footer">
            <a href="{{ route('documents.index', $document->case->id) }}" class="btn btn-secondary">عوده للقائمة الرئيسية</a>
            <form action="{{ route('documents.destroy', [$document->case->id, $document->id]) }}" method="POST"
                class="delete-form d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger delete-button">حذف</button>
            </form>
        </x-slot>
    </x-card>
@endsection
