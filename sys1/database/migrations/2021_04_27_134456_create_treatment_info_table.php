<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_info', function (Blueprint $table) {
            $table->id();
            $table->date('treatment_start_date');
            $table->string('diagnosis');
            $table->integer('sanemtsMed_id');
            $table->integer('deva');
            $table->date('treatment_end_date');
            $table->date('med_free_date');
            $table->integer('animal_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('treatment_info');
    }
}
