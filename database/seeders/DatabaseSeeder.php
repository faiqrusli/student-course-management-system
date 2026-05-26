<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            StudentSeeder::class,
            CourseSeeder::class,
            LecturerSeeder::class,
            UserSeeder::class,
        ]);

        $students = Student::all();
        $courses = Course::all();

        $courses[0]->students()->attach([
            $students[0]->id,
            $students[1]->id,
            $students[2]->id,
        ]);

        $courses[1]->students()->attach([
            $students[1]->id,
            $students[3]->id,
        ]);

        $courses[2]->students()->attach([
            $students[0]->id,
            $students[4]->id,
        ]);

        $courses[3]->students()->attach([
            $students[2]->id,
            $students[3]->id,
            $students[4]->id,
        ]);
    }
}
