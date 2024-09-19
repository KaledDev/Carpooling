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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passager_id');
            $table->unsignedBigInteger('trajet_id');
            $table->enum('statut', ['en attente', 'accepté', 'refusé'])->default('en attente');
            $table->integer('nombre_places');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('passager_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
