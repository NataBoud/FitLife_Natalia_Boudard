<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Coach;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeslot>
 */
class TimeslotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'max_capacity' => $this->faker->numberBetween(10, 50),
            'date_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'coach_id' => Coach::factory(),
        ];
    }
}
