<?php

namespace App\Repositories;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;
class StudentRepository implements StudentRepositoryInterface
{
    protected $student;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        return $this->student->all();
    }

    public function store(array $data)
    {
        return $this->student->create($data);
    }

    public function update(array $data,$id)
    {
        $student = $this->student->find($id);
        return $student->update($data);
    }

    public function delete($id)
    {
        return $this->student->destroy($id);
    }

    public function delete_course($student_id,$course_id)
    {
        $student = $this->student->find($student_id);
        return $student->courses()->detach($course_id);
    }
}
