@extends('layout')

@section('content')
<section class="page-header"><div class="container"><h1>Track Complaints</h1><p>Search, filter, and monitor complaint resolution status.</p></div></section>

<div class="container my-5">
    <div class="lux-card p-4 mb-4">
        <form class="row g-3">
            <div class="col-md-7"><input name="search" value="{{ request('search') }}" class="form-control lux-input" placeholder="Search by name, roll no, subject or category"></div>
            <div class="col-md-3"><select name="status" class="form-select lux-input"><option value="">All Status</option>@foreach(['Pending','In Progress','Resolved','Rejected'] as $status)<option value="{{ $status }}" @selected(request('status')==$status)>{{ $status }}</option>@endforeach</select></div>
            <div class="col-md-2"><button class="btn btn-lux w-100">Search</button></div>
        </form>
    </div>

    <div class="lux-card p-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-lux mb-0 align-middle">
                <thead><tr><th>ID</th><th>Student</th><th>Category</th><th>Priority</th><th>Subject</th><th>Status</th><th>Action</th></tr></thead>
                <tbody>
                @forelse($complaints as $complaint)
                    <tr>
                        <td>#{{ $complaint->id }}</td>
                        <td><strong>{{ $complaint->student_name }}</strong><br><small>{{ $complaint->roll_no }}</small></td>
                        <td>{{ $complaint->category }}</td>
                        <td><span class="priority-badge">{{ $complaint->priority }}</span></td>
                        <td>{{ $complaint->subject }}</td>
                        <td><span class="status-badge {{ strtolower(str_replace(' ', '-', $complaint->status)) }}">{{ $complaint->status }}</span></td>
                        <td><a href="{{ route('complaints.show', $complaint) }}" class="btn btn-sm btn-lux">View</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-5 text-muted">No complaints found.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $complaints->links() }}</div>
</div>
@endsection
