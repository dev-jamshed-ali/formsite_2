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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bank_id');
            $table->string('financial_institution_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('primary_job_title')->nullable();
            $table->string('contact_info')->nullable();
            $table->boolean('acquirers')->default(0);
            $table->boolean('asset_management_company')->default(0);
            $table->boolean('bond_brokerage_firm')->default(0);
            $table->boolean('check_cashing_company')->default(0);
            $table->boolean('commercial_banks')->default(0);
            $table->boolean('community_bank')->default(0);
            $table->boolean('community_development_financial_institution')->default(0);
            $table->boolean('credit_union')->default(0);
            $table->boolean('discount_brokerage_bonds')->default(0);
            $table->boolean('discount_brokerage_stocks')->default(0);
            $table->boolean('face_amount_certificate_company')->default(0);
            $table->boolean('full_brokerage_bonds')->default(0);
            $table->boolean('full_brokerage_stocks')->default(0);
            $table->boolean('hedge_funds')->default(0);
            $table->boolean('insurance_company')->default(0);
            $table->boolean('internet_bank')->default(0);
            $table->boolean('investment_bank')->default(0);
            $table->boolean('management_investment_company')->default(0);
            $table->boolean('mortgage_banks')->default(0);
            $table->boolean('mutual_bank')->default(0);
            $table->boolean('payday_lender')->default(0);
            $table->boolean('savings_and_loan')->default(0);
            $table->boolean('shadow_bank')->default(0);
            $table->boolean('stock_brokerage_firm')->default(0);
            $table->boolean('title_company')->default(0);
            $table->boolean('unit_investment_trusts')->default(0);
            $table->integer('charter_type')->default(0);
            $table->integer('fi_operate_accross_state')->default(0);
            $table->string('total_asset_size')->nullable();
            $table->boolean('alternative_investments')->default(0);
            $table->boolean('auto_loans')->default(0);
            $table->boolean('bonds')->default(0);
            $table->boolean('business_banking_accounts')->default(0);
            $table->boolean('business_banking_loans')->default(0);
            $table->boolean('car_insurance')->default(0);
            $table->boolean('casualty_insurance')->default(0);
            $table->boolean('checking_account')->default(0);
            $table->boolean('commercial_appraisals')->default(0);
            $table->boolean('commercial_paper')->default(0);
            $table->boolean('commercial_real_estate_loans')->default(0);
            $table->boolean('correspondence_banking')->default(0);
            $table->boolean('corporate_reorganizations')->default(0);
            $table->boolean('credit_cards')->default(0);
            $table->boolean('death_insurance')->default(0);
            $table->boolean('debit_cards')->default(0);
            $table->boolean('demand_deposits')->default(0);
            $table->boolean('disability_insurance')->default(0);
            $table->boolean('equity_offerings')->default(0);
            $table->boolean('exchange_traded_funds')->default(0);
            $table->boolean('fire_insurance')->default(0);
            $table->boolean('health_insurance')->default(0);
            $table->boolean('initial_public_offerings')->default(0);
            $table->boolean('institutional_client_broker')->default(0);
            $table->boolean('insurance_products')->default(0);
            $table->boolean('investment_banking')->default(0);
            $table->boolean('mergers_and_acquisitions_facilitator')->default(0);
            $table->boolean('mortgage_loans')->default(0);
            $table->boolean('mutual_funds_closed_ended')->default(0);
            $table->boolean('mutual_funds_open_ended')->default(0);
            $table->boolean('personal_loans')->default(0);
            $table->boolean('property_insurance')->default(0);
            $table->boolean('public_private_share_offerings')->default(0);
            $table->boolean('residential_appraisals')->default(0);
            $table->boolean('residential_real_estate_loans')->default(0);
            $table->boolean('savings_accounts')->default(0);
            $table->boolean('stocks')->default(0);
            $table->boolean('swift')->default(0);
            $table->boolean('tax_deferred_annuity')->default(0);
            $table->boolean('trading')->default(0);
            $table->boolean('underwriting_debit')->default(0);
            $table->boolean('wealth_advisor_check')->default(0);
            $table->boolean('wire_transfers')->default(0);
            $table->string('bank_identification_no')->nullable(0);
            $table->string('daily_trade_volume')->nullable(0);
            $table->string('mortage_loans')->nullable(0);
            $table->string('credit_card')->nullable(0);
            $table->string('debit_card')->nullable(0);
            $table->string('state')->nullable(0);
            $table->string('wealth_advisor')->nullable(0);
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
        Schema::dropIfExists('banks');
    }
};
