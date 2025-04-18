<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindMeHereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_me_here', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('house_address',100)->nullable();
            $table->string('building_name',100)->nullable();
            $table->string('street_name',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('town',100)->nullable();
            $table->string('township',100)->nullable();
            $table->string('parish',100)->nullable();
            $table->string('village',100)->nullable();
            $table->string('hamlet',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('county',100)->nullable();
            $table->string('neighborhood_name',100)->nullable();
            $table->string('zipcode',100)->nullable();
            $table->string('urbanization_name',100)->nullable();
            $table->string('house_type',100)->nullable();
            $table->boolean('do_you_live_in_sky_crapper')->default(0);
            $table->bigInteger('no_of_floor')->nullable();
            $table->string('your_floor_no')->nullable();
            $table->string('apartment_no',100)->nullable();
            $table->string('room_no',100)->nullable();
            $table->string('bed_no',100)->nullable();
            $table->boolean('living_for_two_years',100)->default(0);

            $table->string('old_house_address',100)->nullable();
            $table->string('old_building_name',100)->nullable();
            $table->string('old_street_name',100)->nullable();
            $table->string('old_state',100)->nullable();
            $table->string('old_city',100)->nullable();
            $table->string('old_town',100)->nullable();
            $table->string('old_township',100)->nullable();
            $table->string('old_parish',100)->nullable();
            $table->string('old_village',100)->nullable();
            $table->string('old_hamlet',100)->nullable();
            $table->string('old_district',100)->nullable();
            $table->string('old_county',100)->nullable();
            $table->string('old_neighborhood_name',100)->nullable();
            $table->string('old_zipcode',100)->nullable();
            $table->string('old_urbanization_name',100)->nullable();
            $table->string('old_house_type',100)->nullable();
            $table->boolean('old_do_you_live_in_sky_crapper')->default(0);
            $table->bigInteger('old_no_of_floor')->nullable();
            $table->string('old_your_floor_no')->nullable();
            $table->string('old_apartment_no',100)->nullable();
            $table->string('old_room_no',100)->nullable();
            $table->string('old_bed_no',100)->nullable();

            $table->bigInteger('primary_area_code')->nullable();
            $table->bigInteger('primary_mobile_number')->nullable();
            $table->bigInteger('alternate_area_code')->nullable();
            $table->bigInteger('alternate_telephone_number')->nullable();
            $table->string('email');
            
            
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
        Schema::dropIfExists('find_me_here');
    }
}
