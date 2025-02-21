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

    protected $fillable = [
        'status',
        'timeslot_id',
        'user_id',
    ];

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
