<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarilletPersonnePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barillet_personne', function (Blueprint $table) {
            $table->unsignedInteger('id_barillet')->index();
            $table->foreign('id_barillet')->references('id_barillet')->on('barillets')->onDelete('cascade');
            $table->unsignedInteger('id_personne')->index();
            $table->foreign('id_personne')->references('id_personne')->on('personnes')->onDelete('cascade');
            $table->primary(['id_barillet', 'id_personne']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barillet_personne');
    }
}
