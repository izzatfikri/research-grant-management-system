@extends('layouts.tabler-template')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="text-center">Project Details</h1>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Project Title: {{ $grant->project_title }}</h1>
            <p><strong>Project Leader:</strong> {{ $grant->leader()->name }}</p>
            <p><strong>Provider:</strong> {{ $grant->grant_provider }}</p>
            <p><strong>Amount:</strong> {{ "RM ".$grant->grant_amount }}</p>
            <p><strong>Description:</strong> {{ $grant->project_description }}</p>
            <p><strong>Start Date (YYYY/MM/DD):</strong> {{ $grant->start_date }}</p>
            <p><strong>End Date (YYYY/MM/DD):</strong> {{ $grant->end_date }}</p>
            <p><strong>Duration (months):</strong> {{ $grant->duration }}</p>

            <h2 class="mt-4">Project Members</h2>
            <ul class="list-group">
                @foreach ($members as $member)
                    <li class="list-group-item">{{ $member->name }}</li>
                @endforeach
            </ul>

            <h2 class="mt-4">Milestones</h2>
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;"> 
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Deliverable</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Date Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse($milestones as $index => $milestone)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    <td>{{ $milestone->updated_at }}</td>
                    @can('isAcademician', App\Models\User::class)
                    @endcan
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No data found</td>
                </tr>
                @endforelse
            </table>
        </div>

        <!-- Add milestone button -->

            <a href="{{ route('projects.index') }}" class="btn btn-primary mt-4">Back to Projects</a>
        </div>
    </div>
</div>
@endsection
