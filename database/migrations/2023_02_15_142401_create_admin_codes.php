<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('code');
            $table->timestamps();
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->string('phone')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_codes');
    }
}
