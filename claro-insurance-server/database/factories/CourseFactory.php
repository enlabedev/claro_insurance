<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        $randomDate = Carbon::now()->subMonths(rand(0, 9));
        return [
            'name' => $this->faker->sentence(3),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'type' => $this->faker->randomElement(['presential', 'virtual']),
            'created_at' => $randomDate,
            'updated_at' => $randomDate,
        ];
    }
}
