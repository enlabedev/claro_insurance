<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    protected $course;
    public function __construct()
    {
        $this->schedule = new Schedule();
    }

    public function index()
    {
        return $this->schedule->all();
    }

    public function store(array $data)
    {
        return $this->schedule->create($data);
    }

    public function update(array $data,$id)
    {
        $schedule = $this->schedule->find($id);
        return $schedule->update($data);
    }

    public function delete($id)
    {
        return $this->schedule->destroy($id);
    }
}
