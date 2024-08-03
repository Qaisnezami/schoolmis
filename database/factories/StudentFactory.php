<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'section_id' => \App\Models\Section::factory(),
            'class_id' => \App\Models\Classes::factory(),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
