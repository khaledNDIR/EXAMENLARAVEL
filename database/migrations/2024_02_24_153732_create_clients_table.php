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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Crée automatiquement une colonne 'id' de type entier non signé et auto-incrémenté
            $table->string('nom'); // Ajoute une colonne 'nom' de type chaîne de caractères
            $table->string('prenom'); // Ajoute une colonne 'prenom' de type chaîne de caractères
            $table->string('telephone'); // Ajoute une colonne 'telephone' de type chaîne de caractères
            $table->string('adresse'); // Ajoute une colonne 'adresse' de type chaîne de caractères
            $table->date('date'); // Ajoute une colonne 'date' de type date
            $table->time('heure'); // Ajoute une colonne 'heure' de type time
            $table->integer('nombre_place'); // Ajoute une colonne 'nombre_place' de type entier
            $table->timestamps(); // Ajoute automatiquement les colonnes 'created_at' et 'updated_at' pour la gestion des timestamps   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
