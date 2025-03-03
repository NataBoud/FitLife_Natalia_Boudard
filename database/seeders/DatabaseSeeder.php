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
        // Création des utilisateurs et des coachs
        User::factory(10)->create();
        Coach::factory(5)->create();

        // Création des cours
        $coursNames = [
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
        ];

        foreach ($coursNames as $name) {
            Cours::factory()->create([
                'name' => $name
            ]);
        }

        // Pour chaque cours, associer plusieurs coachs
        $coachs = Coach::all();
        $cours = Cours::all();

        foreach ($cours as $cours) {
            // Associer le cours à 3 coachs différents
            $coachIds = $coachs->random(3)->pluck('id');  // Sélectionner 3 coachs aléatoires

            foreach ($coachIds as $coachId) {
                // Pour chaque coach, créer un horaire pour ce cours
                Horaire::factory()->create([
                    'cours_id' => $cours->id,
                    'coach_id' => $coachId,
                ]);
            }
        }

        // Création des réservations pour les utilisateurs
        User::all()->each(function ($user) {
            $reservations = Reservation::factory(2)->create(['user_id' => $user->id]);

            // Attacher des horaires aux réservations
            $horaires = Horaire::inRandomOrder()->limit(3)->pluck('id'); // Sélectionner 3 horaires aléatoires

            foreach ($reservations as $reservation) {
                $reservation->horaires()->attach($horaires);
            }
        });
    }
}
