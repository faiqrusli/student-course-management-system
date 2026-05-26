<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'code' => 'CSC301',
            'title' => 'Web Development',
            'credit_hour' => 3,
        ]);

        Course::create([
            'code' => 'CSC302',
            'title' => 'Database Systems',
            'credit_hour' => 3,
        ]);

        Course::create([
            'code' => 'CSC303',
            'title' => 'Software Engineering',
            'credit_hour' => 4,
        ]);

        Course::create([
            'code' => 'CSC304',
            'title' => 'Artificial Intelligence',
            'credit_hour' => 3,
        ]);
    }
}