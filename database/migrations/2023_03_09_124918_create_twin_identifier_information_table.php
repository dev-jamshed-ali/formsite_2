<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwinIdentifierInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twin_identifier_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('dominant_hand_writing_side')->nullable();
            $table->string('are_you_twin')->nullable();
            $table->string('twin_type')->nullable();
            $table->string('twin_first_name')->nullable();
            $table->string('twin_mi')->nullable();
            $table->string('twin_last_name')->nullable();
            $table->string('twin_difference_description')->nullable();
            $table->string('birth_mark_located')->nullable();
            $table->string('twin_birth_mark_located')->nullable();
            $table->string('my_freckles_located')->nullable();
            $table->string('twin_freckles_located')->nullable();
            $table->string('my_moles_located')->nullable();
            $table->string('twin_moles_located')->nullable();
            $table->string('hair_are_different')->nullable();
            $table->string('my_eye_color')->nullable();
            $table->string('twin_eye_color')->nullable();
            $table->string('my_hair_color')->nullable();
            $table->string('twin_hair_color')->nullable();
    
           
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
        Schema::dropIfExists('twin_identifier_information');
    }
}
