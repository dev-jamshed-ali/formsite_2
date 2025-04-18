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
        Schema::table('charge_card_information', function (Blueprint $table) {
            // Drop the specified columns
            $table->dropColumn([
                'card_number_1', 'nickname_1', 'primary_first_name_1', 'primary_mi_1', 'primary_last_name_1',
                'card_has_secondary_auth_user_1', 'secondary_first_name_1', 'secondary_last_name_1', 'secondary_mi_1',
                'secondary_card_holder_relationship_1', 'name_of_bank_1', 'expiry_date_1',
                'card_number_2', 'nickname_2', 'primary_first_name_2', 'primary_mi_2', 'primary_last_name_2',
                'card_has_secondary_auth_user_2', 'secondary_first_name_2', 'secondary_last_name_2', 'secondary_mi_2',
                'secondary_card_holder_relationship_2', 'name_of_bank_2', 'expiry_date_2',
                'card_number_3', 'nickname_3', 'primary_first_name_3', 'primary_mi_3', 'primary_last_name_3',
                'card_has_secondary_auth_user_3', 'secondary_first_name_3', 'secondary_last_name_3', 'secondary_mi_3',
                'secondary_card_holder_relationship_3', 'name_of_bank_3', 'expiry_date_3',
                'card_number_4', 'nickname_4', 'primary_first_name_4', 'primary_mi_4', 'primary_last_name_4',
                'card_has_secondary_auth_user_4', 'secondary_first_name_4', 'secondary_last_name_4', 'secondary_mi_4',
                'secondary_card_holder_relationship_4', 'name_of_bank_4', 'expiry_date_4',
                'card_number_5', 'nickname_5', 'primary_first_name_5', 'primary_mi_5', 'primary_last_name_5',
                'card_has_secondary_auth_user_5', 'secondary_first_name_5', 'secondary_last_name_5', 'secondary_mi_5',
                'secondary_card_holder_relationship_5', 'name_of_bank_5', 'expiry_date_5',
                'cvc_1', 'cvc_2', 'cvc_3', 'cvc_4', 'cvc_5',
            ]);

            // Add new columns
            $table->string('card_number')->nullable();
            $table->string('nickname')->nullable();
            $table->string('primary_first_name')->nullable();
            $table->string('primary_last_name')->nullable();
            $table->string('cvc')->nullable();
            $table->string('name_of_bank')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('card_has_card_has_secondary_auth_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charge_card_information', function (Blueprint $table) {
            // Drop the newly added columns
            $table->dropColumn([
                'card_number', 'nickname', 'primary_first_name', 'primary_last_name', 'cvc',
                'name_of_bank', 'expiry_date', 'card_has_card_has_secondary_auth_user',
            ]);

            // Re-add the dropped columns
            $table->string('card_number_1')->nullable();
            $table->string('nickname_1')->nullable();
            $table->string('primary_first_name_1')->nullable();
            $table->string('primary_mi_1')->nullable();
            $table->string('primary_last_name_1')->nullable();
            $table->boolean('card_has_secondary_auth_user_1')->nullable();
            $table->string('secondary_first_name_1')->nullable();
            $table->string('secondary_last_name_1')->nullable();
            $table->string('secondary_mi_1')->nullable();
            $table->string('secondary_card_holder_relationship_1')->nullable();
            $table->string('name_of_bank_1')->nullable();
            $table->date('expiry_date_1')->nullable();
            $table->string('card_number_2')->nullable();
            $table->string('nickname_2')->nullable();
            $table->string('primary_first_name_2')->nullable();
            $table->string('primary_mi_2')->nullable();
            $table->string('primary_last_name_2')->nullable();
            $table->boolean('card_has_secondary_auth_user_2')->nullable();
            $table->string('secondary_first_name_2')->nullable();
            $table->string('secondary_last_name_2')->nullable();
            $table->string('secondary_mi_2')->nullable();
            $table->string('secondary_card_holder_relationship_2')->nullable();
            $table->string('name_of_bank_2')->nullable();
            $table->date('expiry_date_2')->nullable();
            $table->string('card_number_3')->nullable();
            $table->string('nickname_3')->nullable();
            $table->string('primary_first_name_3')->nullable();
            $table->string('primary_mi_3')->nullable();
            $table->string('primary_last_name_3')->nullable();
            $table->boolean('card_has_secondary_auth_user_3')->nullable();
            $table->string('secondary_first_name_3')->nullable();
            $table->string('secondary_last_name_3')->nullable();
            $table->string('secondary_mi_3')->nullable();
            $table->string('secondary_card_holder_relationship_3')->nullable();
            $table->string('name_of_bank_3')->nullable();
            $table->date('expiry_date_3')->nullable();
            $table->string('card_number_4')->nullable();
            $table->string('nickname_4')->nullable();
            $table->string('primary_first_name_4')->nullable();
            $table->string('primary_mi_4')->nullable();
            $table->string('primary_last_name_4')->nullable();
            $table->boolean('card_has_secondary_auth_user_4')->nullable();
            $table->string('secondary_first_name_4')->nullable();
            $table->string('secondary_last_name_4')->nullable();
            $table->string('secondary_mi_4')->nullable();
            $table->string('secondary_card_holder_relationship_4')->nullable();
            $table->string('name_of_bank_4')->nullable();
            $table->date('expiry_date_4')->nullable();
            $table->string('card_number_5')->nullable();
            $table->string('nickname_5')->nullable();
            $table->string('primary_first_name_5')->nullable();
            $table->string('primary_mi_5')->nullable();
            $table->string('primary_last_name_5')->nullable();
            $table->boolean('card_has_secondary_auth_user_5')->nullable();
            $table->string('secondary_first_name_5')->nullable();
    });
}
};
