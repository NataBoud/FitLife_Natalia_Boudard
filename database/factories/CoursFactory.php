<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cours>
 */
class CoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'yoga',
                'cardio',
                'musculation',
                'pilates',
                'zumba',
                'aérobic',
                'stretching',
                'spinning',
                'boxe',
                'crossfit',
                'danse',
                'kickboxing',
                'fitness',
                'métabolisme',
                'taï-chi'
            ]),
            'description' => $this->faker->paragraph(2),
        ];
    }
}
