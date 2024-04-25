<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'type',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'course_schedule');
    }
}
