@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Header --}}
        <div class="mb-4">
            <h2>
                تعديل سجل وقت
                <small class="text-muted">– {{ $legalCase->title }}</small>
            </h2>
        </div>

        {{-- Form --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('time-entries.update', [$legalCase->id, $entry->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Date --}}
                    <div class="mb-3">
                        <label class="form-label">التاريخ</label>
                        <input type="date" name="work_date" class="form-control @error('work_date') is-invalid @enderror"
                            value="{{ old('work_date', $entry->work_date->toDateString()) }}">
                        @error('work_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Duration --}}
                    <div class="mb-3">
                        <label class="form-label">المدة (بالدقائق)</label>
                        <input type="number" name="duration_minutes"
                            class="form-control @error('duration_minutes') is-invalid @enderror" min="1"
                            value="{{ old('duration_minutes', $entry->duration_minutes) }}">
                        @error('duration_minutes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $entry->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('time-entries.index', $legalCase->id) }}" class="btn btn-secondary">
                            إلغاء
                        </a>

                        <button type="submit" class="btn btn-success">
                            تحديث
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
