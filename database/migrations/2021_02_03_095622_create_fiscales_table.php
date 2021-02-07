<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscales', function (Blueprint $table) {
            $table->id();
            $table->integer('nbfoyer');
            $table->integer('minProvince');
            $table->integer('maxProvince');
            $table->integer('minIdf');
            $table->integer('maxIdf');
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
        Schema::dropIfExists('fiscales');
    }
}
