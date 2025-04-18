<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadAndFaceInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_and_face_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('chin_description')->nullable();
            $table->string('eyes_description')->nullable();
            $table->string('hair_description')->nullable();
            $table->string('mouth_description')->nullable();
            $table->string('eye_color')->nullable();
            $table->boolean('eyeware_prescription')->default(0);

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
        Schema::dropIfExists('head_and_face_information');
    }
}
