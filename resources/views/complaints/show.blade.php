@extends('layout')

@section('content')
<section class="page-header"><div class="container"><h1>Complaint #{{ $complaint->id }}</h1><p>{{ $complaint->subject }}</p></div></section>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="lux-card p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-start gap-3 mb-4">
                    <div><h2 class="fw-bold mb-2">{{ $complaint->subject }}</h2><span class="status-badge {{ strtolower(str_replace(' ', '-', $complaint->status)) }}">{{ $complaint->status }}</span></div>
                    <span class="tracking-id">#{{ $complaint->id }}</span>
                </div>
                <div class="detail-grid">
                    <div><span>Name</span><strong>{{ $complaint->student_name }}</strong></div>
                    <div><span>Roll No</span><strong>{{ $complaint->roll_no }}</strong></div>
                    <div><span>Department</span><strong>{{ $complaint->department }}</strong></div>
                    <div><span>Semester</span><strong>{{ $complaint->semester ?? 'N/A' }}</strong></div>
                    <div><span>Category</span><strong>{{ $complaint->category }}</strong></div>
                    <div><span>Priority</span><strong>{{ $complaint->priority }}</strong></div>
                </div>
                <hr class="my-4">
                <h5 class="fw-bold">Complaint Details</h5>
                <p class="detail-text">{{ $complaint->description }}</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="lux-card p-4">
                <h5 class="fw-bold mb-3">Admin Status Update</h5>
                <form method="POST" action="{{ route('complaints.status', $complaint) }}">
                    @csrf @method('PATCH')
                    <select name="status" class="form-select lux-input mb-3">
                        @foreach(['Pending','In Progress','Resolved','Rejected'] as $status)
                            <option value="{{ $status }}" @selected($complaint->status == $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-lux w-100">Update Status</button>
                </form>
                <a href="{{ route('complaints.index') }}" class="btn btn-outline-lux w-100 mt-3">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
