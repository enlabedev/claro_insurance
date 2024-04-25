<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::factory()->count(10)->create()->each(function ($course) {
            $schedules = Schedule::factory()->count(3)->create();
            $course->schedules()->attach($schedules);
        });

        Course::factory()->create([
            'id' => 'e162f30a-c51a-4c8f-832a-90f5554ff7a3', // Show
        ])->each(function ($course) {
            $schedules = Schedule::factory()->count(3)->create();
            $course->schedules()->attach($schedules);
        });

        Course::factory()->create([
            'id' => 'f041f6a7-d54e-4976-8112-7398187ae89f', // Update
        ])->each(function ($course) {
            $schedules = Schedule::factory()->count(3)->create();
            $course->schedules()->attach($schedules);
        });

        Course::factory()->create([
            'id' => '667323e8-01a5-48ef-bd2d-9fbebf908940', // Delete
        ])->each(function ($course) {
            $schedules = Schedule::factory()->count(3)->create();
            $course->schedules()->attach($schedules);
        });
    }
}
