@extends('layouts.main-body-structer')

@section('page-title')
    تعديل مستخدم
@endsection

@section('content')
    <x-card title="تعديل المستخدم">
        <x-slot name="body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            <label>الاسم</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            <label>البريد الإلكتروني</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            <label>رقم الهاتف</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="role" class="form-select">
                                <option value="admin" @selected($user->role === 'admin')>مدير</option>
                                <option value="attorney" @selected($user->role === 'attorney')>محامي</option>
                                <option value="reception" @selected($user->role === 'reception')>استقبال</option>
                            </select>
                            <label>الدور</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                {{ $user->is_active ? 'checked' : '' }}>
                            <label class="form-check-label">نشط</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control"
                                placeholder="كلمة مرور جديدة (اختياري)">
                            <label>كلمة مرور جديدة</label>
                        </div>
                    </div>

                </div>

                <button class="btn btn-warning">تحديث</button>
            </form>
        </x-slot>
    </x-card>
@endsection
