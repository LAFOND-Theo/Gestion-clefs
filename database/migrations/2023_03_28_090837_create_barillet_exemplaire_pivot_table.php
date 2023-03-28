<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarilletExemplairePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barillet_exemplaire', function (Blueprint $table) {
            $table->unsignedInteger('id_barillet')->index();
            $table->foreign('id_barillet')->references('id_barillet')->on('barillets')->onDelete('cascade');
            $table->unsignedInteger('id_exemplaire')->index();
            $table->foreign('id_exemplaire')->references('id_exemplaire')->on('exemplaires')->onDelete('cascade');
            $table->primary(['id_barillet', 'id_exemplaire']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barillet_exemplaire');
    }
}
