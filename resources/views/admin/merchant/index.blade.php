@extends('admin.admin_layouts')

@section('admin_content')




        <div class="col-lg-12 p-3 col-md-12">
            <form id="update_my_info_form" action="{{route('admin.merchant.update_my_info.store')}}" method="post" role="form">
               @csrf
                <div class="wizard-fieldset">

                    <div class="row" id="fetch_custom_smarty_address">

                        <div class="col-md-4 mb-3">
                            <label for="firstname" class="mb-2">Business Legal Coordinates </label>
                       <input name="business_legal_name" value="{{optional($merchant)->business_legal_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="business_legal_name">
                        <p class="text_danger form_error"></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="business_dba_name" class="wizard-form-text-label">Business DBA Name (if
                                    different than legal name)</label>
                                <input name="business_dba_name" value="{{optional($merchant)->business_dba_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="business_dba_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="business_legal_address" class="wizard-form-text-label">Business Legal
                                    Address</label>
                                <div class="position-relative">
                                    <input name="business_legal_address" value="{{optional($merchant)->business_legal_address ?? ''}}" type="text"
                                        class="form-control wizard-required" id="business_legal_address11">
                                    <div class="address-preloader position-absolute" style="display: none; right: 10px; top: 50%; transform: translateY(-50%);">
                                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="ss_suggestion_list" id="ss_suggestions"> </div>
                                </div>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="state_legal" class="wizard-form-text-label"> State</label>
                                <select class="form-control" name="state_legal" id="state_legal">
                                    <option>Select State</option>
                                    <?php 
                                        $states_arrs = get_h_states_list();
                                        if($states_arrs){
                                            foreach($states_arrs as $stateName => $stateAbbrv ){ ?>
                                                <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" 
                                                    <?=((optional($merchant)->state_legal == $stateName) ? 'selected="selected"' : '')?> 
                                                > 
                                                    {{ $stateName }} 
                                                </option>
                                            <?php 
                                            } 
                                        }  ?>  
                                    </select>
                                
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">

                                <label for="city_legal" class="wizard-form-text-label"> City</label>
                                <select class="form-control" name="city_legal" id="city_legal" >
                                    <option value="{{optional($merchant)->city_legal}}" selected>{{optional($merchant)->city_legal}}</option>
                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zip_legal" class="wizard-form-text-label"> Zip</label>
                                <input name="zip_legal"   value="{{optional($merchant)->zip_legal ?? ''}}" type="text"
                                    class="form-control wizard-required" id="zip_legal">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">Business Physical
                                    Address</h4>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="business_physical_address" class="wizard-form-text-label"> Business Physical
                                    Address (if different than legal address)</label>
                                <div class="position-relative">
                                    <input name="business_physical_address" value="{{optional($merchant)->business_physical_address ?? ''}}" 
                                        type="text" class="form-control wizard-required" id="business_physical_address11">
                                    <div class="address-preloader position-absolute" style="display: none; right: 10px; top: 50%; transform: translateY(-50%);">
                                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="ss_suggestion_list" id="ss_suggestions2"> </div>
                                </div>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div> 

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zip_physical" class="wizard-form-text-label"> Zip</label>
                                <input name="zip_physical"   value="{{optional($merchant)->zip_physical ?? ''}}" type="text"
                                    class="form-control wizard-required" id="zip_physical">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="state_physical" class="wizard-form-text-label"> State</label>
                                <select class="form-control" name="state_physical" id="state_physical" >
                                    <option>Select State</option>
                                    <?php 
                                        $states_arrs = get_h_states_list();
                                        if($states_arrs){
                                            foreach($states_arrs as $stateName => $stateAbbrv ){ ?>
                                                <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" 
                                                    <?=((optional($merchant)->state_physical == $stateName) ? 'selected="selected"' : '')?> 
                                                > 
                                                {{ $stateName }} 
                                                </option>
                                            <?php 
                                            } 
                                        }  ?>   
                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="city_physical" class="wizard-form-text-label"> City</label>
                                <select class="form-control" name="city_physical" id="city_physical" >
                                    <option value="{{optional($merchant)->city_physical}}" selected>{{optional($merchant)->city_physical}}</option>

                                </select>

                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="first_name" class="wizard-form-text-label"> First Name of New Member</label>
                                <input name="first_name"   value="{{optional($merchant)->first_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="first_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="mi" class="wizard-form-text-label"> MI</label>
                                <input name="mi"   value="{{optional($merchant)->mi ?? ''}}" type="text" class="form-control wizard-required"
                                    id="mi">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="last_name" class="wizard-form-text-label"> Last Name</label>
                                <input name="last_name"   value="{{optional($merchant)->last_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="last_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="telephone_number" class="wizard-form-text-label"> Telephone Number</label>
                                <input name="telephone_number"   value="{{optional($merchant)->telephone_number ?? ''}}" type="text"
                                    class="form-control wizard-required" id="telephone_number">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="toll_free_number" class="wizard-form-text-label">Toll Free Number (if
                                    applicable)</label>
                                <input name="toll_free_number"   value="{{optional($merchant)->toll_free_number ?? ''}}" type="text"
                                    class="form-control wizard-required" id="toll_free_number">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="fax_number" class="wizard-form-text-label">Fax Number</label>
                                <input name="fax_number"   value="{{optional($merchant)->fax_number ?? ''}}" type="text"
                                    class="form-control wizard-required" id="fax_number">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="mobile_phone" class="wizard-form-text-label"> Mobile / Cell Phone (if
                                    applicable)</label>
                                <input name="mobile_phone"   value="{{optional($merchant)->mobile_phone ?? ''}}" type="text"
                                    class="form-control wizard-required" id="mobile_phone">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="email_address" class="wizard-form-text-label"> Email Address</label>
                                <input name="email_address"  value="{{optional($merchant)->email_address ?? ''}}" type="email"
                                    class="form-control wizard-required" id="email_address">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="federal_tax_id" class="wizard-form-text-label">Federal Tax ID#</label>
                                <input name="federal_tax_id"   value="{{optional($merchant)->federal_tax_id ?? ''}}" type="text"
                                    class="form-control wizard-required" id="federal_tax_id">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>






                       <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">Ownership Information</h4>
                            </div>
                        </div>











                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="owner_partner" class="wizard-form-text-label">Owner / Partner</label>
                                <input name="owner_partner"   value="{{optional($merchant)->owner_partner ?? ''}}" type="text"
                                    class="form-control wizard-required" id="owner_partner">
                                    <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_first_name" class="wizard-form-text-label">First Name</label>
                                <input name="ownership_first_name"   value="{{optional($merchant)->ownership_first_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_first_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_mi" class="wizard-form-text-label"> MI</label>
                                <input name="ownership_mi"   value="{{optional($merchant)->ownership_mi ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_mi">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_last_name" class="wizard-form-text-label">Last Name</label>
                                <input name="ownership_last_name"   value="{{optional($merchant)->ownership_last_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_last_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_ssn" class="wizard-form-text-label">Social Security
                                    Number</label>
                                <input name="ownership_ssn"   value="{{optional($merchant)->ownership_ssn ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_ssn">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_title" class="wizard-form-text-label">Title in Business</label>
                                <input name="ownership_title"   value="{{optional($merchant)->ownership_title ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_title">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_telephone" class="wizard-form-text-label">Telephone
                                    Number</label>
                                <input name="ownership_telephone"   value="{{optional($merchant)->ownership_telephone ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_telephone">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_percentage" class="wizard-form-text-label">Ownership
                                    Percentage</label>
                                <input name="ownership_percentage"    value="{{optional($merchant)->ownership_percentage ?? ''}}" type="number"
                                    class="form-control wizard-required" id="ownership_percentage">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_dob" class="wizard-form-text-label">DOB</label>
                                <input name="ownership_dob"   value="{{optional($merchant)->ownership_dob ?? ''}}" type="date"
                                    class="form-control wizard-required" id="ownership_dob">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                    
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_home_address" class="wizard-form-text-label">Home Address</label>
                                <div class="position-relative">
                                    <input name="ownership_home_address"   value="{{optional($merchant)->ownership_home_address ?? ''}}" type="text"
                                        class="form-control wizard-required" id="ownership_home_address11">
                                    <div class="address-preloader position-absolute" style="display: none; right: 10px; top: 50%; transform: translateY(-50%);">
                                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="ss_suggestion_list" id="ss_suggestions3"> </div>
                                </div>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_state" class="wizard-form-text-label">State</label>
                                <select class="form-control" name="ownership_state" id="ownership_state" >
                                    <option>Select State</option>  
                                    <?php 
                                        $states_arrs = get_h_states_list();
                                        if($states_arrs){
                                            foreach($states_arrs as $stateName => $stateAbbrv ){ ?>
                                                <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" 
                                                    <?=((optional($merchant)->ownership_state == $stateName) ? 'selected="selected"' : '')?> 
                                                > 
                                                {{ $stateName }} 
                                                </option>
                                            <?php 
                                            } 
                                        }  ?>  
                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">

                                <label for="ownership_city" class="wizard-form-text-label">City</label>
                                <select class="form-control" name="ownership_city" id="ownership_city" >
                                    <option value="{{optional($merchant)->ownership_city}}" selected>{{optional($merchant)->ownership_city}}</option>

                                </select>

                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ownership_zip" class="wizard-form-text-label">Zip</label>
                                <input name="ownership_zip"   value="{{optional($merchant)->ownership_zip ?? ''}}" type="text"
                                    class="form-control wizard-required" id="ownership_zip">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="business_structure" class="wizard-form-text-label">What is the structure
                                    of your business ?</label>
                                <select name="business_structure" class="form-control wizard-required"
                                    id="business_structure">
                                    <option {{ optional($merchant)->business_structure == '' ? 'selected' : '' }}></option>
                                    <option value="c-corp" {{ optional($merchant)->business_structure == 'c-corp' ? 'selected' : '' }}>C-Corp</option>
                                    <option value="contractorship" {{ optional($merchant)->business_structure == 'contractorship' ? 'selected' : '' }}>Contractorship</option>
                                    <option value="cooperative" {{ optional($merchant)->business_structure == 'cooperative' ? 'selected' : '' }}>Cooperative</option>
                                    <option value="dba" {{ optional($merchant)->business_structure == 'dba' ? 'selected' : '' }}>DBA</option>
                                    <option value="llc" {{ optional($merchant)->business_structure == 'llc' ? 'selected' : '' }}>LLC</option>
                                    <option value="pc" {{ optional($merchant)->business_structure == 'pc' ? 'selected' : '' }}>PC</option>
                                    <option value="s-corp" {{ optional($merchant)->business_structure == 's-corp' ? 'selected' : '' }}>S-Corp</option>
                                    <option value="sole_proprietorship" {{ optional($merchant)->business_structure == 'sole_proprietorship' ? 'selected' : '' }}>Sole Proprietorship</option>
                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="home_based_business" @if(optional($merchant)->home_based_business == 1) checked  @endif value="1"  id="home_based_business_yes" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Are you a home based business?</label>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="num_employees" class="wizard-form-text-label">What is the number of
                                    employees at your physical location ?</label>
                                <select name="num_employees" class="form-control wizard-required" id="num_employees">
                                    <option {{ optional($merchant)->num_employees == '' ? 'selected' : '' }}></option>
                                    <option value="1_50" {{ optional($merchant)->num_employees == '1_50' ? 'selected' : '' }}>1-50</option>
                                    <option value="50_500" {{ optional($merchant)->num_employees == '50_500' ? 'selected' : '' }}>50-500</option>
                                    <option value="500_1000" {{ optional($merchant)->num_employees == '500_1000' ? 'selected' : '' }}>500-1000</option>
                                    <option value="1000_5000" {{ optional($merchant)->num_employees == '1000_5000' ? 'selected' : '' }}>1000-5000</option>
                                    <option value="5000_10000" {{ optional($merchant)->num_employees == '5000_10000' ? 'selected' : '' }}>5000-10000</option>
                                    <option value="10000_plus" {{ optional($merchant)->num_employees == '10000_plus' ? 'selected' : '' }}>10000+</option>
                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="sales_per_month" class="wizard-form-text-label">What are your sales in U.S. Dollars per month?
                                </label>
                                <select name="sales_per_month" class="form-control wizard-required" id="sales_per_month">
                                    <option {{ optional($merchant)->sales_per_month == '' ? 'selected' : '' }}></option>
                                    <option value="0_3000" {{ optional($merchant)->sales_per_month == '0_3000' ? 'selected' : '' }}>$0-$3000</option>
                                    <option value="3000_10000" {{ optional($merchant)->sales_per_month == '3000_10000' ? 'selected' : '' }}>$3000-$10000</option>
                                    <option value="10000_40000" {{ optional($merchant)->sales_per_month == '10000_40000' ? 'selected' : '' }}>$10000-$40000</option>
                                    <option value="40000_75000" {{ optional($merchant)->sales_per_month == '40000_75000' ? 'selected' : '' }}>$40000-$75000</option>
                                    <option value="75000_100000" {{ optional($merchant)->sales_per_month == '75000_100000' ? 'selected' : '' }}>$75000-$100000</option>
                                    <option value="100000_plus" {{ optional($merchant)->sales_per_month == '100000_plus' ? 'selected' : '' }}>$100000+</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">Are you a?</h4>
                            </div>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="tier1_merchant" @if(optional($merchant)->tier1_merchant == 1) checked  @endif value="1" id="tier1_merchant" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Tier 1: any merchant processing over six million transactions annually, across all
                                channels, or any merchant that has suffered a data breach?</label>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="tier2_merchant" @if(optional($merchant)->tier2_merchant == 1) checked  @endif value="1" id="tier2_merchant" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Tier 2: any merchant processing between one million and six million total transactions
                                annually?</label>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="tier3_merchant" @if(optional($merchant)->tier3_merchant == 1) checked  @endif value="1" id="tier3_merchant" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Tier 3: any merchant processing between twenty thousand and one million transactions
                                annually?</label>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="tier4_merchant" @if(optional($merchant)->tier4_merchant == 1) checked  @endif value="1" id="tier4_merchant" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Tier 4: any merchant processing less than 20,000 transactions annually, or any merchant
                                processing a maximum of one million regular transactions annually?</label>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-4 mb-3 ">
                                <div class="form-group">
                                    <label for="bank_name" class="wizard-form-text-label">What is the Name of your
                                        merchant bank or Acquirer?</label>
                                    <input name="bank_name"   value="{{optional($merchant)->bank_name ?? ''}}" type="text"
                                        class="form-control wizard-required" id="bank_name">
                                        <p class="text_danger form_error"></p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_fn" class="wizard-form-text-label">Account Manager's
                                        First Name</label>
                                    <input name="bank_account_manager_fn"   value="{{optional($merchant)->bank_account_manager_fn ?? ''}}" type="text"
                                        class="form-control wizard-required" id="bank_account_manager_fn">
                                        <p class="text_danger form_error"></p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_ln" class="wizard-form-text-label">Account Manager's
                                        Last Name</label>
                                    <input name="bank_account_manager_ln"   value="{{optional($merchant)->bank_account_manager_ln ?? ''}}" type="text"
                                        class="form-control wizard-required" id="bank_account_manager_ln">
                                        <p class="text_danger form_error"></p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_address" class="wizard-form-text-label">Account
                                        Manager's Physical Address</label>
                                    <div class="position-relative">
                                        <input name="bank_account_manager_address" value="{{optional($merchant)->bank_account_manager_address ?? ''}}" type="text"
                                            class="form-control wizard-required" id="bank_account_manager_address11">
                                        <div class="address-preloader position-absolute" style="display: none; right: 10px; top: 50%; transform: translateY(-50%);">
                                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                        <div class="ss_suggestion_list" id="ss_suggestions4"> </div>
                                    </div>
                                    <p class="text_danger form_error"></p>
                                </div>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_state" class="wizard-form-text-label">State</label>
                                    <select class="form-control" name="bank_account_manager_state"
                                        id="bank_account_manager_state" >
                                        <option>Select State</option>
                                        <option value="Alabama" {{ optional($merchant)->bank_account_manager_state == 'Alabama' ? 'selected' : '' }}>Alabama</option>
                                        <option value="Alaska" {{ optional($merchant)->bank_account_manager_state == 'Alaska' ? 'selected' : '' }}>Alaska</option>
                                        <option value="Arizona" {{ optional($merchant)->bank_account_manager_state == 'Arizona' ? 'selected' : '' }}>Arizona</option>
                                        <option value="Arkansas" {{ optional($merchant)->bank_account_manager_state == 'Arkansas' ? 'selected' : '' }}>Arkansas</option>
                                        <option value="California" {{ optional($merchant)->bank_account_manager_state == 'California' ? 'selected' : '' }}>California</option>
                                        <option value="Colorado" {{ optional($merchant)->bank_account_manager_state == 'Colorado' ? 'selected' : '' }}>Colorado</option>
                                        <option value="Connecticut" {{ optional($merchant)->bank_account_manager_state == 'Connecticut' ? 'selected' : '' }}>Connecticut</option>
                                        <option value="Delaware" {{ optional($merchant)->bank_account_manager_state == 'Delaware' ? 'selected' : '' }}>Delaware</option>
                                        <option value="District Of Columbia" {{ optional($merchant)->bank_account_manager_state == 'District Of Columbia' ? 'selected' : '' }}>District Of Columbia</option>
                                        <option value="Florida" {{ optional($merchant)->bank_account_manager_state == 'Florida' ? 'selected' : '' }}>Florida</option>
                                        <option value="Georgia" {{ optional($merchant)->bank_account_manager_state == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                        <option value="Hawaii" {{ optional($merchant)->bank_account_manager_state == 'Hawaii' ? 'selected' : '' }}>Hawaii</option>
                                        <option value="Idaho" {{ optional($merchant)->bank_account_manager_state == 'Idaho' ? 'selected' : '' }}>Idaho</option>
                                        <option value="Illinois" {{ optional($merchant)->bank_account_manager_state == 'Illinois' ? 'selected' : '' }}>Illinois</option>
                                        <option value="Indiana" {{ optional($merchant)->bank_account_manager_state == 'Indiana' ? 'selected' : '' }}>Indiana</option>
                                        <option value="Iowa" {{ optional($merchant)->bank_account_manager_state == 'Iowa' ? 'selected' : '' }}>Iowa</option>
                                        <option value="Kansas" {{ optional($merchant)->bank_account_manager_state == 'Kansas' ? 'selected' : '' }}>Kansas</option>
                                        <option value="Kentucky" {{ optional($merchant)->bank_account_manager_state == 'Kentucky' ? 'selected' : '' }}>Kentucky</option>
                                        <option value="Louisiana" {{ optional($merchant)->bank_account_manager_state == 'Louisiana' ? 'selected' : '' }}>Louisiana</option>
                                        <option value="Maine" {{ optional($merchant)->bank_account_manager_state == 'Maine' ? 'selected' : '' }}>Maine</option>
                                        <option value="Maryland" {{ optional($merchant)->bank_account_manager_state == 'Maryland' ? 'selected' : '' }}>Maryland</option>
                                        <option value="Massachusetts" {{ optional($merchant)->bank_account_manager_state == 'Massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                                        <option value="Michigan" {{ optional($merchant)->bank_account_manager_state == 'Michigan' ? 'selected' : '' }}>Michigan</option>
                                        <option value="Minnesota" {{ optional($merchant)->bank_account_manager_state == 'Minnesota' ? 'selected' : '' }}>Minnesota</option>
                                        <option value="Mississippi" {{ optional($merchant)->bank_account_manager_state == 'Mississippi' ? 'selected' : '' }}>Mississippi</option>
                                        <option value="Missouri" {{ optional($merchant)->bank_account_manager_state == 'Missouri' ? 'selected' : '' }}>Missouri</option>
                                        <option value="Montana" {{ optional($merchant)->bank_account_manager_state == 'Montana' ? 'selected' : '' }}>Montana</option>
                                        <option value="Nebraska" {{ optional($merchant)->bank_account_manager_state == 'Nebraska' ? 'selected' : '' }}>Nebraska</option>
                                        <option value="Nevada" {{ optional($merchant)->bank_account_manager_state == 'Nevada' ? 'selected' : '' }}>Nevada</option>
                                        <option value="New Hampshire" {{ optional($merchant)->bank_account_manager_state == 'New Hampshire' ? 'selected' : '' }}>New Hampshire</option>
                                        <option value="New Jersey" {{ optional($merchant)->bank_account_manager_state == 'New Jersey' ? 'selected' : '' }}>New Jersey</option>
                                        <option value="New Mexico" {{ optional($merchant)->bank_account_manager_state == 'New Mexico' ? 'selected' : '' }}>New Mexico</option>
                                        <option value="New York" {{ optional($merchant)->bank_account_manager_state == 'New York' ? 'selected' : '' }}>New York</option>
                                        <option value="North Carolina" {{ optional($merchant)->bank_account_manager_state == 'North Carolina' ? 'selected' : '' }}>North Carolina</option>
                                        <option value="North Dakota" {{ optional($merchant)->bank_account_manager_state == 'North Dakota' ? 'selected' : '' }}>North Dakota</option>
                                        <option value="Ohio" {{ optional($merchant)->bank_account_manager_state == 'Ohio' ? 'selected' : '' }}>Ohio</option>
                                        <option value="Oklahoma" {{ optional($merchant)->bank_account_manager_state == 'Oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                                        <option value="Oregon" {{ optional($merchant)->bank_account_manager_state == 'Oregon' ? 'selected' : '' }}>Oregon</option>
                                        <option value="Pennsylvania" {{ optional($merchant)->bank_account_manager_state == 'Pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                                        <option value="Rhode Island" {{ optional($merchant)->bank_account_manager_state == 'Rhode Island' ? 'selected' : '' }}>Rhode Island</option>
                                        <option value="South Carolina" {{ optional($merchant)->bank_account_manager_state == 'South Carolina' ? 'selected' : '' }}>South Carolina</option>
                                        <option value="South Dakota" {{ optional($merchant)->bank_account_manager_state == 'South Dakota' ? 'selected' : '' }}>South Dakota</option>
                                        <option value="Tennessee" {{ optional($merchant)->bank_account_manager_state == 'Tennessee' ? 'selected' : '' }}>Tennessee</option>
                                        <option value="Texas" {{ optional($merchant)->bank_account_manager_state == 'Texas' ? 'selected' : '' }}>Texas</option>
                                        <option value="Utah" {{ optional($merchant)->bank_account_manager_state == 'Utah' ? 'selected' : '' }}>Utah</option>
                                        <option value="Vermont" {{ optional($merchant)->bank_account_manager_state == 'Vermont' ? 'selected' : '' }}>Vermont</option>
                                        <option value="Virginia" {{ optional($merchant)->bank_account_manager_state == 'Virginia' ? 'selected' : '' }}>Virginia</option>
                                        <option value="Washington" {{ optional($merchant)->bank_account_manager_state == 'Washington' ? 'selected' : '' }}>Washington</option>
                                        <option value="West Virginia"{{ optional($merchant)->bank_account_manager_state == 'West Virginia' ? 'selected' : '' }}>West Virginia</option>
                                        <option value="Wisconsin" {{ optional($merchant)->bank_account_manager_state == 'Wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                                        <option value="Wyoming" {{ optional($merchant)->bank_account_manager_state == 'Wyoming' ? 'selected' : '' }}>Wyoming</option>
    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_city" class="wizard-form-text-label">City</label>
                                    <select class="form-control" name="bank_account_manager_city"
                                        id="bank_account_manager_city" >
                                        <option value="{{optional($merchant)->bank_account_manager_city}}" selected>{{optional($merchant)->bank_account_manager_city}}</option>
                                    </select>
    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_zipcode" class="wizard-form-text-label">Zipcode
                                        </label>
                                    <input name="bank_account_manager_zipcode"   value="{{optional($merchant)->bank_account_manager_zipcode ?? ''}}" type="text"
                                        class="form-control wizard-required" id="bank_account_manager_zipcode">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_telephone_number" class="wizard-form-text-label">
                                        Telephone Number</label>
                                    <input name="bank_account_manager_telephone_number"   value="{{optional($merchant)->bank_account_manager_telephone_number ?? ''}}" type="text"
                                        class="form-control wizard-required" id="bank_account_manager_telephone_number">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_manager_email" class="wizard-form-text-label">Account
                                        Manager's Email Address</label>
                                    <input name="bank_account_manager_email" value="{{optional($merchant)->bank_account_manager_email}}" type="email"
                                        class="form-control wizard-required" id="bank_account_manager_email">
                                </div>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="ein_number" class="wizard-form-text-label">What is your EIN
                                        Number?</label>
                                    <input name="ein_number"   value="{{optional($merchant)->ein_number ?? ''}}" type="text"
                                        class="form-control wizard-required" id="ein_number" pattern="[0-9]{9}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="primary_line_of_business" class="wizard-form-text-label">What is your
                                        primary line of business?</label>
                                    <input name="primary_line_of_business"   value="{{optional($merchant)->primary_line_of_business ?? ''}}" type="text"
                                        class="form-control wizard-required" id="primary_line_of_business">
                                        <p class="text_danger form_error"></p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="merchant_duns_number" class="wizard-form-text-label">What is your Merchant
                                        DUNS Number?</label>
                                    <input name="merchant_duns_number"   value="{{optional($merchant)->merchant_duns_number ?? ''}}" type="text"
                                        class="form-control wizard-required" id="merchant_duns_number" pattern="[0-9]{9}">
                                </div>
                            </div>
                        </div>
              
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">POINT OF SALE INFO</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="business_description" class="wizard-form-text-label">What Industry best describes your business?</label>
                                <select name="business_description" class="form-control wizard-required"
                                id="business_description">
                                <option value="accommodation_and_food_services" @if (!empty($merchant) && $merchant->business_description == 'accommodation_and_food_services') selected @endif>Accommodation and Food Services</option>
                                <option value="administrative_and_support_and_waste_management_and_remediation_services" @if (!empty($merchant) && $merchant->business_description == 'administrative_and_support_and_waste_management_and_remediation_services') selected @endif>Administrative and Support and Waste Management and Remediation Services</option>
                                <option value="agriculture" @if (!empty($merchant) && $merchant->business_description == 'agriculture') selected @endif>Agriculture</option>
                                <option value="arts_entertainment_and_recreation" @if (!empty($merchant) && $merchant->business_description == 'arts_entertainment_and_recreation') selected @endif>Arts, Entertainment and Recreation</option>
                                <option value="electric" @if (!empty($merchant) && $merchant->business_description == 'electric') selected @endif>Electric</option>
                                <option value="gas" @if (!empty($merchant) && $merchant->business_description == 'gas') selected @endif>Gas</option>
                                <option value="solar_water_and_sewage" @if (!empty($merchant) && $merchant->business_description == 'solar_water_and_sewage') selected @endif>Solar water and sewage <sub ddm></option>
                                <option value="wind" @if (!empty($merchant) && $merchant->business_description == 'wind') selected @endif>Wind <sub ddm></option>
                                <option value="construction" @if (!empty($merchant) && $merchant->business_description == 'construction') selected @endif>Construction</option>
                                <option value="educational_services" @if (!empty($merchant) && $merchant->business_description == 'educational_services') selected @endif>Educational Services</option>
                                <option value="finance_and_insurance" @if (!empty($merchant) && $merchant->business_description == 'finance_and_insurance') selected @endif>Finance and Insurance</option>
                                <option value="fishing_and_forestry" @if (!empty($merchant) && $merchant->business_description == 'fishing_and_forestry') selected @endif>Fishing, and Forestry</option>
                                <option value="health_care_and_social_assistance" @if (!empty($merchant) && $merchant->business_description == 'health_care_and_social_assistance') selected @endif>Health Care and Social Assistance</option>
                                <option value="hunting" @if (!empty($merchant) && $merchant->business_description == 'hunting') selected @endif>Hunting</option>
                                <option value="information_technology" @if (!empty($merchant) && $merchant->business_description == 'information_technology') selected @endif>Information Technology</option>
                                <option value="management_of_companies" @if (!empty($merchant) && $merchant->business_description == 'management_of_companies') selected @endif>Management of Companies (holding companies)</option>
                                <option value="manufacturing" @if (!empty($merchant) && $merchant->business_description == 'manufacturing') selected @endif>Manufacturing</option>
                                <option value="mining" @if (!empty($merchant) && $merchant->business_description == 'mining') selected @endif>Mining</option>
                                <option value="other_services" @if (!empty($merchant) && $merchant->business_description == 'other_services') selected @endif>Other Services</option>
                                <option value="professional_scientific_and_technical_services" @if (!empty($merchant) && $merchant->business_description == 'professional_scientific_and_technical_services') selected @endif>Professional, Scientific, and Technical Services</option>
                                <option value="real_estate_and_rental_and_leasing" @if (!empty($merchant) && $merchant->business_description == 'real_estate_and_rental_and_leasing') selected @endif>Real-estate and Rental and Leasing</option>
                                <option value="retail_trade" @if (!empty($merchant) && $merchant->business_description == 'retail_trade') selected @endif>Retail Trade</option>
                                <option value="transportation_and_warehousing" @if (!empty($merchant) && $merchant->business_description == 'transportation_and_warehousing') selected @endif>Transportation and Warehousing</option>
                                <option value="travel" @if (!empty($merchant) && $merchant->business_description == 'travel') selected @endif>Travel</option>
                                <option value="utilities" @if (!empty($merchant) && $merchant->business_description == 'utilities') selected @endif>Utilities</option>
                                <option value="utility_company" @if (!empty($merchant) && $merchant->business_description == 'utility_company') selected @endif>Utility Company</option>
                                <option value="wholesale_trade" @if (!empty($merchant) && $merchant->business_description == 'wholesale_trade') selected @endif>Wholesale Trade</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="pos_estimated_number" class="wizard-form-text-label">What is the Estimated
                                    number of POS?</label>
                                <input name="pos_estimated_number" value="{{optional($merchant)->pos_estimated_number ?? ''}}" type="number"
                                    class="form-control wizard-required" id="pos_estimated_number" min="1"
                                    max="100">

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="pos_manufacturer" class="wizard-form-text-label">Who is your POS
                                    Manufacturer?</label>
                                <select name="pos_manufacturer" class="form-control wizard-required"
                                    id="pos_manufacturer">
                                    <option value="aloha_pos" {{ optional($merchant)->pos_manufacturer == 'aloha_pos' ? 'selected' : '' }}>Aloha POS</option>
                                    <option value="bottle_pos" {{ optional($merchant)->pos_manufacturer == 'bottle_pos' ? 'selected' : '' }}>Bottle POS</option>
                                    <option value="cardconnect" {{ optional($merchant)->pos_manufacturer == 'cardconnect' ? 'selected' : '' }}>CardConnect</option>
                                    <option value="clover" {{ optional($merchant)->pos_manufacturer == 'clover' ? 'selected' : '' }}>Clover</option>
                                    <option value="ehopper_pos" {{ optional($merchant)->pos_manufacturer == 'ehopper_pos' ? 'selected' : '' }}>eHopper POS</option>
                                    <option value="epicor" {{ optional($merchant)->pos_manufacturer == 'epicor' ? 'selected' : '' }}>Epicor</option>
                                    <option value="epos_now" {{ optional($merchant)->pos_manufacturer == 'epos_now' ? 'selected' : '' }}>Epos Now</option>
                                    <option value="godaddy" {{ optional($merchant)->pos_manufacturer == 'godaddy' ? 'selected' : '' }}>GoDaddy</option>
                                    <option value="helcim" {{ optional($merchant)->pos_manufacturer == 'helcim' ? 'selected' : '' }}>Helcim</option>
                                    <option value="intercomplus" {{ optional($merchant)->pos_manufacturer == 'intercomplus' ? 'selected' : '' }}>IntercomPlus</option>
                                    <option value="lavu" {{ optional($merchant)->pos_manufacturer == 'lavu' ? 'selected' : '' }}>Lavu</option>
                                    <option value="lightspeed" {{ optional($merchant)->pos_manufacturer == 'lightspeed' ? 'selected' : '' }}>Lightspeed</option>
                                    <option value="ls_retail" {{ optional($merchant)->pos_manufacturer == 'ls_retail' ? 'selected' : '' }}>LS Retail</option>
                                    <option value="micros" {{ optional($merchant)->pos_manufacturer == 'micros' ? 'selected' : '' }}>Micros</option>
                                    <option value="ncr" {{ optional($merchant)->pos_manufacturer == 'ncr' ? 'selected' : '' }}>NCR</option>
                                    <option value="nec_corp_of_america" {{ optional($merchant)->pos_manufacturer == 'nec_corp_of_america' ? 'selected' : '' }}>NEC Corp. of America</option>
                                    <option value="olo" {{ optional($merchant)->pos_manufacturer == 'olo' ? 'selected' : '' }}>Olo</option>
                                    <option value="oracles_micros_res_pos" {{ optional($merchant)->pos_manufacturer == 'oracles_micros_res_pos' ? 'selected' : '' }}>Oracle's MICROS RES POS</option>
                                    <option value="paypal_zettle" {{ optional($merchant)->pos_manufacturer == 'paypal_zettle' ? 'selected' : '' }}>PayPal Zettle</option>
                                    <option value="petrosoft_smartpos" {{ optional($merchant)->pos_manufacturer == 'petrosoft_smartpos' ? 'selected' : '' }}>Petrosoft SmartPOS</option>
                                    <option value="pos_nation" {{ optional($merchant)->pos_manufacturer == 'pos_nation' ? 'selected' : '' }}>POS Nation</option>
                                    <option value="radiant_systems" {{ optional($merchant)->pos_manufacturer == 'radiant_systems' ? 'selected' : '' }}>Radiant Systems</option>
                                    <option value="revel_systems" {{ optional($merchant)->pos_manufacturer == 'revel_systems' ? 'selected' : '' }}>Revel Systems</option>
                                    <option value="shopify" {{ optional($merchant)->pos_manufacturer == 'shopify' ? 'selected' : '' }}>Shopify</option>
                                    <option value="square" {{ optional($merchant)->pos_manufacturer == 'square' ? 'selected' : '' }}>Square</option>
                                    <option value="sumup" {{ optional($merchant)->pos_manufacturer == 'sumup' ? 'selected' : '' }}>SumUp</option>
                                    <option value="suse_linux_enterprise_point_of_service_slepos" {{ optional($merchant)->pos_manufacturer == 'suse_linux_enterprise_point_of_service_slepos' ? 'selected' : '' }}>SUSE Linux Enterprise Point-of-Service (SLEPOS)</option>
                                    <option value="toast" {{ optional($merchant)->pos_manufacturer == 'toast' ? 'selected' : '' }}>Toast</option>
                                    <option value="toshiba" {{ optional($merchant)->pos_manufacturer == 'toshiba' ? 'selected' : '' }}>Toshiba</option>
                                    <option value="touchbistro" {{ optional($merchant)->pos_manufacturer == 'touchbistro' ? 'selected' : '' }}>TouchBistro</option>
                                    <option value="upserve_pos" {{ optional($merchant)->pos_manufacturer == 'upserve_pos' ? 'selected' : '' }}>Upserve POS</option>
                                    <option value="verifone" {{ optional($merchant)->pos_manufacturer == 'verifone' ? 'selected' : '' }}>Verifone</option>
                                    <option value="other" {{ optional($merchant)->pos_manufacturer == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 class="stepper-right-f1 mb-3">Have you experienced an account data
                                    compromise?</h4>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                
                                <label for="when" class="wizard-form-text-label">Have you experienced an account data compromise?
                                    If yes, when</label>
                                <input name="when"   value="{{optional($merchant)->when ?? ''}}" type="date" class="form-control wizard-required"
                                    id="when">
                            </div>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="use_pos" @if(optional($merchant)->use_pos == 1) checked  @endif value="1"  id="use_pos" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Do you use point of sale terminal hardware and software, or a PCI
                                DSS Certified Internet Gateway Provider, supplied by a merchant service provider, and do
                                you confirm that you do not store cardholder data?</label>
                        </div>
                        

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="third_party_vendor" class="wizard-form-text-label">If No, then what third
                                    party software company / vendor
                                    did you purchase your POS application from?</label>
                                <input name="third_party_vendor"   value="{{optional($merchant)->third_party_vendor ?? ''}}" type="text"
                                    class="form-control wizard-required" id="third_party_vendor">
                                    <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="third_party_name" class="wizard-form-text-label">What is the name of the
                                    third party software?</label>
                                <input name="third_party_name"   value="{{optional($merchant)->third_party_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="third_party_name">
                                    <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="third_party_version" class="wizard-form-text-label">What version
                                    number?</label>
                                <input name="third_party_version"   value="{{optional($merchant)->third_party_version ?? ''}}" type="number"
                                    class="form-control wizard-required" id="third_party_version">
                                    <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="transactions_third_party" @if(optional($merchant)->transactions_third_party == 1) checked  @endif value="1"  id="transactions_third_party" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Do your transactions process through any other
                                third parties, web hosting companies or gateways?</label>
                        </div>
                     

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="third_party_name_transactions" class="wizard-form-text-label">If yes, with
                                    whom?</label>
                                <input name="third_party_name_transactions"   value="{{optional($merchant)->third_party_name_transactions ?? ''}}" type="text"
                                    class="form-control wizard-required" id="third_party_name_transactions">
                                    <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="cardholder_data" @if(optional($merchant)->cardholder_data == 1) checked  @endif value="1"  id="cardholder_data" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Do you or your vendor - receive, pass, transmit or store -
                                the full cardholder number, electronically?</label>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="card_data_store" class="wizard-form-text-label">If yes, where is the card data stored?</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  @if(optional($merchant)->card_data_store_merchant == 1) checked  @endif class="form-check-input" name="card_data_store_merchant">
                                <label class="form-check-label" for="card_data_store_merchant">Merchant</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  @if(optional($merchant)->card_data_store_third_party_only == 1) checked  @endif class="form-check-input" name="card_data_store_third_party_only">
                                <label class="form-check-label" for="card_data_store_third_party_only">
                                    Third Party Only</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox"  @if(optional($merchant)->card_data_store_both == 1) checked  @endif class="form-check-input" name="card_data_store_both">
                                <label class="form-check-label" for="card_data_store_both">Both
                                </label>
                            </div>
                        </div>

                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="pci_dss_compliant" @if(optional($merchant)->pci_dss_compliant == 1) checked  @endif value="1"  id="pci_dss_compliant" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Are you or your vendor PCI/DSS compliant?</label>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="qsa_name" class="wizard-form-text-label">What is the name of your
                                    Qualified Security Assessor?</label>
                                <input name="qsa_name"   value="{{optional($merchant)->qsa_name ?? ''}}" type="text"
                                    class="form-control wizard-required" id="qsa_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="compliance_date" class="wizard-form-text-label">Date of Compliance</label>
                                <input name="compliance_date"   value="{{optional($merchant)->compliance_date ?? ''}}" type="date"
                                    class="form-control wizard-required" id="compliance_date">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="last_scan_date" class="wizard-form-text-label"> Date of last scan</label>
                                <input name="last_scan_date"   value="{{optional($merchant)->last_scan_date ?? ''}}" type="date"
                                    class="form-control wizard-required" id="last_scan_date">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <div class="form-group">
                                <label for="help_description" class="wizard-form-text-label">Describe in Detail How
                                    Ginicoe Can Help You.</label>
                                <textarea name="help_description" class="form-control wizard-required" id="help_description">{{optional($merchant)->help_description ?? ''}}</textarea>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>


                    </div>
                    <div class="form-group clearfix">

                        <button class="btn btn-success float-right" style="color:white" onclick="getinput()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('public/backend/js/merchent/update_my_info.js') }}"></script>

    {{-- Add jQuery library before other scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
    <script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
    
    <script>
        var delayTimer1;
        $('#business_physical_address11').on('input', function() {
            var preloader = $(this).siblings('.address-preloader');
            preloader.show();
            clearTimeout(delayTimer1);
            delayTimer1 = setTimeout(function() {
                var searchText1 = $('#business_physical_address11').val().trim();
                smarty_api_list(searchText1);
            }, 800);
        });

        function smarty_api_list(searchQuery1 = '') {
            $.ajax({
                url: 'https://ginicoe.com/getautocomplete',
                method: 'GET',
                data: {
                    search: searchQuery1,
                    prefer_geolocation: 'city',
                    max_results: '6'
                },
                success: function(response) {
                    $('#business_physical_address11').siblings('.address-preloader').hide();
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            return;
                        }
                    }
                    display_api_(response);
                    setTimeout(function() {
                        suggestion_click();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    $('#business_physical_address11').siblings('.address-preloader').hide();
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        function display_api_(resp_text) {
            var resultsList = $('#ss_suggestions2');
            let inputWith = $("#business_physical_address11").outerWidth(true);
            $(".ss_suggestion_list").width(inputWith)
            resultsList.empty();

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state + ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="list_api_items" data-item-street-line="' + suggestion.street_line + 
                        '" data-item-secondary="' + suggestion.secondary + 
                        '" data-item-city="' + suggestion.city + 
                        '" data-item-state="' + suggestion.state + 
                        '" data-item-zipcode="' + suggestion.zipcode + 
                        '" data-item-entries="' + suggestion.entries + 
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestion_click() {
            $(".list_api_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr('data-item-secondary') : '';
                
                $('#business_physical_address11').val(street_line_Val);
                $('#zip_physical').val($(this).attr('data-item-zipcode'));
                
                var stateVal = $(this).attr('data-item-state');
                $('#state_physical option').each(function() {
                    if ($(this).text().trim() === stateVal) {
                        $(this).prop('selected', true);
                    }
                });
                
                var cityVal = $(this).attr('data-item-city');
                $('#city_physical').html('<option value="' + cityVal + '" selected>' + cityVal + '</option>');
                
                $('#ss_suggestions2').removeClass('active').empty();
            });
        }

        // Close suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.position-relative').length) {
                $('.ss_suggestion_list').removeClass('active').empty();
            }
        });









        var delayTimer2;
        $('#business_legal_address11').on('input', function() {
            var preloader = $(this).siblings('.address-preloader');
            preloader.show();
            clearTimeout(delayTimer2);
            delayTimer2 = setTimeout(function() {
                var searchText2 = $('#business_legal_address11').val().trim();
                smarty_api_list_legal(searchText2);
            }, 800);
        });

        function smarty_api_list_legal(searchQuery2 = '') {
            $.ajax({
                url: 'https://ginicoe.com/getautocomplete',
                method: 'GET',
                data: {
                    search: searchQuery2,
                    prefer_geolocation: 'city',
                    max_results: '6'
                },
                success: function(response) {
                    $('#business_legal_address11').siblings('.address-preloader').hide();
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            return;
                        }
                    }
                    display_api_legal(response);
                    setTimeout(function() {
                        suggestion_click_legal();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    $('#business_legal_address11').siblings('.address-preloader').hide();
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        function display_api_legal(resp_text) {
            var resultsList = $('#ss_suggestions');
            let inputWith = $("#business_legal_address11").outerWidth(true);
            $(".ss_suggestion_list").width(inputWith)
            resultsList.empty();

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state + ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="list_api_items" data-item-street-line="' + suggestion.street_line + 
                        '" data-item-secondary="' + suggestion.secondary + 
                        '" data-item-city="' + suggestion.city + 
                        '" data-item-state="' + suggestion.state + 
                        '" data-item-zipcode="' + suggestion.zipcode + 
                        '" data-item-entries="' + suggestion.entries + 
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestion_click_legal() {
            $("#ss_suggestions .list_api_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr('data-item-secondary') : '';
                
                $('#business_legal_address11').val(street_line_Val);
                $('#zip_legal').val($(this).attr('data-item-zipcode'));
                
                var stateVal = $(this).attr('data-item-state');
                $('#state_legal option').each(function() {
                    if ($(this).text().trim() === stateVal) {
                        $(this).prop('selected', true);
                    }
                });
                
                var cityVal = $(this).attr('data-item-city');
                $('#city_legal').html('<option value="' + cityVal + '" selected>' + cityVal + '</option>');
                
                $('#ss_suggestions').removeClass('active').empty();
            });
        }








        var delayTimer3;
        $('#ownership_home_address11').on('input', function() {
            var preloader = $(this).siblings('.address-preloader');
            preloader.show();
            clearTimeout(delayTimer3);
            delayTimer3 = setTimeout(function() {
                var searchText3 = $('#ownership_home_address11').val().trim();
                smarty_api_list_manager(searchText3);
            }, 800);
        });

        function smarty_api_list_manager(searchQuery3 = '') {
            $.ajax({
                url: 'https://ginicoe.com/getautocomplete',
                method: 'GET',
                data: {
                    search: searchQuery3,
                    prefer_geolocation: 'city',
                    max_results: '6'
                },
                success: function(response) {
                    $('#ownership_home_address11').siblings('.address-preloader').hide();
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            return;
                        }
                    }
                    display_api_manager(response);
                    setTimeout(function() {
                        suggestion_click_manager();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    $('#ownership_home_address11').siblings('.address-preloader').hide();
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        function display_api_manager(resp_text) {
            var resultsList = $('#ss_suggestions3');
            let inputWith = $("#ownership_home_address11").outerWidth(true);
            $(".ss_suggestion_list").width(inputWith)
            resultsList.empty();

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state + ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="list_api_items" data-item-street-line="' + suggestion.street_line + 
                        '" data-item-secondary="' + suggestion.secondary + 
                        '" data-item-city="' + suggestion.city + 
                        '" data-item-state="' + suggestion.state + 
                        '" data-item-zipcode="' + suggestion.zipcode + 
                        '" data-item-entries="' + suggestion.entries + 
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestion_click_manager() {
            $("#ss_suggestions3 .list_api_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr('data-item-secondary') : '';
                
                $('#ownership_home_address11').val(street_line_Val);
                $('#ownership_zip').val($(this).attr('data-item-zipcode'));
                
                var stateVal = $(this).attr('data-item-state');
                $('#ownership_state option').each(function() {
                    if ($(this).text().trim() === stateVal) {
                        $(this).prop('selected', true);
                    }
                });
                
                var cityVal = $(this).attr('data-item-city');
                $('#ownership_city').html('<option value="' + cityVal + '" selected>' + cityVal + '</option>');
                
                $('#ss_suggestions3').removeClass('active').empty();
            });
        }

        var delayTimer4;
        $('#bank_account_manager_address11').on('input', function() {
            var preloader = $(this).siblings('.address-preloader');
            preloader.show();
            clearTimeout(delayTimer4);
            delayTimer4 = setTimeout(function() {
                var searchText4 = $('#bank_account_manager_address11').val().trim();
                smarty_api_list_bank_manager(searchText4);
            }, 800);
        });

        function smarty_api_list_bank_manager(searchQuery4 = '') {
            $.ajax({
                url: 'https://ginicoe.com/getautocomplete',
                method: 'GET',
                data: {
                    search: searchQuery4,
                    prefer_geolocation: 'city',
                    max_results: '6'
                },
                success: function(response) {
                    $('#bank_account_manager_address11').siblings('.address-preloader').hide();
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            return;
                        }
                    }
                    display_api_bank_manager(response);
                    setTimeout(function() {
                        suggestion_click_bank_manager();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    $('#bank_account_manager_address11').siblings('.address-preloader').hide();
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        function display_api_bank_manager(resp_text) {
            var resultsList = $('#ss_suggestions4');
            let inputWith = $("#bank_account_manager_address11").outerWidth(true);
            $(".ss_suggestion_list").width(inputWith)
            resultsList.empty();

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state + ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="list_api_items" data-item-street-line="' + suggestion.street_line + 
                        '" data-item-secondary="' + suggestion.secondary + 
                        '" data-item-city="' + suggestion.city + 
                        '" data-item-state="' + suggestion.state + 
                        '" data-item-zipcode="' + suggestion.zipcode + 
                        '" data-item-entries="' + suggestion.entries + 
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestion_click_bank_manager() {
            $("#ss_suggestions4 .list_api_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr('data-item-secondary') : '';
                
                $('#bank_account_manager_address11').val(street_line_Val);
                $('#bank_account_manager_zipcode').val($(this).attr('data-item-zipcode'));
                
                var stateVal = $(this).attr('data-item-state');
                $('#bank_account_manager_state option').each(function() {
                    if ($(this).text().trim() === stateVal) {
                        $(this).prop('selected', true);
                    }
                });
                
                var cityVal = $(this).attr('data-item-city');
                $('#bank_account_manager_city').html('<option value="' + cityVal + '" selected>' + cityVal + '</option>');
                
                $('#ss_suggestions4').removeClass('active').empty();
            });
        }





        
    </script>
@endsection

<style>
.valid {
    border-color: #198754;
    padding-right: calc(1.5em + 0.75rem);
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + 0.75rem);
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}
.toggle-ssn {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
}

.toggle-ssn:focus {
    outline: none;
}

.toggle-ssn i {
    color: #6c757d;
}

/* Position relative for SSN input container */
.ssn-input-container {
    position: relative;
}

.ss_suggestion_list {
    position: absolute;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    z-index: 1000;
    display: none;
}

.ss_suggestion_list.active {
    display: block;
}

.ss_suggestion_list li {
    padding: 8px 15px;
    cursor: pointer;
    list-style: none;
}

.ss_suggestion_list li:hover {
    background-color: #f5f5f5;
}

.position-relative {
    position: relative;
}

.address-preloader {
    z-index: 5;
}

.spinner-border-sm {
    width: 1rem;
    height: 1rem;
}
</style>