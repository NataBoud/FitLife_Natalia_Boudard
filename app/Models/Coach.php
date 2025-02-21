<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FitnessClass;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\CoachFactory> */
    use HasFactory;
    protected $table = 'coaches';

    protected $fillable = [
        'name',
    ];

    public function fitnessClasses()
    {
        return $this->belongsToMany(FitnessClass::class);
    }
}
