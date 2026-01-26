@extends('layouts.main-body-structer')

@section('page-title')
    لوحة المحامي
@endsection

@section('content')
    {{-- 🔢 KPI CARDS --}}
    <x-card title="مؤشرات عملي">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['assigned_cases'] }}</div>
                    <div class="text-muted">قضاياي</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['open_cases'] }}</div>
                    <div class="text-muted">قضايا مفتوحة</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">
                        {{ floor($stats['total_time'] / 60) }} س
                        {{ $stats['total_time'] % 60 }} د
                    </div>
                    <div class="text-muted">إجمالي الوقت</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['invoices'] }}</div>
                    <div class="text-muted">فواتير مرتبطة</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- 📊 CHARTS --}}
    <div class="row mt-3">

        {{-- Time Logged --}}
        <div class="col-md-6">
            <x-card title="الوقت المسجل (آخر 7 أيام)">
                <x-slot name="body">
                    <canvas id="timeChart"></canvas>
                </x-slot>
            </x-card>
        </div>

        {{-- Cases by Status --}}
        <div class="col-md-6">
            <x-card title="قضاياي حسب الحالة">
                <x-slot name="body">
                    <canvas id="casesStatusChart"></canvas>
                </x-slot>
            </x-card>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 🔵 Time Logged (Last 7 Days)
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

        });
    </script>
@endsection
