<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timeslot;
use App\Models\User;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = ['timeslot_id', 'coach_id', 'user_id', 'fitness_class_id'];

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function fitnessClass()
    {
        return $this->belongsTo(FitnessClass::class, 'fitness_class_id');
    }
}
