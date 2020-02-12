<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedicamenteusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_medicamenteuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consultation_id');
            $table->unsignedBigInteger('medicament_id');
            $table->string('dose');
            $table->string('voie');
            $table->string('rythme');
            $table->string('duree');
            $table->date('date_debut');
            $table->string('Commentaire')->nullable();
            $table->boolean('confirmation')->default(0);
            $table->unsignedBigInteger('pharmacie_id')->nullable();
            $table->timestamps();
            $table->foreign('consultation_id')->references('id')->on('consultations');
            $table->foreign('pharmacie_id')->references('id')->on('pharmacies');
            $table->foreign('medicament_id')->references('id')->on('medicaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_medicamenteuses');
    }
}
