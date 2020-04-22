<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('code');
            $table->string('nom', 50);
            $table->string('dci');
            $table->string('dosage');
            $table->string('unite_dosage');
            $table->string('forme');
            $table->string('presentation');
            $table->double('ppv');
            $table->double('ph');
            $table->string('Remboursement', 5);
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
        Schema::dropIfExists('medicaments');
    }
}
