@extends('layout')

@section('content')

<h2>Admin Dashboard</h2>

<!-- 🔍 FILTER FORM (PUT HERE) -->
<form method="GET" class="mb-3">
    <select name="status">
        <option value="">All</option>
        <option value="pending">Pending</option>
        <option value="in-progress">In Progress</option>
        <option value="resolved">Resolved</option>
    </select>

    <button type="submit">Filter</button>
</form>

<!-- 📋 COMPLAINT LIST -->
@foreach($complaints as $complaint)
    <div class="card mb-2 p-3">
        <h5>{{ $complaint->title }}</h5>
        <p>{{ $complaint->description }}</p>

        <span>{{ $complaint->tracking_id }}</span>
        <span class="badge bg-warning">{{ $complaint->status }}</span>
    </div>
@endforeach

@endsection