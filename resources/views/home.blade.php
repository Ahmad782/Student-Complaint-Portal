@extends('layout')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="premium-pill mb-3"><i class="bi bi-stars"></i> Digital Grievance Management System</div>
                <h1 class="hero-title">Student Complaint Portal</h1>
                <p class="hero-text">Submit academic, faculty, and campus facility complaints with a premium tracking experience, clean records, and transparent resolution flow.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('complaints.create') }}" class="btn btn-lux btn-lg"><i class="bi bi-send me-2"></i>Submit Complaint</a>
                    <a href="{{ route('complaints.index') }}" class="btn btn-outline-lux btn-lg"><i class="bi bi-search me-2"></i>Track Status</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-card">
                    <div class="hero-card-top">
                        <span>Live Overview</span>
                        <i class="bi bi-activity"></i>
                    </div>
                    <div class="row g-3">
                        <div class="col-6"><div class="stat-box"><h3>{{ $stats['total'] }}</h3><p>Total</p></div></div>
                        <div class="col-6"><div class="stat-box"><h3>{{ $stats['pending'] }}</h3><p>Pending</p></div></div>
                        <div class="col-6"><div class="stat-box"><h3>{{ $stats['progress'] }}</h3><p>In Progress</p></div></div>
                        <div class="col-6"><div class="stat-box"><h3>{{ $stats['resolved'] }}</h3><p>Resolved</p></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="section-heading text-center mb-4">
        <span>Complaint Categories</span>
        <h2>Designed for Real Campus Issues</h2>
    </div>
    <div class="row g-4">
        <div class="col-md-4"><div class="feature-card"><i class="bi bi-journal-bookmark"></i><h4>Academic Issues</h4><p>Courses, results, exams, timetable, or classroom problems.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><i class="bi bi-person-badge"></i><h4>Faculty Conduct</h4><p>Unfair behavior, communication gaps, or professional concerns.</p></div></div>
        <div class="col-md-4"><div class="feature-card"><i class="bi bi-building-check"></i><h4>Campus Facilities</h4><p>Labs, transport, library, hostel, sanitation, and facilities.</p></div></div>
    </div>
</section>

<section class="container my-5">
    <div class="lux-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0 fw-bold">Latest Complaints</h4>
            <a href="{{ route('complaints.index') }}" class="btn btn-sm btn-lux">View All</a>
        </div>
        @forelse($latest as $item)
            <div class="latest-item">
                <div>
                    <strong>#{{ $item->id }} — {{ $item->subject }}</strong>
                    <p>{{ $item->category }} • {{ $item->created_at->format('d M Y') }}</p>
                </div>
                <span class="status-badge {{ strtolower(str_replace(' ', '-', $item->status)) }}">{{ $item->status }}</span>
            </div>
        @empty
            <p class="text-muted m-0">No complaints yet. Be the first to submit one.</p>
        @endforelse
    </div>
</section>
@endsection
