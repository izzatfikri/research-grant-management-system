@extends('layouts.tabler-template')
@section('title', 'Edit Grant')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Edit Grant</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('grants.update', $grant->id) }}">
                @method('PUT')
                @csrf
                @can('staffAdmin', App\Models\User::class)
                <div class="form-group mb-3">
                    <label class="form-label" for="grant_amount">Grant Amount</label>
                    <input type="number" class="form-control" name="grant_amount" value="{{ $grant->grant_amount }}">
                </div> 
                <div class="form-group mb-3">
                    <label class="form-label" for="grant_provider">Grant Provider</label>
                    <input type="text" class="form-control" name="grant_provider" value="{{ $grant->grant_provider }}">
                </div> 
                <div class="form-group mb-3">
                    <label class="form-label" for="project_title">Project Title</label>
                    <input type="text" class="form-control" name="project_title" value="{{ $grant->project_title }}">
                </div> 
                <div class="form-group mb-3">
                    <label class="form-label" for="project_description">Project Description</label>
                    <input type="text" class="form-control" name="project_description" value="{{ $grant->project_description }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $grant->start_date }}">
                </div> 
                <div class="form-group mb-3">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $grant->end_date }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="duration">Duration (in months)</label>
                    <input type="number" class="form-control" name="duration" id="duration" value="{{ $grant->duration }}" readonly>
                </div>
                @endcan
                <div class="form-group mb-3">
                    <label class="form-label" for="members">Project Members</label>
                    <div>
                        @foreach($allAcademicians as $academician)
                            @php
                                $isLeader = $grant->academicians()
                                                    ->wherePivot('role', 'leader')
                                                    ->where('academician_id', $academician->id)
                                                    ->exists();
                            @endphp
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="members[]" 
                                    value="{{ $academician->id }}" 
                                    @if($members->contains($academician->id)) checked @endif
                                    @if($isLeader) disabled @endif>
                                <label class="form-check-label">
                                    {{ $academician->name }} @if($isLeader) (Leader) @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
    <div class="mt-3">
    <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">Back to Grants</a>
    </div>
</div>
<script>
    document.getElementById('start_date').addEventListener('change', calculateDuration);
    document.getElementById('end_date').addEventListener('change', calculateDuration);
    document.querySelector('form').addEventListener('submit', function(e) {
        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
            if (!checkbox.checked) {
                checkbox.closest('.form-check').querySelector('input[type="hidden"]').remove();
            }
        });
    });
    function calculateDuration() {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);

        if (startDate && endDate && endDate > startDate) {
            const yearDiff = endDate.getFullYear() - startDate.getFullYear();
            const monthDiff = endDate.getMonth() - startDate.getMonth();
            const dayDiff = endDate.getDate() - startDate.getDate();

            let duration = yearDiff * 12 + monthDiff;
            if (dayDiff !== 0) {
                duration += dayDiff / 30; // Approximate days to fraction of a month
            }

            document.getElementById('duration').value = duration.toFixed(2); // Display with two decimal places
        } else {
            document.getElementById('duration').value = 0;
        }
    }
</script>
@endsection