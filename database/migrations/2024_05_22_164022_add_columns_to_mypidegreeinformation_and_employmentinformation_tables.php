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
        Schema::table('my_pidegree_information', function (Blueprint $table) {
            $table->text('guid')->nullable(); // Assuming guid is a UUID and can be null
            $table->integer('eligibility_protection')->default(0); // Assuming eligibility_protection is a boolean
        });

        Schema::table('employment_information', function (Blueprint $table) {
            $table->date('membership_start')->nullable(); // Assuming membership_start is a date and can be null
            $table->date('membership_end')->nullable(); // Assuming membership_end is a date and can be null
            $table->text('union_contact_info')->nullable(); // Assuming union_contact_info is text and can be null
        });
        Schema::table('charge_card_information', function (Blueprint $table) {
            $table->integer('cvc_1')->nullable(); 
            $table->integer('cvc_2')->nullable(); 
            $table->integer('cvc_3')->nullable(); 
            $table->integer('cvc_4')->nullable(); 
            $table->integer('cvc_5')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_pidegree_information', function (Blueprint $table) {
            $table->dropColumn('guid');
            $table->dropColumn('eligibility_protection');
        });

        Schema::table('employment_information', function (Blueprint $table) {
            $table->dropColumn('membership_start');
            $table->dropColumn('membership_end');
            $table->dropColumn('union_contact_info');
        });
        Schema::table('charge_card_information', function (Blueprint $table) {
            $table->dropColumn('cvc_1'); 
            $table->dropColumn('cvc_2'); 
            $table->dropColumn('cvc_3'); 
            $table->dropColumn('cvc_4'); 
            $table->dropColumn('cvc_5'); 
        });
    }
};
