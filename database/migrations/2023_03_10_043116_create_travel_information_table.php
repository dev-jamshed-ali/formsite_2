<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->boolean('are_you_us_citizen')->default(0);
            $table->string('passport_number')->nullable();
            $table->string('alien_id_number')->nullable();
            $table->string('country_of_issuance_foriegn_country')->nullable();
            $table->string('foreign_passport_number')->nullable();
            $table->string('are_you_on_visa')->nullable();
            $table->string('visa_number')->nullable();
            $table->string('us_permit')->nullable();
            $table->string('us_govt_id_number')->nullable();
            $table->string('us_driving_license_number')->nullable();
            $table->string('us_state')->nullable();
            $table->string('state_driver_license_no')->nullable();
            $table->string('state_id')->nullable();
            $table->string('state_id_no')->nullable();
            $table->string('state_hunting')->nullable();
            $table->string('state_hunting_no')->nullable();
            $table->string('state_fishing')->nullable();
            $table->string('state_fishing_no')->nullable();
            $table->string('state_pilot_license')->nullable();
            $table->string('state_pilot_license_no')->nullable();
            $table->string('state_handgun_firearm')->nullable();
            $table->string('state_handgun_firearm_no')->nullable();
            $table->string('state_medicaid')->nullable();
            $table->string('state_medicaid_no')->nullable();
            $table->string('state_medicare')->nullable();
            $table->string('state_medicare_no')->nullable();
            $table->string('us_military_branch')->nullable();

            $table->string('us_military_branch_no')->nullable();
            $table->string('bureau_of_indian_affair_card_no')->nullable();

            $table->string('tribal_id_card_no')->nullable();
            $table->string('witsec')->nullable();
            $table->string('old_first_name')->nullable();
            $table->string('old_last_name')->nullable();
            $table->string('old_mi')->nullable();
            $table->date('old_dob')->nullable();
            $table->string('old_spouse_first_name')->nullable();
            $table->string('old_spouse_last_name')->nullable();
            $table->string('old_spouse_mi')->nullable();
            $table->string('old_spouse_dob')->nullable();
            $table->string('old_first_name_1st_daughter')->nullable();
            $table->string('old_last_name_1st_daughter')->nullable();
            $table->string('old_mi_1st_daughter')->nullable();
            $table->date('old_dob_1st_daughter')->nullable();
            $table->string('old_first_name_2nd_daughter')->nullable();
            $table->string('old_last_name_2nd_daughter')->nullable();
            $table->string('old_mi_2nd_daughter')->nullable();
            $table->date('old_dob_2nd_daughter')->nullable();
            $table->string('old_first_name_1st_son')->nullable();
            $table->string('old_last_name_1st_son')->nullable();
            $table->string('old_mi_1st_son')->nullable();
            $table->string('old_dob_1st_son')->nullable();
            $table->string('old_first_name_2nd_son')->nullable();
            $table->string('old_last_name_2nd_son')->nullable();
            $table->string('old_mi_2nd_son')->nullable();
            $table->date('old_dob_2nd_son')->nullable();
            $table->boolean('to_see_global_look_alike')->default(0);
            $table->boolean('like_to_have_global_look_alike')->default(0);
      
            

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
        Schema::dropIfExists('travel_information');
    }
}
