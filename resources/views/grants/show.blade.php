<!DOCTYPE html>
<html>
<head>
    <title>Grant Details</title>
</head>
<body>
    <h1>Grant Details</h1>

    <h2>Project Title: {{ $grant->project_title }}</h2>
    <p><strong>Project Leader:</strong> {{ $grant->leader()->name }}</p>
    <p><strong>Provider:</strong> {{ $grant->grant_provider }}</p>
    <p><strong>Amount:</strong> {{ $grant->grant_amount }}</p>
    <p><strong>Description:</strong> {{ $grant->project_description }}</p>
    <p><strong>Start Date:</strong> {{ $grant->start_date }}</p>
    <p><strong>End Date:</strong> {{ $grant->end_date }}</p>
    <p><strong>Duration:</strong> {{ $grant->duration }}</p>

    <h3>Project Members</h3>
    <ul>
        @foreach ($members as $member)
            <li>{{ $member->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('grants.index') }}">Back to Grants</a>
</body>
</html>