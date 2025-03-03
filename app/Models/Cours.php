<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Un cours peut avoir plusieurs coachs associés via l'entité Horaire.
    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }

    // Un cours peut être associé à plusieurs coachs
    public function coaches()
    {
        return $this->hasMany(Coach::class, 'horaires', 'cours_id', 'coach_id');
    }

}
