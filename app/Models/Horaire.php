<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = ['cours_id', 'coach_id', 'jour', 'heure_debut', 'heure_fin'];


    // Un horaire appartient à un seul coach
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    // Un horaire appartient à un seul cours
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    // Un horaire peut être réservé plusieurs fois par différents utilisateurs.
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
