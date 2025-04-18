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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('old_first_name');
            $table->string('old_last_name');
            $table->date('old_dob');
            $table->string('old_spouse_first_name')->nullable();
            $table->string('old_spouse_last_name')->nullable();
            $table->date('old_spouse_dob')->nullable();
            $table->bigInteger('consumer_id');
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
        //
    }
};
