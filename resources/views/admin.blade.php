@extends('layout')
@section('content')

<h3>Admin Panel</h3>

@foreach($complaints as $c)
<div class="card mb-2">
    <div class="card-body">
        <h5>{{ $c->title }}</h5>
        <p>{{ $c->description }}</p>

        <form method="POST" action="/admin/update/{{ $c->id }}">
        @csrf

        <select name="status" class="form-control mb-2">
            <option>pending</option>
            <option>in-progress</option>
            <option>resolved</option>
        </select>

        <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endforeach

@endsection

