<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cin', 10);
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->date('ddn');
            $table->string('sexe', 10);
            $table->string('adresse');
            $table->string('telephone', 20);
            $table->string('profession', 50);
            $table->string('etat_civil', 30);
            $table->json('famille');
            $table->json('atcd');
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
        Schema::dropIfExists('patients');
    }
}
