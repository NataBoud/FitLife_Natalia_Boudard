<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Coach;
use App\Models\Cours;
use App\Models\Horaire;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run()
{
    User::factory(10)->create();
    Coach::factory(5)->create();
    Cours::factory(15)->create();

    $coachs = Coach::all();
    $cours = Cours::all()->shuffle(); // Mélange
    $coursParCoach = $cours->chunk(3); // Découpe en groupes de 3

    foreach ($coachs as $index => $coach) {
        if (isset($coursParCoach[$index])) {
            foreach ($coursParCoach[$index] as $cours) {
                Horaire::factory(3)->create([
                    'cours_id' => $cours->id,
                    'coach_id' => $coach->id,
                ]);
            }
        }
    }

    User::all()->each(function ($user) {
        Reservation::factory(2)->create(['user_id' => $user->id]);
    });
}

}
