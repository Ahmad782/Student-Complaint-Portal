@extends('layout')

@section('content')

<!-- HERO SECTION -->
<div class="hero">
    <h2>Welcome to Complaint Management System</h2>
    <p class="text-muted">
        A transparent and efficient platform for submitting and tracking complaints
        related to academics, faculty, and campus facilities.
    </p>

    <a href="/complaint/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Submit Complaint
    </a>
</div>

<!-- STATS -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <h3>120+</h3>
            <p>Total Complaints</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h3>45</h3>
            <p>Pending</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h3>75</h3>
            <p>Resolved</p>
        </div>
    </div>
</div>

<!-- INFO SECTION -->
<div class="card p-4">
    <h5>How it works</h5>
    <ul>
        <li>Submit your complaint using simple form</li>
        <li>Get unique tracking ID (CMP-XXXX)</li>
        <li>Track status anytime</li>
        <li>Admin reviews and resolves issues</li>
    </ul>
</div>

@endsection