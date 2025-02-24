<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'horaire_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class, 'fitness_class_id');
    }
}
