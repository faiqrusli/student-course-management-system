@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Course</h3>

    <form method="POST" action="{{ route('courses.store') }}">
        @csrf

        @include('courses.form')

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
