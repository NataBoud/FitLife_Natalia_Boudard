<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Timeslot;
use App\Models\Coach;
use App\Models\User;
use App\Models\FitnessClass;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['confirmed', 'pending', 'cancelled']),
            'timeslot_id' => Timeslot::factory(),
            'user_id' => User::factory(),
            'fitness_class_id' => FitnessClass::factory(), // ✅ Assure-toi qu'il est présent
            'coach_id' => Coach::factory(),
        ];
    }
}
