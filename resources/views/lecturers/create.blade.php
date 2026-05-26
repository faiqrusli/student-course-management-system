@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Lecturer</h3>

    <form method="POST" action="{{ route('lecturers.store') }}">
        @csrf

        @include('lecturers.form')

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
