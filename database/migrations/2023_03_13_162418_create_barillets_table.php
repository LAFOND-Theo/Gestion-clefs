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
        Schema::create('barillets', function (Blueprint $table) {
            $table->increments('id_barillet');
            $table->string('code_clef');
            $table->integer('stock_clef');
            $table->unsignedInteger('id_variure');
            $table->foreign('id_variure')->references('id_variure')->on('variures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modele_barillets');
    }
};
