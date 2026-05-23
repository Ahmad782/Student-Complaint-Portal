<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaint Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/css/portal.css') }}" rel="stylesheet">
</head>
<body>
<div class="lux-bg"></div>

<nav class="navbar navbar-expand-lg glass-nav sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
            <span class="brand-logo"><i class="bi bi-shield-check"></i></span>
            <span>Student Complaint Portal</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <div class="navbar-nav ms-auto gap-2">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('complaints.create') }}">Submit</a>
                <a class="nav-link" href="{{ route('complaints.index') }}">Track</a>
            </div>
        </div>
    </div>
</nav>

<main>
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success lux-alert"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
        </div>
    @endif

    @yield('content')
</main>

<footer class="py-4 mt-5">
    <div class="container text-center text-muted small">
        © {{ date('Y') }} Student Complaint Portal — Transparent, Fast & Secure Resolution System
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
