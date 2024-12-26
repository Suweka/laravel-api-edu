<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'age' => $this->faker->numberBetween(18, 60),
            'city' => $this->faker->city(),
            'phone_number' => $this->faker->phoneNumber(), // Generate random phone number
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Random gender
            ];
    }
}

