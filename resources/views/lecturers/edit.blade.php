@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Lecturer</h3>

    <form method="POST" action="{{ route('lecturers.update', $lecturer) }}">
        @csrf
        @method('PUT')

        @include('lecturers.form')

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
