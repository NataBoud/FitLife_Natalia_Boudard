<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FitnessClass>
 */
class FitnessClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_name' => fake()->randomElement(['yoga', 'cardio', ' musculation']),
            'description' => fake()->paragraph(2), 
        ];
    }
}
