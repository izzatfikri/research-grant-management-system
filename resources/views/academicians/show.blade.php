<!DOCTYPE html>
<html>
<head>
    <title>Academician Details</title>
</head>
<body>
    <h1>{{ $academician->name }}</h1>
    <p>Staff Number: {{ $academician->staff_number }}</p>
    <p>Email: {{ $academician->email }}</p>
    <p>College: {{ $academician->college }}</p>
    <p>Department: {{ $academician->department }}</p>
    <p>Position: {{ $academician->position }}</p>
</body>
</html>