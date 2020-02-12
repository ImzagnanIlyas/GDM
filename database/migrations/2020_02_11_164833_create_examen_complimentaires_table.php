<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenComplimentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_complimentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consultation_id');
            $table->string('bilan');
            $table->json('Prescription_analyse');
            $table->boolean('confirmation')->default(0);
            $table->unsignedBigInteger('examinateur_id')->nullable();
            $table->timestamps();
            $table->foreign('consultation_id')->references('id')->on('consultations');
            $table->foreign('examinateur_id')->references('id')->on('examinateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_complimentaires');
    }
}
