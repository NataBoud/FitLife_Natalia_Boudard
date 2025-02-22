<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Coach;
use App\Models\FitnessClass;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coach_fitness_class', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Coach::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(FitnessClass::class)
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
        Schema::dropIfExists('coach_fitness_class');
    }
};
