<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistinguishIdentifierInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distinguish_identifier_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->boolean('facial_neck_scars')->default(0);
            $table->string('facial_neck_scars_description')->nullable();
            $table->boolean('facial_or_neck_tattoos')->default(0);
            $table->string('facial_or_neck_tattoos_description')->nullable();
            $table->boolean('facial_plastic_surgery')->default(0);
            $table->boolean('right_eye')->default(0);
            $table->boolean('left_eye')->default(0);
            $table->boolean('nose_job')->default(0);
            $table->boolean('cheeks')->default(0);
            $table->boolean('mouth')->default(0);
            $table->boolean('chin')->default(0);
            $table->boolean('fore_head')->default(0);
            $table->boolean('face_lift')->default(0);
            $table->boolean('lips')->default(0);
            $table->date('facial_surgery_date')->nullable();
            $table->string('number_of_plastic_surgery')->nullable();
            $table->string('plastic_surgeon_name')->nullable();
            $table->string('first_name_of_surgeon')->nullable();
            $table->string('last_name_of_surgeon')->nullable();
            $table->string('surgeon_house_address')->nullable();
            $table->string('surgeon_street')->nullable();
            $table->string('surgeon_state')->nullable();
            $table->string('surgeon_city')->nullable();
            $table->string('surgeon_zipcode')->nullable();
            $table->string('surgeon_telephone')->nullable();
        


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
        Schema::dropIfExists('distinguish_identifier_information');
    }
}
