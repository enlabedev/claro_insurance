<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::factory()->count(10)->create()->each(function ($student) {
            $student->courses()->attach([
                'e162f30a-c51a-4c8f-832a-90f5554ff7a3', // Show
                'f041f6a7-d54e-4976-8112-7398187ae89f', // Update
                '667323e8-01a5-48ef-bd2d-9fbebf908940', // Delete
            ]);
        });

        Student::factory()->create([
            'id' => '8b8e9d80-9827-4b4d-8ba2-f7c3df2f45ed', // Show
        ])->each(function ($student) {
            $courses = Course::factory()->count(rand(1,10))->create();
            $student->courses()->attach($courses);
        });
        Student::factory()->create([
            'id' => '7b4fc305-b358-4973-babd-795be054b585', // Update
        ])->each(function ($student) {
            $courses = Course::factory()->count(rand(1,10))->create();
            $student->courses()->attach($courses);
        });
        Student::factory()->create([
            'id' => '0f19ab7d-eb5f-49cb-a305-368fd90ce1eb', // Delete
        ])->each(function ($student) {
            $courses = Course::factory()->count(rand(1,10))->create();
            $student->courses()->attach($courses);
        });
    }
}
