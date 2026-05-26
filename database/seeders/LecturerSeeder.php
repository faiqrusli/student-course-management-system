<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        Lecturer::create([
            'name' => 'Dr. Ahmad Rizal',
            'staff_id' => 'L001',
            'email' => 'rizal@university.edu',
        ]);

        Lecturer::create([
            'name' => 'Dr. Siti Maryam',
            'staff_id' => 'L002',
            'email' => 'maryam@university.edu',
        ]);

        Lecturer::create([
            'name' => 'Prof. Daniel Lee',
            'staff_id' => 'L003',
            'email' => 'daniellee@university.edu',
        ]);
    }
}