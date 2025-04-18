<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyAndMedicalHistoryInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_and_medical_history_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id')->nullable();
            $table->string('number_of_brother')->nullable();
            $table->string('olders_brother_name')->nullable();
            $table->string('number_of_sister')->nullable();
            $table->string('youngest_sister_name')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('name_of_hospital_you_born_in')->nullable();
            $table->string('name_of_mid_wife')->nullable();
            $table->string('first_name_of_mid_wife')->nullable();
            $table->string('last_name_of_mid_wife')->nullable();
            $table->string('exact_location_of_first_reponder')->nullable();
            $table->string('address_description')->nullable();
            $table->string('birth_house_address')->nullable();
            $table->string('birth_street')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_zipcode')->nullable();
            $table->string('birth_address_description')->nullable();
            $table->float('your_age')->nullable();
            
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
        Schema::dropIfExists('family_and_medical_history_information');
    }
}
