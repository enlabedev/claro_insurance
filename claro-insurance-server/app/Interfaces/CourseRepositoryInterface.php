<?php

namespace App\Interfaces;

interface CourseRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);

    public function top_courses();
}
