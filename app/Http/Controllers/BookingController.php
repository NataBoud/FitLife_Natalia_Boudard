<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FitnessClass;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $fitnessClass = FitnessClass::findOrFail($id);
        return view('booking.create', compact('fitnessClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'timeslot_id' => 'required|exists:timeslots,id',
            'coach_id' => 'required|exists:coaches,id',
            'fitness_class_id' => 'required|exists:fitness_classes,id',
        ]);

        $user = User::find(1);
        $booking = Booking::create([
            'timeslot_id' => $validated['timeslot_id'],
            'coach_id' => $validated['coach_id'],
            'user_id' => $user->id,
            'fitness_class_id' => $validated['fitness_class_id'],
        ]);

        return redirect(route('booking.show', ['booking' => $booking->id]))
            ->with('message', 'Réservation effectuée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking = Booking::with(['fitnessClass', 'timeslot.coach', 'timeslot.fitnessClasses'])
            ->where('user_id', 1)
            ->where('id', $booking->id)
            ->firstOrFail();

        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
