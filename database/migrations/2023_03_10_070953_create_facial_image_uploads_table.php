<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacialImageUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facial_image_uploads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consumer_id')->index();
            $table->string('facial_image')->nullable();
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
        Schema::dropIfExists('facial_image_uploads');
    }
}
