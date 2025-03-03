<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\CoachFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    // Un coach peut gérer plusieurs cours via l'entité Horaire.
    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }

    // Un coach peut être associé à plusieurs cours
    public function cours()
    {
        return $this->hasMany(Cours::class, 'horaires', 'coach_id', 'cours_id');
    }
}
