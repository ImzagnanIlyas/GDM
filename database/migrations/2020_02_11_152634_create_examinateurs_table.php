<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 50);
            $table->string('adresse');
            $table->string('tele', 20);
            $table->unsignedBigInteger('patient_id');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');//Responsable 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinateurs');
    }
}
