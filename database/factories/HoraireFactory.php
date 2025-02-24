<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Coach;
use App\Models\Cours;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horaire>
 */
class HoraireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cours_id' => Cours::inRandomOrder()->first()->id,
            'coach_id' => Coach::inRandomOrder()->first()->id,
            'jour' => $this->faker->randomElement(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']),
            'heure_debut' => $this->faker->time('H:i'),
            'heure_fin' => $this->faker->time('H:i'),
        ];
    }
}
