<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyNeighborhoodInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_neighborhood_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('neighborhood_race_right')->nullable();
            $table->string('name_of_neighborhood_household_head_right')->nullable();
            $table->string('neighborhood_guid_right')->nullable();
            $table->boolean('provide_neigborhood_address_right')->default(0);
            $table->string('neighborhood_house_address_right')->nullable();
            $table->string('neighborhood_urbanization_name_right')->nullable();
            $table->string('neighborhood_zipcode_right')->nullable();
            $table->string('neighborhood_state_right')->nullable();
            $table->string('neighborhood_city_right')->nullable();

            $table->string('neighborhood_race_left')->nullable();
            $table->string('name_of_neighborhood_household_head_left')->nullable();
            $table->string('neighborhood_guid_left')->nullable();
            $table->boolean('provide_neigborhood_address_left')->default(0);
            $table->string('neighborhood_house_address_left')->nullable();
            $table->string('neighborhood_urbanization_name_left')->nullable();
            $table->string('neighborhood_zipcode_left')->nullable();
            $table->string('neighborhood_state_left')->nullable();
            $table->string('neighborhood_city_left')->nullable();


            $table->string('neighborhood_race_front')->nullable();
            $table->string('name_of_neighborhood_household_head_front')->nullable();
            $table->string('neighborhood_guid_front')->nullable();
            $table->boolean('provide_neigborhood_address_front')->default(0);
            $table->string('neighborhood_house_address_front')->nullable();
            $table->string('neighborhood_urbanization_name_front')->nullable();
            $table->string('neighborhood_zipcode_front')->nullable();
            $table->string('neighborhood_state_front')->nullable();
            $table->string('neighborhood_city_front')->nullable();


            $table->string('neighborhood_race_back')->nullable();
            $table->string('name_of_neighborhood_household_head_back')->nullable();
            $table->string('neighborhood_guid_back')->nullable();
            $table->boolean('provide_neigborhood_address_back')->default(0);
            $table->string('neighborhood_house_address_back')->nullable();
            $table->string('neighborhood_urbanization_name_back')->nullable();
            $table->string('neighborhood_zipcode_back')->nullable();
            $table->string('neighborhood_state_back')->nullable();
            $table->string('neighborhood_city_back')->nullable();
           
            
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
        Schema::dropIfExists('my_neighborhood_information');
    }
}
