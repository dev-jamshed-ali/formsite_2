<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id');
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employer_identification_number')->nullable();
            $table->string('anual_salary_last_year')->nullable();
            $table->boolean('are_you_active_memeber_of_labour_union')->default(0);
            $table->string('labor_union_name')->nullable();
            $table->string('your_union_membership_number')->nullable();
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
        Schema::dropIfExists('employment_information');
    }
}
