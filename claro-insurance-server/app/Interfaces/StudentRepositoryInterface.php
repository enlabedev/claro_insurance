<?php

namespace App\Interfaces;

interface StudentRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);

    public function delete_course($student_id,$course_id);


}
