@extends('admin.admin_layouts')

@section('admin_content')
        <style>   
            .ss_suggestion_list {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                border: 1px solid #ccc;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                z-index: 1;
                max-height: 150px;
                overflow-y: auto;
                display: none;
            }

            .ss_suggestion_list.active {
                display: block;
            }

            .ss_suggestion_item {
                padding: 8px;
                cursor: pointer;
            }

            .ss_suggestion_item:hover {
                background-color: #f0f0f0;
            }
        </style>

        <div class="col-lg-12 p-3 col-md-12">
            <form id="update_my_info_form" action="{{ route('admin.govt.update_my_info.store') }}" method="post"
                role="form">
                @csrf
                <div class="form-wizard">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="first_name" class="mb-2">What is Your First Name? </label>
                                <input value="{{$govt->first_name ?? ""}}" name="first_name" type="text" class="form-control wizard-required">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="last_name" class="mb-2">What is Your Last Name?</label>

                                <label for="last_name" class="mb-2"></label>
                                <input value="{{$govt->last_name ?? ""}}" name="last_name" type="text" class="form-control wizard-required">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="title" class="mb-2"> What is your Title</label>

                                <label for="title" class="mb-2"></label>
                                <select class="form-control" name="title" id="title">
                                    <option></option>
                                    <option @if (!empty($govt) && $govt->title == 'director') selected @endif value="director" selected> Director</option>
                                    <option @if (!empty($govt) && $govt->title == 'chief') selected @endif value="chief" selected> Chief</option>

                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <script>
                            var authId = '180387782200692062';
                            if(window.location.href.includes("localhost")){
                                authId = '190012971852155679';
                            }
                            jQuery(document).ready(function($) { 
                                var delayTimer3;
                                $('#building_no').on('input', function() {
                                    clearTimeout(delayTimer3);
                                    delayTimer3 = setTimeout(function() {
                                        var searchText3 = $('#building_no').val().trim(); 
                                        serach_us_smarty_address_list1(searchText3);
                                    }, 800);  
                                });
                            });


                            function serach_us_smarty_address_list1(searchQuery3 = ''){
                                /* Make an AJAX request to the SmartyStreets US Autocomplete API */
                                $.ajax({
                                    url: 'https://us-autocomplete-pro.api.smartystreets.com/lookup',
                                    method: 'GET',
                                    /* //'5477091202526005',
                                    headers: {
                                        'Authorization': 'Bearer 5477091202526005',
                                    }, */
                                    data: {
                                        search: searchQuery3,
                                        prefer_geolocation: 'city',
                                        max_results: '6',
                                        'auth-id': authId , /* '174963703593278384', 
                                        //'auth-id': 'cf19fb0e-b635-f97d-470f-3517b8e82015', 
                                        //'auth-token': 'Uwu2LtPC2yEjfAN7SFQ0' */
                                    },
                                    success: function(resp_text) {
                                        // Handle the response data
                                        displayResults1(resp_text); 
                                        
                                        setTimeout(function() {
                                            suggestions_item_func1();
                                        }, 1000);  
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', error);
                                    }
                                });
                            }


                            function displayResults1(resp_text) {
                                var resultsList = $('#ss_suggestions1');
                                resultsList.empty();
                                /* resultsList.html(''); */

                                if (resp_text && resp_text.suggestions) {
                                    resultsList.addClass('active');
                                    resp_text.suggestions.forEach(function(suggestion) {
                                        var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state+', '+ suggestion.zipcode;
                                        address_title = address_title.trim(); 
                                        resultsList.append('<li class="ss_suggestion_item" data-item-street-line="' + suggestion.street_line + '" data-item-secondary="' + suggestion.secondary + '" data-item-city="' + suggestion.city + '" data-item-state="' + suggestion.state + '" data-item-zipcode="' + suggestion.zipcode + '" data-item-entries="' + suggestion.entries + '" data-item-address="' + address_title + '">' + address_title + '</li>');
                                    });  
                                }
                            }

                            function suggestions_item_func1() {  
                                $(".ss_suggestion_item").click(function(){ 
                                    var street_line_Val = $(this).attr('data-item-street-line');
                                    var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr('data-item-secondary') : '';
                                
                                    $('#building_no').val( street_line_Val ); 
                                    $('#street_name').val( street_line_Val );  
                                    //$('#fetch_custom_smarty_address #street_name').val( secondary_val );   
                                    
                                    var stateAbbrvVal = $(this).attr('data-item-state');
                                    $('select#state option[data-state-abbrv="' + stateAbbrvVal + '"]').prop('selected', true);

                                    $("select#state").trigger("change");
                    
                                    /* setTimeout(function() {
                                        $('#fetch_custom_smarty_address #city_legal').val($(this).attr('data-item-city') );
                                    }, 1500);  */
                                    
                                    $('#zipcode').val($(this).attr('data-item-zipcode') ); 


                                    $('#ss_suggestions1').removeClass('active');
                                    $('#ss_suggestions1').empty(); 
                                });
                            }

                                /* 
                                {
                                    "1": {
                                        "street_line": "1 Mina Dr",
                                        "secondary": "#",
                                        "city": "Jersey City",
                                        "state": "NJ",
                                        "zipcode": "07305",
                                        "entries": 2
                                    }
                                }
                            */  
                        </script> 
                        
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="building_no" class="mb-2"> Building No</label>

                                <input value="{{$govt->building_no ?? ""}}" name="building_no" type="text" class="form-control wizard-required"
                                    id="building_no">
                                <div class="ss_suggestion_list" id="ss_suggestions1"> </div> 
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="street_name" class="mb-2">What is your Office / Agency
                                Physical Street Name?</label>

                                <input value="{{$govt->street_name ?? ""}}" name="street_name" type="text" class="form-control wizard-required"
                                    id="street_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">

                                    <label for="street_name" class="mb-2">Urbanization Name</label>
                                <select class="form-control" name="urbanization_name" id="urbanization_name">
                                   
                                    <option @if (!empty($govt) && $govt->urbanization_name == 'puerto_rico') selected @endif value="puerto_rico">Puerto Rico</option>
                                    <option @if (!empty($govt) && $govt->urbanization_name == 'virgin_island') selected @endif value="virgin_island">Virgin Island</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="street_name" class="mb-2">State</label>
                                <select class="form-control" name="state" id="state" required>
                                    <option value="">Select State </option>
                                    <?php 
                                        $states_arrs = get_h_states_list();
                                        if($states_arrs){
                                            foreach($states_arrs as $stateName => $stateAbbrv ){ ?>
                                                <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" <?=((isset($govt->state) && $govt->state == $stateName) ? 'selected="selected"' : '' )?> > {{ $stateName }} </option>
                                            <?php 
                                            } 
                                        }  ?>   
                                </select>
                                <p class="text_danger form_error"></p>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="city" class="mb-2">City</label>

                                <select class="form-control" name="city" id="city" required>
                                    <option value="{{ $govt->city ?? '' }}" selected>{{ $govt->city ?? '' }}</option>
                                </select>
                                <p class="text_danger form_error"></p>
                
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="county" class="mb-2">County</label>

                                <input value="{{$govt->county ?? ""}}"  name="county" type="text"
                                    class="form-control wizard-required" id="county" >
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zipcode" class="mb-2">Zipcode </label>
                                <input value="{{$govt->zipcode ?? ""}}"  name="zipcode" type="number"
                                    class="form-control wizard-required" id="zipcode" >
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="country_code" class="mb-2">Country code</label>
                                <input value="{{$govt->country_code ?? ""}}" name="country_code" type="number" class="form-control wizard-required"
                                    id="country_code">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="primary_telephone_no" class="mb-2"> What is your Office / Agency Primary Telephone Number?  </label>
                                <input value="{{$govt->primary_telephone_no ?? ""}}" name="primary_telephone_no" type="number" class="form-control wizard-required"
                                    id="primary_telephone_no">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>


                        


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="agency">is your agency?</label>
                                <div class="wizard-form-radio">
                                    <input  name="agency" value="fedral" @if(empty($govt) || $govt->agency == 'fedral') checked @endif type="radio">
                                    <label for="agency">Fedral</label>
                                </div>
                                <div class="wizard-form-radio">
                                    <input name="agency" value="state" @if(!empty($govt) && $govt->agency == 'state') checked @endif type="radio">
                                    <label for="agency">State</label>
                                </div>
                                <div class="wizard-form-radio">
                                    <input name="agency" value="county" @if(!empty($govt) && $govt->agency == 'county') checked @endif type="radio">
                                    <label for="agency">County</label>
                                </div>

                                <div class="wizard-form-radio">
                                    <input name="agency" value="city" @if(!empty($govt) && $govt->agency == 'city') checked @endif type="radio">
                                    <label for="agency">City</label>
                                </div>
                                <div class="wizard-form-radio">
                                    <input name="agency" value="village" @if(!empty($govt) && $govt->agency == 'village') checked @endif type="radio">
                                    <label for="agency">Village</label>
                                </div>
                                <div class="wizard-form-radio">
                                    <input name="agency" value="township" @if(!empty($govt) && $govt->agency == 'township') checked @endif type="radio">
                                    <label for="agency">Township</label>
                                </div>
                                <div class="wizard-form-radio">
                                    <input name="agency" value="parish" @if(!empty($govt) && $govt->agency == 'parish') checked @endif type="radio">
                                    <label for="agency">Parish</label>
                                </div>


                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="agency_description" class="mb-2">What Sector Best
                                    Describes Your Agency?</label>
                                <select class="form-control" name="agency_description" id="agency_description">
                                    <option value="border_surveillance" @if (!empty($govt) && $govt->agency_description == 'border_surveillance') selected @endif>Border Surveillance</option>
                                    <option value="chemical_sector" @if (!empty($govt) && $govt->agency_description == 'chemical_sector') selected @endif>Chemical Sector</option>
                                    <option value="commercial_facilities_sector" @if (!empty($govt) && $govt->agency_description == 'commercial_facilities_sector') selected @endif>Commercial Facilities Sector</option>
                                    <option value="commercial_sector" @if (!empty($govt) && $govt->agency_description == 'commercial_sector') selected @endif>Commercial Sector</option>
                                    <option value="critical_manufacturing_sector" @if (!empty($govt) && $govt->agency_description == 'critical_manufacturing_sector') selected @endif>Critical Manufacturing Sector</option>
                                    <option value="dams_sector" @if (!empty($govt) && $govt->agency_description == 'dams_sector') selected @endif>Dams Sector</option>
                                    <option value="defense_industrial_base_sector" @if (!empty($govt) && $govt->agency_description == 'defense_industrial_base_sector') selected @endif>Defense Industrial Base Sector</option>
                                    <option value="emergency_services_sector" @if (!empty($govt) && $govt->agency_description == 'emergency_services_sector') selected @endif>Emergency Services Sector</option>
                                    <option value="energy_sector" @if (!empty($govt) && $govt->agency_description == 'energy_sector') selected @endif>Energy Sector</option>
                                    <option value="financial_services_sector" @if (!empty($govt) && $govt->agency_description == 'financial_services_sector') selected @endif>Financial Services Sector</option>
                                    <option value="food_and_agriculture_sector" @if (!empty($govt) && $govt->agency_description == 'food_and_agriculture_sector') selected @endif>Food and Agriculture Sector</option>
                                    <option value="government_facilities_sector" @if (!empty($govt) && $govt->agency_description == 'government_facilities_sector') selected @endif>Government Facilities Sector</option>
                                    <option value="healthcare_and_public_health_sector" @if (!empty($govt) && $govt->agency_description == 'healthcare_and_public_health_sector') selected @endif>Healthcare and Public Health Sector</option>
                                    <option value="homeland_security" @if (!empty($govt) && $govt->agency_description == 'homeland_security') selected @endif>Homeland Security</option>
                                    <option value="information_technology_sector" @if (!empty($govt) && $govt->agency_description == 'information_technology_sector') selected @endif>Information Technology Sector</option>
                                    <option value="materials_and_waste_sector" @if (!empty($govt) && $govt->agency_description == 'materials_and_waste_sector') selected @endif>Materials and Waste Sector</option>
                                    <option value="nuclear_reactors" @if (!empty($govt) && $govt->agency_description == 'nuclear_reactors') selected @endif>Nuclear Reactors</option>
                                    <option value="transportation_systems_sector" @if (!empty($govt) && $govt->agency_description == 'transportation_systems_sector') selected @endif>Transportation Systems Sector</option>
                                    <option value="waste_and_wastewater_systems_sector" @if (!empty($govt) && $govt->agency_description == 'waste_and_wastewater_systems_sector') selected @endif>Waste and Wastewater Systems Sector</option>

                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>



                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label class="mb-2"> What is the Name of the Agency that You
                                    Represent?</label>
                                <input value="{{$govt->agency_name ?? ""}}" name="agency_name" type="text" class="form-control wizard-required"
                                    id="agency_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" name="budgeting_authority" @if(optional($govt)->budgeting_authority == 1) checked  @endif value="1"  id="budgeting_authority_yes" type="checkbox" role="switch"
                                />
                            <label class="form-check-label " for="your-responce">Do You Have Budgeting / Procurement Authority?</label>
                        </div>
                       


                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label class="mb-2">what is Your Approximate Amount of Budgeting
                                    Authority?</label>
                                <select class="form-control" name="budgeting_amount" id="budgeting_amount">
                                    <option>
                                    </option>
                                    <option value="0_100000" @if (!empty($govt) && $govt->budgeting_amount >= 0 && $govt->budgeting_amount <= 100000) selected @endif>$0 – $100,000</option>
                                    <option value="100000_250000" @if (!empty($govt) && $govt->budgeting_amount > 100000 && $govt->budgeting_amount <= 250000) selected @endif>$100,000 - $250,000</option>
                                    <option value="250000_500000" @if (!empty($govt) && $govt->budgeting_amount > 250000 && $govt->budgeting_amount <= 500000) selected @endif>$250,000 - $500,000</option>
                                    <option value="500000_1000000" @if (!empty($govt) && $govt->budgeting_amount > 500000 && $govt->budgeting_amount <= 1000000) selected @endif>$500,000 - $1,000,000</option>
                                    <option value="1000000_3000000" @if (!empty($govt) && $govt->budgeting_amount > 1000000 && $govt->budgeting_amount <= 3000000) selected @endif>$1,000,000 - $3,000,000</option>
                                    <option value="3000000_5000000" @if (!empty($govt) && $govt->budgeting_amount > 3000000 && $govt->budgeting_amount <= 5000000) selected @endif>$3,000,000 – $5,000,000</option>
                                    <option value="5000000_plus" @if (!empty($govt) && $govt->budgeting_amount > 5000000) selected @endif>$5,000,000 +</option>
                                    

                                </select>
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="help_description" class="mb-2">Describe in Detail How
                                    Ginicoe Can Help You.</label>
                                <textarea name="help_description" class="form-control wizard-required" id="help_description"> {{$govt->help_description ?? ""}}</textarea>
                                <p class="text_danger form_error"></p>
                            </div>
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
    <script src="{{ asset('public/backend/js/govt/update_my_info.js') }}"></script>
@endsection
