<?php

namespace Database\Factories;

use App\Models\FitnessClass;
use App\Models\Coach;
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
            'class_name' => $this->faker->randomElement([
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

    /**
     * Indique après la création de la classe de fitness, associer un coach.
     */
    public function configure()
    {
        return $this->afterCreating(function (FitnessClass $fitnessClass) {
            $randomCount = rand(1, 3);
            $coaches = Coach::inRandomOrder()->take($randomCount)->get();
            $fitnessClass->coaches()->attach($coaches);
        });
    }
}
