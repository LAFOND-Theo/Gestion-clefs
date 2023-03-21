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
        Schema::create('exemplaires', function (Blueprint $table) {
            $table->increments('id_exemplaire');
            $table->date('date_acquisition');
            $table->unsignedBigInteger('id_personne');
            $table->foreign('id_personne')->references('id_personne')->on('possesseur_de_clefs')->onDelete('cascade');
            $table->unsignedBigInteger('code_type');
            $table->foreign('code_type')->references('code_type')->on('type_exemplaire')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exemplaires');
    }
};
