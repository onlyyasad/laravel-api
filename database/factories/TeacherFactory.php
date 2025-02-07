<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = ['Physics', 'Chemistry', 'Mathematics', 'Biology', 'History', 'English', 'Computer Science'];
        
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'age' => fake()->numberBetween(25, 65),
            'salary' => fake()->numberBetween(30000, 100000),
            'expertise' => fake()->randomElement($subjects),
            'location' => fake()->city(),
        ];
    }
}
