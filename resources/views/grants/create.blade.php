@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Grant Details</h2>
    <form action="{{ route('grants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Grant Amount</label>
            <input type="number" class="form-control" name="grant_amount" required>
        </div>
        <div class="form-group">
            <label>Grant Provider</label>
            <input type="text" class="form-control" name="grant_provider" required>
        </div>
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" class="form-control" name="project_title" required>
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea class="form-control" id="description" name="project_description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="start_date" required>
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" name="end_date" required>
        </div>
        <div class="form-group">
            <label>Duration</label>
            <input type="number" class="form-control" name="duration" required>
        </div>
        <div class="form-group">
            <label for="leader">Project Leader</label>
            <select class="form-control" id="leader" name="leader" required>
                <option value="">Select Leader</option>
                @foreach($academicians as $academician)
                    <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Project Members</label>
            @foreach($academicians as $academician)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="members[]" id="member{{ $academician->id }}" value="{{ $academician->id }}">
                    <label class="form-check-label" for="member{{ $academician->id }}">
                        {{ $academician->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
@endsection