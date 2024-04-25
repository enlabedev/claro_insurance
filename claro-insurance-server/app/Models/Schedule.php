<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['days', 'start_time', 'end_time'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_schedule');
    }
}
