<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Crée automatiquement une colonne 'id' de type entier non signé et auto-incrémenté

            // Clés étrangères
            $table->unsignedBigInteger('trajet_id');
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            // Ajout d'autres colonnes spécifiques à la réservation si nécessaire
            $table->timestamps(); // Ajoute automatiquement les colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
