@extends('layouts.main-body-structer')

@section('page-title')
    لوحة تحكم الإدارة
@endsection

@section('content')
    {{-- 🔢 KPI CARDS --}}
    <x-card title="مؤشرات عامة">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['users'] }}</div>
                    <div class="text-muted">المستخدمين</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['clients'] }}</div>
                    <div class="text-muted">العملاء</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['cases'] }}</div>
                    <div class="text-muted">القضايا</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['invoices'] }}</div>
                    <div class="text-muted">الفواتير</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- 📊 CHARTS --}}
    <div class="row mt-3">

        {{-- Cases by Status --}}
        <div class="col-md-6">
            <x-card title="حالة القضايا">
                <x-slot name="body">
                    <canvas id="casesStatusChart"></canvas>
                </x-slot>
            </x-card>
        </div>

        {{-- Invoices by Status --}}
        <div class="col-md-6">
            <x-card title="حالة الفواتير">
                <x-slot name="body">
                    <canvas id="invoicesStatusChart"></canvas>
                </x-slot>
            </x-card>
        </div>

    </div>

    <div class="row mt-3">

        {{-- New Cases --}}
        <div class="col-md-6">
            <x-card title="القضايا الجديدة (آخر 30 يوم)">
                <x-slot name="body">
                    <canvas id="casesTrendChart"></canvas>
                </x-slot>
            </x-card>
        </div>

        {{-- Time Logged --}}
        <div class="col-md-6">
            <x-card title="الوقت المسجل (آخر 7 أيام)">
                <x-slot name="body">
                    <canvas id="timeChart"></canvas>
                </x-slot>
            </x-card>
        </div>

    </div>

    {{-- 🎯 CTAs --}}
    <x-card class="mt-3">
        <x-slot name="body">
            <div class="d-flex gap-2">
                <a href="{{ route('legal-cases.create') }}" class="btn btn-primary">
                    + فتح قضية
                </a>
                <a href="{{ route('court-specifications.index') }}" class="btn btn-outline-secondary">
                    إدارة المحاكم
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    إدارة المستخدمين
                </a>
            </div>
        </x-slot>
    </x-card>
@endsection

@section('scripts')
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Dashboard Charts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 🟢 Cases by Status
            new Chart(document.getElementById('casesStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: @json($charts['cases_by_status']->keys()),
                    datasets: [{
                        data: @json($charts['cases_by_status']->values()),
                    }]
                }
            });

            // 🟡 Invoices by Status
            new Chart(document.getElementById('invoicesStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: @json($charts['invoices_by_status']->keys()),
                    datasets: [{
                        data: @json($charts['invoices_by_status']->values()),
                    }]
                }
            });

            // 🔵 New Cases (Last 30 Days)
            new Chart(document.getElementById('casesTrendChart'), {
                type: 'line',
                data: {
                    labels: @json($charts['cases_last_30_days']->keys()),
                    datasets: [{
                        label: 'عدد القضايا',
                        data: @json($charts['cases_last_30_days']->values()),
                        tension: 0.3,
                        fill: false
                    }]
                }
            });

            // 🟣 Time Logged (Last 7 Days)
            new Chart(document.getElementById('timeChart'), {
                type: 'bar',
                data: {
                    labels: @json($charts['time_last_7_days']->keys()),
                    datasets: [{
                        label: 'الدقائق المسجلة',
                        data: @json($charts['time_last_7_days']->values()),
                    }]
                }
            });

        });
    </script>
@endsection
