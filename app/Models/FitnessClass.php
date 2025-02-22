<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coach;
use App\Models\Timeslot;
use App\Models\Booking;

class FitnessClass extends Model
{
    use HasFactory;

    protected $table = 'fitness_classes';

    protected $fillable = [
        'class_name',
        'description',
    ];

    public function coaches()
    {
        return $this->belongsToMany(Coach::class);
    }

    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
