<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchant_id');
            $table->string('business_legal_name')->nullable();
            $table->string('business_dba_name')->nullable();
            $table->string('business_legal_address')->nullable();
            $table->string('state_legal')->nullable();
            $table->string('city_legal')->nullable();
            $table->string('zip_legal')->nullable();
            $table->string('business_physical_address')->nullable();
            $table->string('zip_physical')->nullable();
            $table->string('state_physical')->nullable();
            $table->string('city_physical')->nullable();
            $table->string('first_name')->nullable();
            $table->string('mi')->nullable();
            $table->string('last_name')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('toll_free_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email_address')->nullable();
            $table->string('federal_tax_id')->nullable();
            $table->string('owner_partner')->nullable();
            $table->string('ownership_first_name')->nullable();
            $table->string('ownership_mi')->nullable();
            $table->string('ownership_last_name')->nullable();
            $table->string('ownership_ssn')->nullable();
            $table->string('ownership_title')->nullable();
            $table->string('ownership_telephone')->nullable();
            $table->float('ownership_percentage')->nullable();
            $table->date('ownership_dob')->nullable();
            $table->string('ownership_home_address')->nullable();
            $table->string('ownership_state')->nullable();
            $table->string('ownership_city')->nullable();
            $table->string('ownership_zip')->nullable();
            $table->string('business_structure')->nullable();
            $table->boolean('home_based_business')->default(0);
            $table->string('num_employees')->nullable();
            $table->string('sales_per_month')->nullable();
            $table->boolean('tier1_merchant')->default(0);
            $table->boolean('tier2_merchant')->default(0);
            $table->boolean('tier3_merchant')->default(0);

            $table->boolean('tier4_merchant_no')->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_account_manager_fn')->nullable();
            $table->string('bank_account_manager_ln')->nullable();
            $table->string('bank_account_manager_address')->nullable();
            $table->string('bank_account_manager_state')->nullable();
            $table->string('bank_account_manager_city')->nullable();
            $table->string('bank_account_manager_zipcode')->nullable();
            $table->string('bank_account_manager_telephone_number')->nullable();
            $table->string('bank_account_manager_email')->nullable();
            $table->string('ein_number')->nullable();
            $table->string('primary_line_of_business')->nullable();
            $table->string('merchant_duns_number')->nullable();
            $table->string('pos_estimated_number')->nullable();
            $table->string('pos_manufacturer')->nullable();
            $table->string('when')->nullable();
            $table->boolean('use_pos')->default(0);
            $table->string('third_party_vendor')->nullable();
            $table->string('third_party_name')->nullable();
            $table->string('third_party_version')->nullable();
            $table->boolean('transactions_third_party')->default(0);
            $table->string('third_party_name_transactions')->nullable();
            $table->boolean('cardholder_data')->default(0);
            $table->boolean('card_data_store_merchant')->default(0);
            $table->boolean('card_data_store_third_party_only')->default(0);
            $table->boolean('card_data_store_both')->default(0);
            $table->boolean('pci_dss_compliant')->default(0);
            $table->string('business_description')->nullable();
            $table->string('qsa_name')->nullable();
            $table->date('compliance_date')->nullable();
            $table->date('last_scan_date')->nullable();

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
        Schema::dropIfExists('merchants');
    }
}
