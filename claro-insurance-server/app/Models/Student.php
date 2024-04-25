<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, HasUuids, softDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'age',
        'cedula',
        'email',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
