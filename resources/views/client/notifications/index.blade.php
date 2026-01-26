@extends('layouts.main-body-structer')

@section('content')
    <x-card title="الإشعارات">
        <x-slot name="body">
            @forelse($notifications as $notification)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <strong>{{ $notification->title }}</strong>
                        <div class="text-muted">{{ $notification->message }}</div>
                    </div>

                    @if (!$notification->isRead())
                        <span class="badge bg-warning">جديد</span>
                    @endif
                </div>
            @empty
                <div class="text-muted text-center">
                    لا توجد إشعارات
                </div>
            @endforelse
        </x-slot>
    </x-card>
@endsection
