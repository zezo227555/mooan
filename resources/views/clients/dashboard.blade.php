@extends('layouts.client')

@section('content')
    <x-card title="قضاياي">
        <x-slot name="body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>رقم القضية</th>
                        <th>العنوان</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $case)
                        <tr>
                            <td>{{ $case->case_number }}</td>
                            <td>{{ $case->title }}</td>
                            <td>{{ $case->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-card>
@endsection
