@extends('layout')
@section('content')

<form method="POST" action="/complaint/store">
@csrf

<input class="form-control mb-2" name="title" placeholder="Title">
<textarea class="form-control mb-2" name="description" placeholder="Description"></textarea>

<select class="form-control mb-2" name="category">
    <option>Academic</option>
    <option>Faculty Behavior</option>
    <option>Facilities</option>
</select>

<label><input type="checkbox" name="anonymous"> Anonymous</label><br><br>

<button class="btn btn-success">Submit</button>
</form>

@endsection
