<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->date('dateInstall');
            $table->string('adress')->nullable();
            $table->string('city')->nullable();
            $table->integer('postalCode')->nullable();
            $table->integer('campagnie')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')
            ->references('id')
            ->on('agents')
            ->onDelete('cascade');

            $table->string('estimation')->nullable();
            $table->string('prospectOrigin')->nullable();
            $table->integer('sur101')->nullable();
            $table->integer('mat101')->nullable();
            $table->integer('type101')->nullable();
            $table->string('access')->nullable();
            $table->integer('sur101r')->nullable();
            $table->integer('mat101r')->nullable();
            $table->integer('type101r')->nullable();
            $table->string('accessr')->nullable();
            $table->integer('sur102')->nullable();
            $table->integer('mat102')->nullable();
            $table->integer('type102')->nullable();
            $table->string('height102')->nullable();
            $table->integer('sur103')->nullable();
            $table->integer('mat103')->nullable();
            $table->integer('type103')->nullable();
            $table->string('height103')->nullable();
            $table->integer('materialProvide');


            $table->string('taxId');
            $table->string('referenceNotice');
            $table->integer('taxIncome');
            $table->string('taxId2')->nullable();
            $table->string('referenceNotice2')->nullable();
            $table->integer('taxIncome2')->nullable();
            $table->string('taxId3')->nullable();
            $table->string('referenceNotice3')->nullable();
            $table->integer('taxIncome3')->nullable();
            $table->string('taxId4')->nullable();
            $table->string('referenceNotice4')->nullable();
            $table->integer('taxIncome4')->nullable();
            $table->string('taxId5')->nullable();
            $table->string('referenceNotice5')->nullable();
            $table->integer('taxIncome5')->nullable();
            $table->integer('nbrPerson')->nullable();
            $table->integer('overallIncome')->nullable();
            $table->string('taxCategory')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('installer')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->string('dateInstallAffect')->nullable();
            $table->string('statut')->nullable();
            $table->string('productionPole')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
