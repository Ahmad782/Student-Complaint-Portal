@extends('layout')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Submit Complaint</h1>
        <p>Fill the form carefully. Your complaint will receive a tracking ID.</p>
    </div>
</section>

<div class="container my-5">
    <div class="lux-card p-4 p-md-5">
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix:</strong>
                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('complaints.store') }}" class="row g-4">
            @csrf
            <div class="col-md-6"><label class="form-label">Student Name</label><input name="student_name" value="{{ old('student_name') }}" class="form-control lux-input" required></div>
            <div class="col-md-6"><label class="form-label">Roll Number</label><input name="roll_no" value="{{ old('roll_no') }}" class="form-control lux-input" required></div>
            <div class="col-md-6"><label class="form-label">Email</label><input name="email" type="email" value="{{ old('email') }}" class="form-control lux-input"></div>
            <div class="col-md-6"><label class="form-label">Phone</label><input name="phone" value="{{ old('phone') }}" class="form-control lux-input"></div>
            <div class="col-md-6"><label class="form-label">Department</label><input name="department" value="{{ old('department') }}" class="form-control lux-input" required></div>
            <div class="col-md-6"><label class="form-label">Semester</label><input name="semester" value="{{ old('semester') }}" class="form-control lux-input"></div>
            <div class="col-md-6"><label class="form-label">Category</label><select name="category" class="form-select lux-input" required><option value="">Select Category</option><option>Academic Issue</option><option>Faculty Conduct</option><option>Campus Facility</option><option>Administration</option><option>Other</option></select></div>
            <div class="col-md-6"><label class="form-label">Priority</label><select name="priority" class="form-select lux-input" required><option>Normal</option><option>High</option><option>Urgent</option></select></div>
            <div class="col-12"><label class="form-label">Subject</label><input name="subject" value="{{ old('subject') }}" class="form-control lux-input" required></div>
            <div class="col-12"><label class="form-label">Description</label><textarea name="description" rows="6" class="form-control lux-input" required>{{ old('description') }}</textarea></div>
            <div class="col-12 d-flex gap-3"><button class="btn btn-lux btn-lg"><i class="bi bi-send me-2"></i>Submit Complaint</button><a href="{{ route('home') }}" class="btn btn-outline-lux btn-lg">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
