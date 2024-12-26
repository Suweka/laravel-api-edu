<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
{
    return [
        'title' => $this->faker->sentence(3), // Generate a random course title
        'description' => $this->faker->paragraph(), // Generate a random course description
        'duration' => $this->faker->numberBetween(10, 100), // Generate a random duration (in hours)
        'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']), // Randomly assign a course level
    ];
}
}
