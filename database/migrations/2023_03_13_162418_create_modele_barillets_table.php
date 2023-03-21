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
        Schema::create('modele_barillets', function (Blueprint $table) {
            $table->increments('id_barillet');
            $table->string('code_clef');
            $table->string('type_variure');
            $table->bigInteger('stock_clef');
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
