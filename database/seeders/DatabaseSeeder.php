<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Timeslot;
use App\Models\Booking;
use App\Models\FitnessClass;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Timeslot::factory(5)->create();
        Booking::factory(20)->create();
        FitnessClass::factory(20)->create();

         // Création des relations many-to-many entre User et Timeslot
        User::all()->each(function ($user) {
            $user->timeslots()->attach(Timeslot::inRandomOrder()->limit(3)->get());
        });

        // Création des relations many-to-many entre FitnessClass et Timeslot
        FitnessClass::all()->each(function ($fitnessClass) {
            $fitnessClass->timeslots()->attach(Timeslot::inRandomOrder()->limit(3)->get());
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
