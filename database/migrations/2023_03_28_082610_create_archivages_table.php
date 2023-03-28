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
        Schema::create('archivages', function (Blueprint $table) {
            $table->increments('id_batiment');
            $table->date('date_acquisition');
            $table->date('date_rendu');
            $table->unsignedInteger('id_exemplaire');
            $table->foreign('id_exemplaire')->references('id_exemplaire')->on('exemplaires')->onDelete('cascade');            
            $table->unsignedInteger('id_personne');
            $table->foreign('id_personne')->references('id_personne')->on('possesseur_de_clefs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivages');
    }
};
