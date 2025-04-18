<?php

namespace App\Http\Controllers\Admin\Bank;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use Illuminate\Http\Request;

class UpdateMyInfoController extends Controller
{
    public function index()
    {
        $bank = Bank::where('bank_id',session('id'))->first();
        return view('admin.bank.index',compact('bank'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->all() as $key => $value) {
            // Check if the value is "on" or "off" and modify it
            if ($value === 'on') {
                $request[$key] = 1;
            } elseif ($value === 'off') {
                $request[$key] = 0;
            }
        }
       
        Bank::updateOrCreate(['bank_id'=>session('id')], $request->only([
            'bank_id',
            'financial_institution_name',
            'first_name',
            'last_name',
            'primary_job_title',
            'contact_info',
            'acquirers',
            'asset_management_company',
            'bond_brokerage_firm',
            'check_cashing_company',
            'commercial_banks',
            'community_bank',
            'state',
            'community_development_financial_institution',
            'credit_union',
            'discount_brokerage_bonds',
            'discount_brokerage_stocks',
            'face_amount_certificate_company',
            'full_brokerage_bonds',
            'full_brokerage_stocks',
            'hedge_funds',
            'insurance_company',
            'internet_bank',
            'investment_bank',
            'management_investment_company',
            'mortgage_banks',
            'mutual_bank',
            'payday_lender',
            'savings_and_loan',
            'shadow_bank',
            'stock_brokerage_firm',
            'title_company',
            'unit_investment_trusts',
            'charter_type',
            'fi_operate_accross_state',
            'total_asset_size',
            'alternative_investments',
            'auto_loans',
            'bonds',
            'business_banking_accounts',
            'business_banking_loans',
            'car_insurance',
            'casualty_insurance',
            'checking_account',
            'commercial_appraisals',
            'commercial_paper',
            'commercial_real_estate_loans',
            'correspondence_banking',
            'corporate_reorganizations',
            'credit_cards',
            'death_insurance',
            'debit_cards',
            'demand_deposits',
            'disability_insurance',
            'equity_offerings',
            'exchange_traded_funds',
            'fire_insurance',
            'health_insurance',
            'initial_public_offerings',
            'institutional_client_broker',
            'insurance_products',
            'investment_banking',
            'mergers_and_acquisitions_facilitator',
            'mortgage_loans',
            'mutual_funds_closed_ended',
            'mutual_funds_open_ended',
            'personal_loans',
            'property_insurance',
            'public_private_share_offerings',
            'residential_appraisals',
            'residential_real_estate_loans',
            'savings_accounts',
            'stocks',
            'swift',
            'tax_deferred_annuity',
            'trading',
            'underwriting_debit',
            'wealth_advisor_check',
            'wire_transfers',
            'bank_identification_no',
            'daily_trade_volume',
            'mortage_loans',
            'credit_card',
            'debit_card',
            'wealth_advisor',
            'help_description',
        ]));

        return back()->with('success','Information Saved successfully');
    }
}
