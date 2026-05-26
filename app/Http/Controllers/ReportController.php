<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Lecturer;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index', [
            'totalStudents'  => Student::count(),
            'totalCourses'   => Course::count(),
            'totalLecturers' => Lecturer::count(),
            'courses'        => Course::withCount('students')->get(),
        ]);
    }
}
