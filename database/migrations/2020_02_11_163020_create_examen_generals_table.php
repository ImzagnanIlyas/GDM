<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consultation_id');
            $table->string('etat', 20);
            $table->float('temperature')->nullable();
            $table->float('tension_arterielle')->nullable();
            $table->float('frequence_cardiaque')->nullable();
            $table->float('frequence_respiratoire')->nullable();
            $table->float('poids')->nullable();
            $table->float('taille')->nullable();
            $table->string('conjonctives', 30)->nullable();
            $table->json('autre')->nullable();
            $table->timestamps();
            $table->foreign('consultation_id')->references('id')->on('consultations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_generals');
    }
}