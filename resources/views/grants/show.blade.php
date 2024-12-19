@extends('layouts.tabler-template')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="text-center">Grant Details</h1>
        </div>
        <div class="card-body">
            <h2 class="mb-4">Project Title: {{ $grant->project_title }}</h2>
            <p><strong>Project Leader:</strong> {{ $grant->leader()->name }}</p>
            <p><strong>Provider:</strong> {{ $grant->grant_provider }}</p>
            <p><strong>Amount:</strong> {{ "RM ".$grant->grant_amount }}</p>
            <p><strong>Description:</strong> {{ $grant->project_description }}</p>
            <p><strong>Start Date (YYYY/MM/DD):</strong> {{ $grant->start_date }}</p>
            <p><strong>End Date (YYYY/MM/DD):</strong> {{ $grant->end_date }}</p>
            <p><strong>Duration (months):</strong> {{ $grant->duration }}</p>

            <h3 class="mt-4">Project Members</h3>
            <ul class="list-group">
                @foreach ($members as $member)
                    <li class="list-group-item">{{ $member->name }}</li>
                @endforeach
            </ul>
            <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">Back to Grants</a>
        </div>
    </div>
</div>
@endsection