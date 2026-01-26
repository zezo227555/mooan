@extends('layouts.main-body-structer')

@section('page-title')
    قضاياي
@endsection

@section('content')
    <x-card title="قائمة القضايا">
        <x-slot name="body">
            <table class="table table-bordered text-nowrap w-100">
                <thead>
                <tr>
                    <th>رقم القضية</th>
                    <th>العنوان</th>
                    <th>المحكمة</th>
                    <th>الحالة</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cases as $case)
                    <tr>
                        <td>{{ $case->case_number }}</td>
                        <td>{{ $case->title }}</td>
                        <td>{{ $case->courtSpecification?->name ?? '-' }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $case->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            لا توجد قضايا
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
