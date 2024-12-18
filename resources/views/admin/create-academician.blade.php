<form action="{{ route('admin.createAcademician') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <div>
        <label for="staff_number">Staff Number</label>
        <input type="text" name="staff_number" required>
    </div>

    <div>
        <label for="college">College</label>
        <input type="text" name="college" required>
    </div>

    <div>
        <label for="department">Department</label>
        <input type="text" name="department" required>
    </div>

    <div>
        <label for="position">Position</label>
        <input type="text" name="position" required>
    </div>

    <button type="submit">Create Academician</button>
</form>
