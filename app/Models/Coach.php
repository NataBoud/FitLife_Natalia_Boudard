<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\CoachFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }
}
