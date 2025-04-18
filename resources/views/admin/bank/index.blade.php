@extends('admin.admin_layouts')

@section('admin_content')


        <div class="col-lg-12 p-3 col-md-12">
            <form id="update_my_info_form" action="{{ route('admin.bank.update_my_info.store') }}" method="post"
                role="form">
                @csrf
                <div class="form-wizard">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input name="financial_institution_name" type="text" class="form-control wizard-required"
                                    id="financial_institution_name" value="{{ $bank->financial_institution_name ?? '' }}">
                                <label for="financial_institution_name" class="mb-2">1. What is the Name
                                    of your Financial Institution (FI)?</label>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">Who is Primary contact?</h4>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input name="first_name" type="text" class="form-control wizard-required"
                                    value="{{ $bank->first_name ?? '' }}">
                                <label class="mb-2">First Name</label>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input name="last_name" type="text" class="form-control wizard-required"
                                    value="{{ $bank->last_name ?? '' }}">
                                <label for="last_name" class="mb-2">Last Name</label>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <select name="primary_job_title" class="form-control wizard-required" id="primary_job_title">
                                <option></option>

                                <option @if (!empty($bank) && $bank->primary_job_title == 'bank_credit_clerk') selected @endif value="bank_credit_clerk">Bank
                                    Credit Clerk</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bank_credit_clerk') selected @endif value="bank_credit_clerk">Bank
                                    Credit Clerk</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bank_foreign_exchange_dealer') selected @endif
                                    value="bank_foreign_exchange_dealer">Bank Foreign-Exchange Dealer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bank_teller') selected @endif value="bank_teller">Bank Teller
                                </option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bond_sales_manager') selected @endif value="bond_sales_manager">Bond
                                    Sales Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bond_sales_officer') selected @endif value="bond_sales_officer">Bond
                                    Sales Officer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'bond_trading_manager') selected @endif value="bond_trading_manager">Bond
                                    Trading Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_manager_insurance') selected @endif value="branch_manager_insurance">
                                    Branch Manager – Insurance</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_manager_trainee') selected @endif value="branch_manager_trainee">
                                    Branch Manager Trainee</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_manager') selected @endif value="branch_manager">Branch
                                    Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_review_specialist') selected @endif
                                    value="branch_review_specialist">Branch Review Specialist</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_review_team_lead') selected @endif value="branch_review_team_lead">
                                    Branch Review Team Lead</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_service_representative_i') selected @endif
                                    value="branch_service_representative_i">Branch Service Representative I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_service_representative_ii') selected @endif
                                    value="branch_service_representative_ii">Branch Service Representative II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_service_representative_iii') selected @endif
                                    value="branch_service_representative_iii">Branch Service Representative III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'branch_service_specialist') selected @endif
                                    value="branch_service_specialist">Branch Service Specialist</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budget_analyst_i') selected @endif value="budget_analyst_i">Budget
                                    Analyst I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budget_analyst_ii') selected @endif value="budget_analyst_ii">Budget
                                    Analyst II</option>


                                <option @if (!empty($bank) && $bank->primary_job_title == 'budget_analyst_iii') selected @endif value="budget_analyst_iii">
                                    Budget Analyst III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budget_analyst_iv') selected @endif value="budget_analyst_iv">Budget
                                    Analyst IV</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budgeting_supervisor_i') selected @endif value="budgeting_supervisor_i">
                                    Budgeting Supervisor I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budgeting_supervisor_ii') selected @endif value="budgeting_supervisor_ii">
                                    Budgeting Supervisor II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'budgeting_supervisor_iii') selected @endif
                                    value="budgeting_supervisor_iii">Budgeting Supervisor III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_banking_development_officer_i') selected @endif
                                    value="business_banking_development_officer_i">Business Banking Development Officer I
                                </option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_banking_manager_i') selected @endif
                                    value="business_banking_manager_i">Business Banking Manager I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_banking_manager_ii') selected @endif
                                    value="business_banking_manager_ii">Business Banking Manager II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_development_officer') selected @endif
                                    value="business_development_officer">Business Development Officer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_development_officer_senior') selected @endif
                                    value="business_development_officer_senior">Business Development Officer (Select
                                    Customer) Senior</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_systems_executive') selected @endif
                                    value="business_systems_executive">Business Systems Executive</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_systems_manager') selected @endif
                                    value="business_systems_manager">Business Systems Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'business_systems_officer') selected @endif
                                    value="business_systems_officer">Business Systems Officer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_manager') selected @endif value="cash_management_manager">
                                    Cash Management Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_officer_i') selected @endif
                                    value="cash_management_officer_i">Cash Management Officer I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_service_manager') selected @endif
                                    value="cash_management_service_manager">Cash Management Service Manager</option>


                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_service_representative_i') selected @endif
                                    value="cash_management_service_representative_i">Cash Management Service Representative
                                    I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_service_representative_ii') selected @endif
                                    value="cash_management_service_representative_ii">Cash Management Service Representative
                                    II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_service_representative_iii') selected @endif
                                    value="cash_management_service_representative_iii">Cash Management Service
                                    Representative III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'cash_management_service_supervisor') selected @endif
                                    value="cash_management_service_supervisor">Cash Management Service Supervisor</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'check_collections_manager') selected @endif
                                    value="check_collections_manager">Check Collections Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'check_processing_manager') selected @endif
                                    value="check_processing_manager">Check Processing Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'check_processor') selected @endif value="check_processor">Check
                                    Processor</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'checking_debit_card_business_manager') selected @endif
                                    value="checking_debit_card_business_manager">Checking / Debit Card Business Manager
                                </option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'chief_lending_officer_client_services_representative') selected @endif
                                    value="chief_lending_officer_client_services_representative">Chief Lending Officer
                                    Client Services Representative</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collateral_appraiser_i') selected @endif value="collateral_appraiser_i">
                                    Collateral Appraiser I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collateral_appraiser_ii') selected @endif value="collateral_appraiser_ii">
                                    Collateral Appraiser II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collateral_manager') selected @endif value="collateral_manager">
                                    Collateral Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collections_representative_i') selected @endif
                                    value="collections_representative_i">Collections Representative I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collections_representative_ii') selected @endif
                                    value="collections_representative_ii">Collections Representative II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'collections_representative_iii') selected @endif
                                    value="collections_representative_iii">Collections Representative III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'commercial_credit_analyst_i') selected @endif
                                    value="commercial_credit_analyst_i">Commercial Credit Analyst I</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'commercial_credit_analyst_ii') selected @endif
                                    value="commercial_credit_analyst_ii">Commercial Credit Analyst II</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'commercial_credit_analyst_iii') selected @endif
                                    value="commercial_credit_analyst_iii">Commercial Credit Analyst III</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'commercial_loan_officer') selected @endif value="commercial_loan_officer">
                                    Commercial Loan Officer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'float_manager') selected @endif value="float_manager">Float
                                    Manager</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'floor_banker') selected @endif value="floor_banker">Floor
                                    Banker</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'head_bank_teller') selected @endif value="head_bank_teller">Head
                                    Bank Teller</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'loan_officer') selected @endif value="loan_officer">Loan
                                    Officer</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'mortgage_originator') selected @endif value="mortgage_originator">
                                    Mortgage Originator</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'mortgage_payment_processing_clerk') selected @endif
                                    value="mortgage_payment_processing_clerk">Mortgage Payment Processing Clerk</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'mortgage_processor') selected @endif value="mortgage_processor">
                                    Mortgage Processor</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'mortgage_underwriter') selected @endif value="mortgage_underwriter">
                                    Mortgage Underwriter</option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'operations') selected @endif value="operations">Operations
                                </option>
                                <option @if (!empty($bank) && $bank->primary_job_title == 'personal_loan_officer') selected @endif value="personal_loan_officer">
                                    Personal Loan Officer</option>


                            </select>
                            <label for="primary_job_title" class="mb-2">3. What is the primary
                                contact’s Job Title?</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <select name="contact_info" class="form-control wizard-required" id="contact_info">
                                <option></option>
                                <option @if (!empty($bank) && $bank->contact_info == 'telephone_number') selected @endif value="telephone_number">
                                    Telephone Number</option>
                                <option @if (!empty($bank) && $bank->contact_info == 'fax_number') selected @endif value="fax_number">Fax Number
                                </option>
                                <option @if (!empty($bank) && $bank->contact_info == 'e_mail_address') selected @endif value="e_mail_address">E-Mail
                                    Address</option>
                                <option @if (!empty($bank) && $bank->contact_info == 'alternate_telephone_number') selected @endif
                                    value="alternate_telephone_number">Alternate Telephone Number</option>
                                <option @if (!empty($bank) && $bank->contact_info == 'fax_number_if_different_than_primary') selected @endif
                                    value="fax_number_if_different_than_primary">Fax Number (If Different Than Primary)
                                </option>
                                <option @if (!empty($bank) && $bank->contact_info == 'mobile') selected @endif value="mobile">Mobile</option>
                                <option @if (!empty($bank) && $bank->contact_info == 'e_mail_address') selected @endif value="e_mail_address">E-Mail
                                    Address</option>
                            </select>
                            <label for="contact_info" class="mb-2">4. Who is the your contact
                                info?</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    </div>
      
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <h4 class="stepper-right-f1 mb-3">What Type of Financial Institution (FI) do you represent?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 ml-3">
                            <div class="form-check">
                                <input type="hidden" value="0" name="acquirers" />

                                <input type="checkbox" class="form-check-input" name="acquirers" id="acquirers"
                                    @if (!empty($bank) && $bank->acquirers == 1) checked @endif>
                                <label class="form-check-label" for="acquirers">Acquirers</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="asset_management_company" />
                                <input type="checkbox" class="form-check-input" name="asset_management_company"
                                    id="asset_management_company" @if (!empty($bank) && $bank->asset_management_company == 1) checked @endif>
                                <label class="form-check-label" for="asset_management_company">Asset Management
                                    Company</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="bond_brokerage_firm" />
                                <input type="checkbox" class="form-check-input" name="bond_brokerage_firm"
                                    id="bond_brokerage_firm" @if (!empty($bank) && $bank->bond_brokerage_firm == 1) checked @endif>
                                <label class="form-check-label" for="bond_brokerage_firm">Bond Brokerage Firm</label>
                            </div>



                            <div class="form-check">
                                <input type="hidden" value="0" name="check_cashing_company" />
                                <input type="checkbox" class="form-check-input" name="check_cashing_company"
                                    id="check_cashing_company" @if (!empty($bank) && $bank->check_cashing_company == 1) checked @endif>
                                <label class="form-check-label" for="check_cashing_company">Check Cashing Company</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="commercial_banks" />
                                <input type="checkbox" class="form-check-input" name="commercial_banks"
                                    id="commercial_banks" @if (!empty($bank) && $bank->commercial_banks == 1) checked @endif>
                                <label class="form-check-label" for="commercial_banks">Commercial banks</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="community_bank" />
                                <input type="checkbox" class="form-check-input" name="community_bank"
                                    id="community_bank" @if (!empty($bank) && $bank->community_bank == 1) checked @endif>
                                <label class="form-check-label" for="community_bank">Community Bank</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="community_development_financial_institution" />
                                <input type="checkbox" class="form-check-input"
                                    name="community_development_financial_institution"
                                    id="community_development_financial_institution"
                                    @if (!empty($bank) && $bank->community_development_financial_institution == 1) checked @endif>
                                <label class="form-check-label"
                                    for="community_development_financial_institution">Community Development Financial
                                    Institution</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="credit_union" />
                                <input type="checkbox" class="form-check-input" name="credit_union" id="credit_union"
                                    @if (!empty($bank) && $bank->credit_union == 1) checked @endif>
                                <label class="form-check-label" for="credit_union">Credit Union</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="discount_brokerage_bonds" />
                                <input type="checkbox" class="form-check-input" name="discount_brokerage_bonds"
                                    id="discount_brokerage_bonds" @if (!empty($bank) && $bank->discount_brokerage_bonds == 1) checked @endif>
                                <label class="form-check-label" for="discount_brokerage_bonds">Discount Brokerage
                                    Bonds</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="discount_brokerage_stocks" />
                                <input type="checkbox" class="form-check-input" name="discount_brokerage_stocks"
                                    id="discount_brokerage_stocks" @if (!empty($bank) && $bank->discount_brokerage_stocks == 1) checked @endif>
                                <label class="form-check-label" for="discount_brokerage_stocks">Discount Brokerage
                                    Stocks</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="face_amount_certificate_company" />
                                <input type="checkbox" class="form-check-input" name="face_amount_certificate_company"
                                    id="face_amount_certificate_company"
                                    @if (!empty($bank) && $bank->face_amount_certificate_company == 1) checked @endif>
                                <label class="form-check-label" for="face_amount_certificate_company">Face Amount
                                    Certificate Company</label>
                            </div>



                            <div class="form-check">
                                <input type="hidden" value="0" name="full_brokerage_bonds" />
                                <input type="checkbox" class="form-check-input" name="full_brokerage_bonds"
                                    id="full_brokerage_bonds" @if (!empty($bank) && $bank->full_brokerage_bonds == 1) checked @endif>
                                <label class="form-check-label" for="full_brokerage_bonds">Full Brokerage Bonds</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="full_brokerage_stocks" />
                                <input type="checkbox" class="form-check-input" name="full_brokerage_stocks"
                                    id="full_brokerage_stocks" @if (!empty($bank) && $bank->full_brokerage_stocks == 1) checked @endif>
                                <label class="form-check-label" for="full_brokerage_stocks">Full Brokerage Stocks</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="hedge_funds" />
                                <input type="checkbox" class="form-check-input" name="hedge_funds" id="hedge_funds"
                                    @if (!empty($bank) && $bank->hedge_funds == 1) checked @endif>
                                <label class="form-check-label" for="hedge_funds">Hedge Funds</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="insurance_company" />
                                <input type="checkbox" class="form-check-input" name="insurance_company"
                                    id="insurance_company" @if (!empty($bank) && $bank->insurance_company == 1) checked @endif>
                                <label class="form-check-label" for="insurance_company">Insurance Company</label>
                            </div>


                            <div class="form-check">
                                <input type="hidden" value="0" name="internet_bank" />
                                <input type="checkbox" class="form-check-input" name="internet_bank" id="internet_bank"
                                    @if (!empty($bank) && $bank->internet_bank == 1) checked @endif>
                                <label class="form-check-label" for="internet_bank">Internet Bank</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="investment_bank" />
                                <input type="checkbox" class="form-check-input" name="investment_bank"
                                    id="investment_bank" @if (!empty($bank) && $bank->investment_bank == 1) checked @endif>
                                <label class="form-check-label" for="investment_bank">Investment Bank</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="management_investment_company" />
                                <input type="checkbox" class="form-check-input" name="management_investment_company"
                                    id="management_investment_company" @if (!empty($bank) && $bank->management_investment_company == 1) checked @endif>
                                <label class="form-check-label" for="management_investment_company">Management Investment
                                    Company</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="mortgage_banks" />
                                <input type="checkbox" class="form-check-input" name="mortgage_banks"
                                    id="mortgage_banks" @if (!empty($bank) && $bank->mortgage_banks == 1) checked @endif>
                                <label class="form-check-label" for="mortgage_banks">Mortgage Banks</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="mutual_bank" />
                                <input type="checkbox" class="form-check-input" name="mutual_bank" id="mutual_bank"
                                    @if (!empty($bank) && $bank->mutual_bank == 1) checked @endif>
                                <label class="form-check-label" for="mutual_bank">Mutual Bank</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="payday_lender" />
                                <input type="checkbox" class="form-check-input" name="payday_lender" id="payday_lender"
                                    @if (!empty($bank) && $bank->payday_lender == 1) checked @endif>
                                <label class="form-check-label" for="payday_lender">Payday Lender</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="savings_and_loan" />
                                <input type="checkbox" class="form-check-input" name="savings_and_loan"
                                    id="savings_and_loan" @if (!empty($bank) && $bank->savings_and_loan == 1) checked @endif>
                                <label class="form-check-label" for="savings_and_loan">Savings & Loan</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="shadow_bank" />
                                <input type="checkbox" class="form-check-input" name="shadow_bank" id="shadow_bank"
                                    @if (!empty($bank) && $bank->shadow_bank == 1) checked @endif>
                                <label class="form-check-label" for="shadow_bank">Shadow Bank</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="stock_brokerage_firm" />
                                <input type="checkbox" class="form-check-input" name="stock_brokerage_firm"
                                    id="stock_brokerage_firm" @if (!empty($bank) && $bank->stock_brokerage_firm == 1) checked @endif>
                                <label class="form-check-label" for="stock_brokerage_firm">Stock Brokerage Firm</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="title_company" />
                                <input type="checkbox" class="form-check-input" name="title_company" id="title_company"
                                    @if (!empty($bank) && $bank->title_company == 1) checked @endif>
                                <label class="form-check-label" for="title_company">Title Company</label>
                            </div>

                            <div class="form-check">
                                <input type="hidden" value="0" name="unit_investment_trusts" />
                                <input type="checkbox" class="form-check-input" name="unit_investment_trusts"
                                    id="unit_investment_trusts" @if (!empty($bank) && $bank->unit_investment_trusts == 1) checked @endif>
                                <label class="form-check-label" for="unit_investment_trusts">Unit Investment Trusts
                                    (UIT)</label>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="charter_type">6. What Type of Charter is Your FI?</label>
                            <div class="wizard-form-radio">
                                <input name="charter_type" value="1" type="radio" id="federal_charter"
                                    @if (!empty($bank) && $bank->charter_type == 1) checked @endif>
                                <label for="federal_charter">Federal</label>
                            </div>
                            <div class="wizard-form-radio">
                                <input name="charter_type" value="0" type="radio" id="state_charter"
                                    @if (empty($bank) || $bank->charter_type == 0) checked @endif>
                                <label for="state_charter">State</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <select class="form-control" name="state" id="state">
                                <option>Select State</option>
                                <option value="Alabama" {{ optional($bank)->state == 'Alabama' ? 'selected' : '' }}>Alabama</option>
                                <option value="Alaska" {{ optional($bank)->state == 'Alaska' ? 'selected' : '' }}>Alaska</option>
                                <option value="Arizona" {{ optional($bank)->state == 'Arizona' ? 'selected' : '' }}>Arizona</option>
                                <option value="Arkansas" {{ optional($bank)->state == 'Arkansas' ? 'selected' : '' }}>Arkansas</option>
                                <option value="California" {{ optional($bank)->state == 'California' ? 'selected' : '' }}>California</option>
                                <option value="Colorado" {{ optional($bank)->state == 'Colorado' ? 'selected' : '' }}>Colorado</option>
                                <option value="Connecticut" {{ optional($bank)->state == 'Connecticut' ? 'selected' : '' }}>Connecticut</option>
                                <option value="Delaware" {{ optional($bank)->state == 'Delaware' ? 'selected' : '' }}>Delaware</option>
                                <option value="District Of Columbia" {{ optional($bank)->state == 'District Of Columbia' ? 'selected' : '' }}>District Of Columbia</option>
                                <option value="Florida" {{ optional($bank)->state == 'Florida' ? 'selected' : '' }}>Florida</option>
                                <option value="Georgia" {{ optional($bank)->state == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                <option value="Hawaii" {{ optional($bank)->state == 'Hawaii' ? 'selected' : '' }}>Hawaii</option>
                                <option value="Idaho" {{ optional($bank)->state == 'Idaho' ? 'selected' : '' }}>Idaho</option>
                                <option value="Illinois" {{ optional($bank)->state == 'Illinois' ? 'selected' : '' }}>Illinois</option>
                                <option value="Indiana" {{ optional($bank)->state == 'Indiana' ? 'selected' : '' }}>Indiana</option>
                                <option value="Iowa" {{ optional($bank)->state == 'Iowa' ? 'selected' : '' }}>Iowa</option>
                                <option value="Kansas" {{ optional($bank)->state == 'Kansas' ? 'selected' : '' }}>Kansas</option>
                                <option value="Kentucky" {{ optional($bank)->state == 'Kentucky' ? 'selected' : '' }}>Kentucky</option>
                                <option value="Louisiana" {{ optional($bank)->state == 'Louisiana' ? 'selected' : '' }}>Louisiana</option>
                                <option value="Maine" {{ optional($bank)->state == 'Maine' ? 'selected' : '' }}>Maine</option>
                                <option value="Maryland" {{ optional($bank)->state == 'Maryland' ? 'selected' : '' }}>Maryland</option>
                                <option value="Massachusetts" {{ optional($bank)->state == 'Massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                                <option value="Michigan" {{ optional($bank)->state == 'Michigan' ? 'selected' : '' }}>Michigan</option>
                                <option value="Minnesota" {{ optional($bank)->state == 'Minnesota' ? 'selected' : '' }}>Minnesota</option>
                                <option value="Mississippi" {{ optional($bank)->state == 'Mississippi' ? 'selected' : '' }}>Mississippi</option>
                                <option value="Missouri" {{ optional($bank)->state == 'Missouri' ? 'selected' : '' }}>Missouri</option>
                                <option value="Montana" {{ optional($bank)->state == 'Montana' ? 'selected' : '' }}>Montana</option>
                                <option value="Nebraska" {{ optional($bank)->state == 'Nebraska' ? 'selected' : '' }}>Nebraska</option>
                                <option value="Nevada" {{ optional($bank)->state == 'Nevada' ? 'selected' : '' }}>Nevada</option>
                                <option value="New Hampshire" {{ optional($bank)->state == 'New Hampshire' ? 'selected' : '' }}>New Hampshire</option>
                                <option value="New Jersey" {{ optional($bank)->state == 'New Jersey' ? 'selected' : '' }}>New Jersey</option>
                                <option value="New Mexico" {{ optional($bank)->state == 'New Mexico' ? 'selected' : '' }}>New Mexico</option>
                                <option value="New York" {{ optional($bank)->state == 'New York' ? 'selected' : '' }}>New York</option>
                                <option value="North Carolina" {{ optional($bank)->state == 'North Carolina' ? 'selected' : '' }}>North Carolina</option>
                                <option value="North Dakota" {{ optional($bank)->state == 'North Dakota' ? 'selected' : '' }}>North Dakota</option>
                                <option value="Ohio" {{ optional($bank)->state == 'Ohio' ? 'selected' : '' }}>Ohio</option>
                                <option value="Oklahoma" {{ optional($bank)->state == 'Oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                                <option value="Oregon" {{ optional($bank)->state == 'Oregon' ? 'selected' : '' }}>Oregon</option>
                                <option value="Pennsylvania" {{ optional($bank)->state == 'Pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                                <option value="Rhode Island" {{ optional($bank)->state == 'Rhode Island' ? 'selected' : '' }}>Rhode Island</option>
                                <option value="South Carolina" {{ optional($bank)->state == 'South Carolina' ? 'selected' : '' }}>South Carolina</option>
                                <option value="South Dakota" {{ optional($bank)->state == 'South Dakota' ? 'selected' : '' }}>South Dakota</option>
                                <option value="Tennessee" {{ optional($bank)->state == 'Tennessee' ? 'selected' : '' }}>Tennessee</option>
                                <option value="Texas" {{ optional($bank)->state == 'Texas' ? 'selected' : '' }}>Texas</option>
                                <option value="Utah" {{ optional($bank)->state == 'Utah' ? 'selected' : '' }}>Utah</option>
                                <option value="Vermont" {{ optional($bank)->state == 'Vermont' ? 'selected' : '' }}>Vermont</option>
                                <option value="Virginia" {{ optional($bank)->state == 'Virginia' ? 'selected' : '' }}>Virginia</option>
                                <option value="Washington" {{ optional($bank)->state == 'Washington' ? 'selected' : '' }}>Washington</option>
                                <option value="West Virginia"{{ optional($bank)->state == 'West Virginia' ? 'selected' : '' }}>West Virginia</option>
                                <option value="Wisconsin" {{ optional($bank)->state == 'Wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                                <option value="Wyoming" {{ optional($bank)->state == 'Wyoming' ? 'selected' : '' }}>Wyoming</option>
                                </select>
                            
                            <label for="state" class="mb-2">7. State</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    <div class="form-check form-switch pb-2">
                        <input class="form-check-input" name="fi_operate_accross_state" @if(optional($bank)->fi_operate_accross_state == 1) checked  @endif value="1"  id="fi_operate_accross_state_yes" type="checkbox" role="switch"
                        />
                        <label class="form-check-label " for="your-responce">Does Your FI Operate Across State Lines?</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="total_asset_size">9. What is the Total Asset Size of Your Global FI?</label>
                            <select name="total_asset_size" class="form-control wizard-required" id="total_asset_size">
                                <option></option>
                                <option value="large" @if (!empty($bank) && $bank->total_asset_size == 'large') selected @endif>Large - $1.16
                                    Billion</option>
                                <option value="intermediate" @if (!empty($bank) && $bank->total_asset_size == 'intermediate') selected @endif>
                                    Intermediate - $290 Million - $1.16 Billion</option>
                                <option value="small" @if (!empty($bank) && $bank->total_asset_size == 'small') selected @endif>Small - <=
                                        $290 Million</option>
                            </select>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <h4 class="stepper-right-f1 mb-3">Please Check All Deliverables That Your
                                Financial Institution Performs</h4>
                        </div>
                    </div>
              
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input type="hidden" value="0" name="alternative_investments" />
                            <input type="checkbox" class="form-check-input" name="alternative_investments"
                                @if (!empty($bank) && $bank->alternative_investments == 1) checked @endif>
                            <label class="form-check-label" for="alternative_investments">Alternative Investments</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="auto_loans" />
                            <input type="checkbox" class="form-check-input" name="auto_loans"
                                @if (!empty($bank) && $bank->auto_loans == 1) checked @endif>
                            <label class="form-check-label" for="auto_loans">Auto Loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="bonds" />
                            <input type="checkbox" class="form-check-input" name="bonds"
                                @if (!empty($bank) && $bank->bonds == 1) checked @endif>
                            <label class="form-check-label" for="bonds">Bonds</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="business_banking_accounts" />
                            <input type="checkbox" class="form-check-input" name="business_banking_accounts"
                                @if (!empty($bank) && $bank->business_banking_accounts == 1) checked @endif>
                            <label class="form-check-label" for="business_banking_accounts">Business Banking
                                Accounts</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="business_banking_loans" />
                            <input type="checkbox" class="form-check-input" name="business_banking_loans"
                                @if (!empty($bank) && $bank->business_banking_loans == 1) checked @endif>
                            <label class="form-check-label" for="business_banking_loans">Business Banking Loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="car_insurance" />
                            <input type="checkbox" class="form-check-input" name="car_insurance"
                                @if (!empty($bank) && $bank->car_insurance == 1) checked @endif>
                            <label class="form-check-label" for="car_insurance">Car Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="casualty_insurance" />
                            <input type="checkbox" class="form-check-input" name="casualty_insurance"
                                @if (!empty($bank) && $bank->casualty_insurance == 1) checked @endif>
                            <label class="form-check-label" for="casualty_insurance">Casualty Insurance</label>
                        </div>


                        <div class="form-check">
                            <input type="hidden" value="0" name="checking_account" />
                            <input type="checkbox" class="form-check-input" name="checking_account"
                                @if (!empty($bank) && $bank->checking_account == 1) checked @endif>
                            <label class="form-check-label" for="checking_account">Checking Account</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="commercial_appraisals" />
                            <input type="checkbox" class="form-check-input" name="commercial_appraisals"
                                @if (!empty($bank) && $bank->commercial_appraisals == 1) checked @endif>
                            <label class="form-check-label" for="commercial_appraisals">Commercial Appraisals</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="commercial_paper" />
                            <input type="checkbox" class="form-check-input" name="commercial_paper"
                                @if (!empty($bank) && $bank->commercial_paper == 1) checked @endif>
                            <label class="form-check-label" for="commercial_paper">Commercial Paper</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="commercial_real_estate_loans" />
                            <input type="checkbox" class="form-check-input" name="commercial_real_estate_loans"
                                @if (!empty($bank) && $bank->commercial_real_estate_loans == 1) checked @endif>
                            <label class="form-check-label" for="commercial_real_estate_loans">Commercial Real Estate
                                Loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="correspondence_banking" />
                            <input type="checkbox" class="form-check-input" name="correspondence_banking"
                                @if (!empty($bank) && $bank->correspondence_banking == 1) checked @endif>
                            <label class="form-check-label" for="correspondence_banking">Correspondence Banking</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="corporate_reorganizations" />
                            <input type="checkbox" class="form-check-input" name="corporate_reorganizations"
                                @if (!empty($bank) && $bank->corporate_reorganizations == 1) checked @endif>
                            <label class="form-check-label" for="corporate_reorganizations">Corporate
                                Reorganizations</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="credit_cards" />
                            <input type="checkbox" class="form-check-input" name="credit_cards"
                                @if (!empty($bank) && $bank->credit_cards == 1) checked @endif>
                            <label class="form-check-label" for="credit_cards">Credit Cards</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="death_insurance" />
                            <input type="checkbox" class="form-check-input" name="death_insurance"
                                @if (!empty($bank) && $bank->death_insurance == 1) checked @endif>
                            <label class="form-check-label" for="death_insurance">Death Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="debit_cards" />
                            <input type="checkbox" class="form-check-input" name="debit_cards"
                                @if (!empty($bank) && $bank->debit_cards == 1) checked @endif>
                            <label class="form-check-label" for="debit_cards">Debit Cards</label>
                        </div>


                        <div class="form-check">
                            <input type="hidden" value="0" name="demand_deposits" />
                            <input type="checkbox" class="form-check-input" name="demand_deposits"
                                @if (!empty($bank) && $bank->demand_deposits == 1) checked @endif>
                            <label class="form-check-label" for="demand_deposits">Demand Deposits</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="disability_insurance" />
                            <input type="checkbox" class="form-check-input" name="disability_insurance"
                                @if (!empty($bank) && $bank->disability_insurance == 1) checked @endif>
                            <label class="form-check-label" for="disability_insurance">Disability Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="equity_offerings" />
                            <input type="checkbox" class="form-check-input" name="equity_offerings"
                                @if (!empty($bank) && $bank->equity_offerings == 1) checked @endif>
                            <label class="form-check-label" for="equity_offerings">Equity Offerings</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="exchange_traded_funds" />
                            <input type="checkbox" class="form-check-input" name="exchange_traded_funds"
                                @if (!empty($bank) && $bank->exchange_traded_funds == 1) checked @endif>
                            <label class="form-check-label" for="exchange_traded_funds">Exchange Traded Funds
                                (ETFs)</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="fire_insurance" />
                            <input type="checkbox" class="form-check-input" name="fire_insurance"
                                @if (!empty($bank) && $bank->fire_insurance == 1) checked @endif>
                            <label class="form-check-label" for="fire_insurance">Fire Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="health_insurance" />
                            <input type="checkbox" class="form-check-input" name="health_insurance"
                                @if (!empty($bank) && $bank->health_insurance == 1) checked @endif>
                            <label class="form-check-label" for="health_insurance">Health Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="initial_public_offerings" />
                            <input type="checkbox" class="form-check-input" name="initial_public_offerings"
                                @if (!empty($bank) && $bank->initial_public_offerings == 1) checked @endif>
                            <label class="form-check-label" for="initial_public_offerings">Initial Public Offerings
                                (IPOs)</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="institutional_client_broker" />
                            <input type="checkbox" class="form-check-input" name="institutional_client_broker"
                                @if (!empty($bank) && $bank->institutional_client_broker == 1) checked @endif>
                            <label class="form-check-label" for="institutional_client_broker">Institutional Client
                                Broker</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="insurance_products" />
                            <input type="checkbox" class="form-check-input" name="insurance_products"
                                @if (!empty($bank) && $bank->insurance_products == 1) checked @endif>
                            <label class="form-check-label" for="insurance_products">Insurance Products</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="investment_banking" />
                            <input type="checkbox" class="form-check-input" name="investment_banking"
                                @if (!empty($bank) && $bank->investment_banking == 1) checked @endif>
                            <label class="form-check-label" for="investment_banking">Investment Banking</label>
                        </div>



                        <div class="form-check">
                            <input type="hidden" value="0" name="mergers_and_acquisitions_facilitator" />
                            <input type="checkbox" class="form-check-input" name="mergers_and_acquisitions_facilitator"
                                @if (!empty($bank) && $bank->mergers_and_acquisitions_facilitator == 1) checked @endif>
                            <label class="form-check-label" for="mergers_and_acquisitions_facilitator">Mergers and
                                Acquisitions Facilitator</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="mortgage_loans" />
                            <input type="checkbox" class="form-check-input" name="mortgage_loans"
                                @if (!empty($bank) && $bank->mortgage_loans == 1) checked @endif>
                            <label class="form-check-label" for="mortgage_loans">Mortgage loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="mutual_funds_closed_ended" />
                            <input type="checkbox" class="form-check-input" name="mutual_funds_closed_ended"
                                @if (!empty($bank) && $bank->mutual_funds_closed_ended == 1) checked @endif>
                            <label class="form-check-label" for="mutual_funds_closed_ended">Mutual Funds
                                Closed-ended</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="mutual_funds_open_ended" />
                            <input type="checkbox" class="form-check-input" name="mutual_funds_open_ended"
                                @if (!empty($bank) && $bank->mutual_funds_open_ended == 1) checked @endif>
                            <label class="form-check-label" for="mutual_funds_open_ended">Mutual Funds Open-ended</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="personal_loans" />
                            <input type="checkbox" class="form-check-input" name="personal_loans"
                                @if (!empty($bank) && $bank->personal_loans == 1) checked @endif>
                            <label class="form-check-label" for="personal_loans">Personal loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="property_insurance" />
                            <input type="checkbox" class="form-check-input" name="property_insurance"
                                @if (!empty($bank) && $bank->property_insurance == 1) checked @endif>
                            <label class="form-check-label" for="property_insurance">Property Insurance</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="" />
                            <input type="checkbox" class="form-check-input" name="public_private_share_offerings"
                                @if (!empty($bank) && $bank->public_private_share_offerings == 1) checked @endif>
                            <label class="form-check-label" for="public_private_share_offerings">Public / Private Share
                                Offerings</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="residential_appraisals" />
                            <input type="checkbox" class="form-check-input" name="residential_appraisals"
                                @if (!empty($bank) && $bank->residential_appraisals == 1) checked @endif>
                            <label class="form-check-label" for="residential_appraisals">Residential Appraisals</label>
                        </div>


                        <div class="form-check">
                            <input type="hidden" value="0" name="residential_real_estate_loans" />
                            <input type="checkbox" class="form-check-input" name="residential_real_estate_loans"
                                @if (!empty($bank) && $bank->residential_real_estate_loans == 1) checked @endif>
                            <label class="form-check-label" for="residential_real_estate_loans">Residential Real Estate
                                Loans</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="savings_accounts" />
                            <input type="checkbox" class="form-check-input" name="savings_accounts"
                                @if (!empty($bank) && $bank->savings_accounts == 1) checked @endif>
                            <label class="form-check-label" for="savings_accounts">Savings accounts</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="stocks" />
                            <input type="checkbox" class="form-check-input" name="stocks"
                                @if (!empty($bank) && $bank->stocks == 1) checked @endif>
                            <label class="form-check-label" for="stocks">Stocks</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="" />
                            <input type="checkbox" class="form-check-input" name="swift"
                                @if (!empty($bank) && $bank->swift == 1) checked @endif>
                            <label class="form-check-label" for="swift">SWIFT</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="tax_deferred_annuity" />
                            <input type="checkbox" class="form-check-input" name="tax_deferred_annuity"
                                @if (!empty($bank) && $bank->tax_deferred_annuity == 1) checked @endif>
                            <label class="form-check-label" for="tax_deferred_annuity">Tax Deferred Annuity</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="trading" />
                            <input type="checkbox" class="form-check-input" name="trading"
                                @if (!empty($bank) && $bank->trading == 1) checked @endif>
                            <label class="form-check-label" for="trading">Trading</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="underwriting_debit" />
                            <input type="checkbox" class="form-check-input" name="underwriting_debit"
                                @if (!empty($bank) && $bank->underwriting_debit == 1) checked @endif>
                            <label class="form-check-label" for="underwriting_debit">Underwriting Debit</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="wealth_advisor_check" />
                            <input type="checkbox" class="form-check-input" name="wealth_advisor_check"
                                @if (!empty($bank) && $bank->wealth_advisor == 1) checked @endif>
                            <label class="form-check-label" for="wealth_advisor_check">Wealth advisor</label>
                        </div>

                        <div class="form-check">
                            <input type="hidden" value="0" name="wire_transfers" />
                            <input type="checkbox" class="form-check-input" name="wire_transfers"
                                @if (!empty($bank) && $bank->wire_transfers == 1) checked @endif>
                            <label class="form-check-label" for="wire_transfers">Wire Transfers</label>
                        </div>


                    </div>
                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <input name="bank_identification_no" type="number" class="form-control wizard-required"
                                id="bank_identification_no" value="{{ $bank->bank_identification_no ?? '' }}">
                            <label for="bank_identification_no" class="mb-2">11. What is Your Bank
                                Identification Number (BIN)?</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <select name="daily_trade_volume" class="form-control wizard-required" id="daily_trade_volume">
                                <option></option>
                                <option value="50000_plus" @if(!empty($bank) && $bank->daily_trade_volume == '50000_plus') selected @endif>50,000 + > trans p/day</option>
                                <option value="30000_50000" @if(!empty($bank) && $bank->daily_trade_volume == '30000_50000') selected @endif>30,000 – 50,000 trans p/day</option>
                                <option value="10000_30000" @if(!empty($bank) && $bank->daily_trade_volume == '10000_30000') selected @endif>10,000 – 30,000 trans p/day</option>
                                <option value="less_than_10000" @if(!empty($bank) && $bank->daily_trade_volume == 'less_than_10000') selected @endif>10,000 < trans p/day</option>
                            </select>
                            <label for="daily_trade_volume" class="mb-2">12. What is your Daily Trade
                                Volume in Your Department or Division or Unit?</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <h4 class="stepper-right-f1 mb-3">What is portfolio size?</h4>
                        </div>
                    </div>
                    <div class="row">  
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <input name="mortage_loans" type="number" class="form-control wizard-required"
                                id="mortage_loans" value="{{ !empty($bank) ? $bank->mortage_loans : '' }}">
                            <label for="mortage_loans" class="mb-2">Mortgage Loans</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <input name="credit_card" type="number" class="form-control wizard-required"
                                id="credit_card" value="{{ !empty($bank) ? $bank->credit_card : '' }}">
                            <label for="credit_card" class="mb-2">Credit Card</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <input name="debit_card" type="number" class="form-control wizard-required"
                                id="debit_card" value="{{ !empty($bank) ? $bank->debit_card : '' }}">
                            <label for="debit_card" class="mb-2">Debit Card</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <input name="wealth_advisor" type="number" class="form-control wizard-required"
                                id="wealth_advisor" value="{{ !empty($bank) ? $bank->wealth_advisor : '' }}">
                            <label for="wealth_advisor" class="mb-2">Wealth Advisor</label>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="help_description" class="mb-2">14. Describe in Detail How Ginicoe Can Help You.</label>
                            <textarea name="help_description" class="form-control wizard-required" id="help_description">{{ !empty($bank) ? $bank->help_description : '' }}</textarea>
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="form-group clearfix">

                        <button class="btn btn-success float-right" style="color:white">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
    <script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
    <script src="{{ asset('public/backend/js/bank/update_my_info.js') }}"></script>
@endsection
