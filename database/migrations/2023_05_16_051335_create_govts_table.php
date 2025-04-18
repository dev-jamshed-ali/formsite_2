<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('govts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('govt_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('title')->nullable();
            $table->string('building_no')->nullable();
            $table->string('street_name')->nullable();
            $table->string('urbanization_name')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country_code')->nullable();
            $table->string('primary_telephone_no')->nullable();
            $table->string('agency')->nullable();
            $table->string('agency_description')->nullable();
            $table->string('agency_name')->nullable();
            $table->boolean('budgeting_authority')->nullable();
            $table->string('budgeting_amount')->nullable();
            $table->text('help_description')->nullable();
        
            
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
        Schema::dropIfExists('govts');
    }
};
