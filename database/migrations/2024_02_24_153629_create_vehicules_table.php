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
        Schema::create('vehicules', function (Blueprint $table) {
        $table->id(); // Crée automatiquement une colonne 'id' de type entier non signé et auto-incrémenté
        $table->string('marque'); // Ajoute une colonne 'marque' de type chaîne de caractères
        $table->date('date_achat'); // Ajoute une colonne 'date_achat' de type date
        $table->integer('KM_defaut'); // Ajoute une colonne 'KM_defaut' de type entier
        $table->string('matricule'); // Ajoute une colonne 'matricule' de type chaîne de caractères
        $table->string('image')->nullable();
        $table->boolean('surTerrain')->nullable();;
        $table->unsignedBigInteger('idCategorie'); // Ajoute une colonne 'idCategorie' de type entier non signé
        // $table->foreign('idCategorie')->references('id')->on('categories'); // Définit une clé étrangère référençant la colonne 'id' de la table 'categories'
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
        Schema::dropIfExists('vehicules');
    }
};
