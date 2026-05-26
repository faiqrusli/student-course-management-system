@extends('layouts.app')

@section('content')
<div class="container my-5" style="max-width: 1100px;">

    <h4 class="mb-4">System Report</h4>

    {{-- Summary cards --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Students</h6>
                    <h3>{{ $totalStudents }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Courses</h6>
                    <h3>{{ $totalCourses }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Lecturers</h6>
                    <h3>{{ $totalLecturers }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Course enrollment table --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Course Enrollment</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Course Code</th>
                        <th>Title</th>
                        <th>Enrolled Students</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->students_count }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                No courses found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
