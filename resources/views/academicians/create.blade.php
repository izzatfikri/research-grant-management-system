@extends('layouts.tabler-template')
@section('title', 'Academicians')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Create Academician</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('academicians.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="staff_number">Staff Number</label>
                    <input type="text" class="form-control" name="staff_number" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="college">College</label>
                    <select class="form-control" name="college" required>
                        <option value="">Select College</option>
                        <option value="College of Engineering (COE)">College of Engineering (COE)</option>
                        <option value="UNITEN Business School (UBS)">UNITEN Business School (UBS)</option>
                        <option value="College of Computing & Informatics (CCI)">College of Computing & Informatics (CCI)</option>
                        <option value="College of Continuing Education (CCEd)">College of Continuing Education (CCEd)</option>
                        <option value="College of Graduate Studies (COGS)">College of Graduate Studies (COGS)</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                <label class="form-label" for="department">Department</label>
                <select class="form-control" name="department" id="department" required>
                    <option value="">Select Department</option>
                    <option value="Department of Civil Engineering (COE)">Department of Civil Engineering (COE)</option>
                    <option value="Department of Electrical & Electronics Engineering (COE)">Department of Electrical & Electronics Engineering (COE)</option>
                    <option value="Department of Mechanical Engineering">Department of Mechanical Engineering (COE)</option>
                    <option value="Department of Engineering Foundation and General Studies (COE)">Department of Engineering Foundation and General Studies (COE)</option>
                    <option value="Department of Accounting and Economic (UBS)">Department of Accounting and Economic (UBS)</option>
                    <option value="Department of Accounting and Finance (UBS)">Department of Accounting and Finance (UBS)</option>
                    <option value="Department of Management (UBS)">Department of Management (UBS)</option>
                    <option value="Department of Business and Management (UBS)">Department of Business and Management (UBS)</option>
                    <option value="Department of Computing (CCI)">Department of Computing (CCI)</option>
                    <option value="Department of Informatics (CCI)">Department of Informatics (CCI)</option>
                    <option value="Department of Computing Foundation and Diploma Studies (CCI)">Department of Computing Foundation and Diploma Studies (CCI)</option>
                    <option value="Department of Social Sciences and Humanities (CCEd)">Department of Social Sciences and Humanities (CCEd)</option>
                    <option value="Department of Languages and Communication (CCEd)">Department of Languages and Communication (CCEd)</option>
                    <option value="Department of Lifelong Learning (CCEd)">Department of Lifelong Learning (CCEd)</option>
                    <option value="Department of APEL (CCEd)">Department of APEL (CCEd)</option>
                    <option value="Department of Graduate Studies (COGS)">Department of Graduate Studies (COGS)</option>
                </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="position">Position</label>
                    <select class="form-control" name="position" id="position" required>
                        <option value="">Select Position</option>
                        <option value="Professor">Professor</option>
                        <option value="Assoc Prof.">Assoc Prof.</option>
                        <option value="Senior Lecturer">Senior Lecturer</option>
                        <option value="Lecturer">Lecturer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Academician</button>
            </form>
        </div>
    </div>
</div>
@endsection
