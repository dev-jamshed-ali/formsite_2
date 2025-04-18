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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->double('old_value');
            $table->double('score_value');
            $table->double('new_value');
            $table->enum('change_type', ['increment', 'decrement']);
            $table->enum('change_due_to', ['housing', 'positive_verbal', 'occupation', 'income']);
            $table->text('change_reason');
            $table->timestamps();
            // Foreign key constraint 'admins' table
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
};
