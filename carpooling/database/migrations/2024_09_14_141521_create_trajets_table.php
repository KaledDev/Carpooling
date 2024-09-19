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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('conducteur_id');
            $table->string('lieu_depart');
            $table->string('lieu_arrive'); 
            $table->date('date'); 
            $table->time('heure');
            $table->integer('nombre_places'); 
            $table->decimal('prix', 10, 2); 
            $table->enum('status', ['ouvert', 'complet'])->default('ouvert'); 


            $table->foreign('conducteur_id')->references('id')->on('users');

            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
