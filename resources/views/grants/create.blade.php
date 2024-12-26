@extends('layouts.tabler-template')
@section('title', 'Grants')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Create Grant</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('grants.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="grant_amount">Grant Amount (RM)</label>
                    <input type="number" class="form-control" name="grant_amount" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="grant_provider">Grant Provider</label>
                    <input type="text" class="form-control" name="grant_provider" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="project_title">Project Title</label>
                    <input type="text" class="form-control" name="project_title" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="project_description">Project Description</label>
                    <textarea class="form-control" id="project_description" name="project_description" rows="3" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="duration">Duration (months)</label>
                    <input type="number" class="form-control" name="duration" id="duration" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="leader">Project Leader</label>
                    <select class="form-control" id="leader" name="leader" required>
                        <option value="">Select Leader</option>
                        @foreach($academicians as $academician)
                            <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="members">Project Members</label>
                    @foreach($academicians as $academician)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="members[]" id="member{{ $academician->id }}" value="{{ $academician->id }}">
                            <label class="form-check-label" for="member{{ $academician->id }}">
                                {{ $academician->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Grant</button>
            </form>
        </div>
    </div>
    <div class="mt-3">
    <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">Back to Grants</a>
    </div>
</div>

<script>
    document.getElementById('leader').addEventListener('change', function() {
        var leaderId = this.value;
        document.querySelectorAll('input[name="members[]"]').forEach(function(checkbox) {
            if (checkbox.value == leaderId) {
                checkbox.disabled = true;
                checkbox.checked = false;
            } else {
                checkbox.disabled = false;
            }
        });
    });
</script>
<script>
    function calculateDuration() {
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        if (startDate && endDate) {
            var start = new Date(startDate);
            var end = new Date(endDate);
            var duration = (end.getFullYear() - start.getFullYear()) * 12 + (end.getMonth() - start.getMonth());
            var days = (end - start) / (1000 * 60 * 60 * 24);
            var durationInMonths = duration + (days % 30) / 30;
            document.getElementById('duration').value = durationInMonths.toFixed(2);
        } else {
            document.getElementById('duration').value = '';
        }
    }

    document.getElementById('start_date').addEventListener('change', calculateDuration);
    document.getElementById('end_date').addEventListener('change', calculateDuration);
</script>
@endsection
