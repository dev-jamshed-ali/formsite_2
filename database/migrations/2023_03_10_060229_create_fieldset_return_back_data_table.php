<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsetReturnBackDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fieldset_return_back_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id');
            $table->string('module');
            $table->string('fieldset_id');
            $table->timestamps();

            $table->index(['admin_id','module']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fieldset_return_back_data');
    }
}
