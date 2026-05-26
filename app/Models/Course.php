<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'title', 'credit_hour'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class);
    }
}
