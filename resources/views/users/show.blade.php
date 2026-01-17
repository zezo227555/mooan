@extends('layouts.main-body-structer')

@section('page-title')
    تفاصيل المستخدم
@endsection

@section('content')
    <x-card title="معلومات المستخدم">
        <x-slot name="body">
            <div class="row">
                <div class="col-md-4">
                    <strong>الاسم:</strong>
                    <div>{{ $user->name }}</div>
                </div>

                <div class="col-md-4">
                    <strong>البريد الإلكتروني:</strong>
                    <div>{{ $user->email }}</div>
                </div>

                <div class="col-md-4">
                    <strong>الدور:</strong>
                    <span class="badge bg-info">{{ $user->role }}</span>
                </div>

                <div class="col-md-4 mt-2">
                    <strong>رقم الهاتف:</strong>
                    <div>{{ $user->phone ?? '-' }}</div>
                </div>

                <div class="col-md-4 mt-2">
                    <strong>الحالة:</strong>
                    <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                        {{ $user->is_active ? 'نشط' : 'معطل' }}
                    </span>
                </div>

                <div class="col-md-4 mt-2">
                    <strong>آخر تسجيل دخول:</strong>
                    <div>{{ $user->last_login_at?->format('Y-m-d H:i') ?? '-' }}</div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                تعديل
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-light">
                رجوع
            </a>
        </x-slot>
    </x-card>
@endsection
