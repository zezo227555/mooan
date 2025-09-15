@extends('layouts.main-body-structer')

@section('content')
    <x-card title="الاعدادات">
        <x-slot name="body">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">الشعار</label>
                        <input type="file" name="logo" class="form-control">
                        @isset($settings['logo'])
                            <img src="{{ asset('uploads/images') }}/{{ $settings['logo'] }}" alt="logo" class="img-fluid" height="107" width="107">
                        @endisset
                    </div>
                </div>
                <button type="submit" role="submit" class="btn btn-primary">حفظ</button>
            </form>
        </x-slot>
    </x-card>
@endsection
