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
        Schema::create('voertuigen', function (Blueprint $table) {
            $table->id(); // Id(PK)
            $table->string('kenteken')->unique();
            $table->string('type');
            $table->date('bouwjaar');
            $table->string('brandstof');
            $table->unsignedBigInteger('type_voertuig_id'); // TypeVoertuigId (FK)
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('type_voertuig_id')->references('id')->on('type_voertuigen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voertuigen');
    }
};
