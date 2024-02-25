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
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('experience');
            $table->string('numero_permit');
            $table->date('date_emission');
            $table->date('date_expiration');
            $table->boolean('Deplacement')->nullable();
            $table->integer('evaluation')->nullable();
            $table->unsignedBigInteger('idCategorie'); // Déclaration de la clé étrangère
    
            // Définition de la contrainte de clé étrangère
            // $table->foreign('idCategorie')->references('id')->on('categories')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chauffeurs');
    }
};
