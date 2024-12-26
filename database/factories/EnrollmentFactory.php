<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(), // Generates a related student record
            'course_id' => Course::factory(), // Generates a related course record
            'enrollment_date' => $this->faker->date(), // Generates a random enrollment date
        ];
    }
}
