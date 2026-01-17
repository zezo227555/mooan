@extends('layouts.main-body-structer')

@section('page-title')
    لوحة الاستقبال
@endsection

@section('content')
    {{-- 🔢 KPI CARDS --}}
    <x-card title="مؤشرات الاستقبال">
        <x-slot name="body">
            <div class="row text-center">

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['clients'] }}</div>
                    <div class="text-muted">إجمالي العملاء</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['total_cases'] }}</div>
                    <div class="text-muted">إجمالي القضايا</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['open_cases'] }}</div>
                    <div class="text-muted">قضايا مفتوحة</div>
                </div>

                <div class="col-md-3">
                    <div class="fw-bold fs-3">{{ $stats['cases_today'] }}</div>
                    <div class="text-muted">قضايا اليوم</div>
                </div>

            </div>
        </x-slot>
    </x-card>

    {{-- 📊 CHARTS --}}
    <div class="row mt-3">

        {{-- New Clients --}}
        <div class="col-md-6">
            <x-card title="عملاء جدد (آخر 30 يوم)">
                <x-slot name="body">
                    <canvas id="clientsChart"></canvas>
                </x-slot>
            </x-card>
        </div>

        {{-- New Cases --}}
        <div class="col-md-6">
            <x-card title="قضايا جديدة (آخر 30 يوم)">
                <x-slot name="body">
                    <canvas id="casesChart"></canvas>
                </x-slot>
            </x-card>
        </div>

    </div>

    {{-- 🎯 CTAs --}}
    <x-card class="mt-3">
        <x-slot name="body">
            <div class="d-flex gap-2">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">
                    + إضافة عميل
                </a>

                <a href="{{ route('legal-cases.create') }}" class="btn btn-outline-secondary">
                    + فتح قضية
                </a>

                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
                    قائمة العملاء
                </a>
            </div>
        </x-slot>
    </x-card>
@endsection

@section('scripts')
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 🟢 New Clients (Last 30 Days)
            new Chart(document.getElementById('clientsChart'), {
                type: 'line',
                data: {
                    labels: @json($charts['clients_last_30_days']->keys()),
                    datasets: [{
                        label: 'عدد العملاء',
                        data: @json($charts['clients_last_30_days']->values()),
                        tension: 0.3,
                        fill: false
                    }]
                }
            });

            // 🔵 New Cases (Last 30 Days)
            new Chart(document.getElementById('casesChart'), {
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

        });
    </script>
@endsection
