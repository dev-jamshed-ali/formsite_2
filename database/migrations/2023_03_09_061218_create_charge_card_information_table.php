<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargeCardInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_card_information', function (Blueprint $table) {
            $table->id();
            $table->integer('consumer_id');
            // $table->string('charge_card_to_protect_1');
            $table->string('card_number_1');
            $table->string('nickname_1')->nullable();
            $table->string('primary_first_name_1')->nullable();
            $table->string('primary_mi_1')->nullable();
            $table->string('primary_last_name_1')->nullable();
            $table->string('card_has_secondary_auth_user_1')->default(0);
            $table->string('secondary_first_name_1')->nullable();
            $table->string('secondary_last_name_1')->nullable();
            $table->string('secondary_mi_1')->nullable();
            $table->string('secondary_card_holder_relationship_1')->nullable();
            $table->string('name_of_bank_1')->nullable();
            $table->date('expiry_date_1')->nullable();

            // $table->string('charge_card_to_protect_2');
            $table->string('card_number_2')->nullable();
            $table->string('nickname_2')->nullable();
            $table->string('primary_first_name_2')->nullable();
            $table->string('primary_mi_2')->nullable();
            $table->string('primary_last_name_2')->nullable();
            $table->string('card_has_secondary_auth_user_2')->default(0);
            $table->string('secondary_first_name_2')->nullable();
            $table->string('secondary_last_name_2')->nullable();
            $table->string('secondary_mi_2')->nullable();
            $table->string('secondary_card_holder_relationship_2')->nullable();
            $table->string('name_of_bank_2')->nullable();
            $table->date('expiry_date_2')->nullable();


            // $table->string('charge_card_to_protect_3');
            $table->string('card_number_3')->nullable();
            $table->string('nickname_3')->nullable();
            $table->string('primary_first_name_3')->nullable();
            $table->string('primary_mi_3')->nullable();
            $table->string('primary_last_name_3')->nullable();
            $table->string('card_has_secondary_auth_user_3')->default(0);
            $table->string('secondary_first_name_3')->nullable();
            $table->string('secondary_last_name_3')->nullable();
            $table->string('secondary_mi_3')->nullable();
            $table->string('secondary_card_holder_relationship_3')->nullable();
            $table->string('name_of_bank_3')->nullable();
            $table->date('expiry_date_3')->nullable();


            // $table->string('charge_card_to_protect_4');
            $table->string('card_number_4')->nullable();
            $table->string('nickname_4')->nullable();
            $table->string('primary_first_name_4')->nullable();
            $table->string('primary_mi_4')->nullable();
            $table->string('primary_last_name_4')->nullable();
            $table->string('card_has_secondary_auth_user_4')->default(0);
            $table->string('secondary_first_name_4')->nullable();
            $table->string('secondary_last_name_4')->nullable();
            $table->string('secondary_mi_4')->nullable();
            $table->string('secondary_card_holder_relationship_4')->nullable();
            $table->string('name_of_bank_4')->nullable();
            $table->date('expiry_date_4')->nullable();



            // $table->string('charge_card_to_protect_5');
            $table->string('card_number_5')->nullable();
            $table->string('nickname_5')->nullable();
            $table->string('primary_first_name_5')->nullable();
            $table->string('primary_mi_5')->nullable();
            $table->string('primary_last_name_5')->nullable();
            $table->string('card_has_secondary_auth_user_5')->default(0);
            $table->string('secondary_first_name_5')->nullable();
            $table->string('secondary_last_name_5')->nullable();
            $table->string('secondary_mi_5')->nullable();
            $table->string('secondary_card_holder_relationship_5')->nullable();
            $table->string('name_of_bank_5')->nullable();
            $table->date('expiry_date_5')->nullable();



       
            
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
        Schema::dropIfExists('charge_card_information');
    }
}
