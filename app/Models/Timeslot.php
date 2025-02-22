<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $table = 'timeslots';

    protected $fillable = [
        'max_capacity',
        'date_time',
        'coach_id',
    ];

    // Relation avec Coach (un créneau horaire appartient à un Coach)
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    // Relation avec Booking (un créneau horaire peut avoir plusieurs réservations)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Relation avec FitnessClass (un créneau horaire peut être associé à plusieurs cours)
    public function fitnessClasses()
    {
        return $this->belongsToMany(FitnessClass::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
