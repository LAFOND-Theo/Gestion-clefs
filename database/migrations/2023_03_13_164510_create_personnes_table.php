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
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id_personne');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numTel');
            $table->string('email');
            $table->string('adresse');
            $table->Integer('code_postal');
        });
            
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->unsignedInteger('id_personne');
            $table->foreign('id_personne')->references('id_personne')->on('personnes')->onDelete('cascade');
            $table->primary('id_personne');
            $table->string('login_hash');
            $table->string('mdp_hash');
            $table->unsignedInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
        });
            
        Schema::create('possesseur_de_clefs', function (Blueprint $table) {
            $table->unsignedInteger('id_personne');
            $table->foreign('id_personne')->references('id_personne')->on('personnes')->onDelete('cascade');
            $table->primary('id_personne');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnes');
    }
};
