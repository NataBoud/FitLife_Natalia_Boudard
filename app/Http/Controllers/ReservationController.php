<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;


use App\Models\Reservation;
use App\Models\User;
use App\Models\Coach;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Auth::user()->reservations()->with('horaires.cours', 'horaires.coach')->get();

        return view('reservation.index', compact('reservations'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Cours $cours)
    {
        $cours->load('horaires.coach');

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('reservation.create', compact('cours'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cours $cours)
    {
        // Validation des données
        $validated = $request->validate([
            'horaires' => 'required|array',
            'horaires.*' => 'exists:horaires,id',
        ]);

        // Création de la réservation
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
        ]);

        // Attachement des horaires sélectionnés
        $reservation->horaires()->attach($validated['horaires']);

        return redirect()->route('reservation.show', $reservation->id)
            ->with('success', 'Réservation effectuée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        if (Auth::id() !== $reservation->user_id) {
            abort(403, 'Accès non autorisé.');
        }

        // Charger les horaires et leur cours associé
        $reservation->load('horaires.cours', 'horaires.coach', 'user');

        return view('reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservationg)
    {
        //
    }
}
