@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Student</h3>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        @include('students.form')

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
