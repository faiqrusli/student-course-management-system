<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => 'Ahmad Faiq',
            'matric_no' => 'A221001',
            'email' => 'faiq@student.com',
        ]);

        Student::create([
            'name' => 'Ali Imran',
            'matric_no' => 'A221002',
            'email' => 'ali@student.com',
        ]);

        Student::create([
            'name' => 'Nur Aisyah',
            'matric_no' => 'A221003',
            'email' => 'aisyah@student.com',
        ]);

        Student::create([
            'name' => 'Daniel Hakim',
            'matric_no' => 'A221004',
            'email' => 'daniel@student.com',
        ]);

        Student::create([
            'name' => 'Sarah Imani',
            'matric_no' => 'A221005',
            'email' => 'sarah@student.com',
        ]);
    }
}