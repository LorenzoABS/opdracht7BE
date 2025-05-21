<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voertuig_instructeur', function (Blueprint $table) {
            $table->id(); // Id (PK)
            $table->unsignedBigInteger('voertuig_id'); // VoertuigId (FK)
            $table->unsignedBigInteger('instructeur_id'); // InstructeurId (FK)
            $table->date('datum_toekenning');
            
            // Foreign key constraints
            $table->foreign('voertuig_id')->references('id')->on('voertuigen')->onDelete('cascade');
            $table->foreign('instructeur_id')->references('id')->on('instructeurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voertuig_instructeur');
    }
};
