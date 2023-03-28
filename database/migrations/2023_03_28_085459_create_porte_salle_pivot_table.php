<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePorteSallePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porte_salle', function (Blueprint $table) {
            $table->unsignedInteger('id_porte')->index();
            $table->foreign('id_porte')->references('id_porte')->on('portes')->onDelete('cascade');
            $table->unsignedInteger('id_salle')->index();
            $table->foreign('id_salle')->references('id_salle')->on('salles')->onDelete('cascade');
            $table->primary(['id_porte', 'id_salle']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porte_salle');
    }
}
