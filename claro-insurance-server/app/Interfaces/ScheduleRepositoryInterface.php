<?php

namespace App\Interfaces;

interface ScheduleRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
