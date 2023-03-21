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
        Schema::create('portes', function (Blueprint $table) {
            $table->increments('id_porte');
            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')->references('id_salle')->on('batiments')->onDelete('cascade');
            $table->unsignedBigInteger('id_barillet');
            $table->foreign('id_barillet')->references('id_barillet')->on('modele_barillets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portes');
    }
};
