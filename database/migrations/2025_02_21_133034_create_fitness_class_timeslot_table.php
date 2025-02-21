<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FitnessClass;
use App\Models\Timeslot;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fitness_class_timeslot', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FitnessClass::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Timeslot::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitness_class_timeslot');
    }
};
