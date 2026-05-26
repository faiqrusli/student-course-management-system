@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Student</h3>

    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')

        @include('students.form')

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
