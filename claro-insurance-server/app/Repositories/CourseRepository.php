<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;

class CourseRepository implements CourseRepositoryInterface
{
    protected $course;
    public function __construct()
    {
        $this->course = new Course();
        $this->student = new Student();
    }

    public function index()
    {
        return $this->course->all();
    }

    public function store(array $data)
    {
        return $this->course->create($data);
    }

    public function update(array $data,$id)
    {
        $course = $this->course->find($id);
        return $course->update($data);
    }

    public function delete($id)
    {
        return $this->course->destroy($id);
    }

    public function top_courses()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $topCourses = $this->course->withCount(['students' => function ($query) use ($sixMonthsAgo) {
            $query->where('created_at', '>=', $sixMonthsAgo);
        }])->orderBy('students_count', 'desc')
            ->take(3)
            ->get();
        $topStudents = $this->student->withCount(['courses' => function ($query) use ($sixMonthsAgo) {
            $query->where('created_at', '>=', $sixMonthsAgo);
        }])->orderBy('courses_count', 'desc')
            ->take(3)
            ->get();

        $totalStudents = $this->student->count();
        $totalCourses = $this->course->count();
        return [
            'top_courses' => $topCourses,
            'top_students' => $topStudents,
            'total_students' => $totalStudents,
            'total_courses' => $totalCourses
        ];
    }
}
