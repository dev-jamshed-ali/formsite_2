<fieldset class="wizard-fieldset  @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_two') show @endif" id="fieldset_two">
    <input type="hidden" name="form_section" value="find_me_here" />
    <input type="hidden" name="latitude" id="latitude" />
    <input type="hidden" name="longitude" id="longitude" />

    <div class="shadow-stepper p-3">
        <h4 class="stepper-right-f1 mb-3">
            2. You can find me here
        </h4>

        <div class="row">
            <div class="col-md-4 mb-3 form-group">
                <label for="house-address" class="mb-2">House Address<span class="star">*</span>
                </label>
                <div class="position-relative">
                    <input value="{{ $find_me_here->house_address ?? '' }}"
                        attr-value="{{ $find_me_here->house_address ?? '' }}" name="house_address"
                        id="house_address_find_me" type="text" class="form-control wizard-required" />
                    <div class="address-preloader position-absolute"
                        style="display: none; right: 10px; top: 50%; transform: translateY(-50%);">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="ss_suggestion_list" id="list_smarty_add"> </div>
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Test" class="mb-2">Building Name </label>
                <input value="{{ $find_me_here->building_name ?? '' }}" name="building_name" type="text"
                    class="form-control wizard-required" id="building_name" />
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Street-Name" class="mb-2">Street Name<span class="star">*</span>
                </label>
                <input value="{{ $find_me_here->street_name ?? '' }}" name="street_name" type="text"
                    class="form-control wizard-required" id="street_name_data" />
                <p class="text_danger form_error"></p>

            </div>

            <div class="col-md-4 mb-3 form-group">
                <label for="state" class="mb-2">State<span class="star">*</span></label>
                <select class="form-control" id="state" name="state" required>
                    <option value="">Select State</option>
                    <option value="AL"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'AL' ? 'selected' : '' }}>Alabama
                    </option>
                    <option value="AK"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'AK' ? 'selected' : '' }}>Alaska
                    </option>
                    <option value="AZ"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'AZ' ? 'selected' : '' }}>Arizona
                    </option>
                    <option value="AR"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'AR' ? 'selected' : '' }}>Arkansas
                    </option>
                    <option value="CA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'CA' ? 'selected' : '' }}>California
                    </option>
                    <option value="CO"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'CO' ? 'selected' : '' }}>Colorado
                    </option>
                    <option value="CT"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'CT' ? 'selected' : '' }}>Connecticut
                    </option>
                    <option value="DE"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'DE' ? 'selected' : '' }}>Delaware
                    </option>
                    <option value="FL"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'FL' ? 'selected' : '' }}>Florida
                    </option>
                    <option value="GA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'GA' ? 'selected' : '' }}>Georgia
                    </option>
                    <option value="HI"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'HI' ? 'selected' : '' }}>Hawaii
                    </option>
                    <option value="ID"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'ID' ? 'selected' : '' }}>Idaho
                    </option>
                    <option value="IL"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'IL' ? 'selected' : '' }}>Illinois
                    </option>
                    <option value="IN"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'IN' ? 'selected' : '' }}>Indiana
                    </option>
                    <option value="IA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'IA' ? 'selected' : '' }}>Iowa
                    </option>
                    <option value="KS"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'KS' ? 'selected' : '' }}>Kansas
                    </option>
                    <option value="KY"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'KY' ? 'selected' : '' }}>Kentucky
                    </option>
                    <option value="LA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'LA' ? 'selected' : '' }}>Louisiana
                    </option>
                    <option value="ME"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'ME' ? 'selected' : '' }}>Maine
                    </option>
                    <option value="MD"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MD' ? 'selected' : '' }}>Maryland
                    </option>
                    <option value="MA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MA' ? 'selected' : '' }}>
                        Massachusetts</option>
                    <option value="MI"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MI' ? 'selected' : '' }}>Michigan
                    </option>
                    <option value="MN"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MN' ? 'selected' : '' }}>Minnesota
                    </option>
                    <option value="MS"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MS' ? 'selected' : '' }}>Mississippi
                    </option>
                    <option value="MO"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MO' ? 'selected' : '' }}>Missouri
                    </option>
                    <option value="MT"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'MT' ? 'selected' : '' }}>Montana
                    </option>
                    <option value="NE"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NE' ? 'selected' : '' }}>Nebraska
                    </option>
                    <option value="NV"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NV' ? 'selected' : '' }}>Nevada
                    </option>
                    <option value="NH"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NH' ? 'selected' : '' }}>New
                        Hampshire</option>
                    <option value="NJ"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NJ' ? 'selected' : '' }}>New Jersey
                    </option>
                    <option value="NM"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NM' ? 'selected' : '' }}>New Mexico
                    </option>
                    <option value="NY"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NY' ? 'selected' : '' }}>New York
                    </option>
                    <option value="NC"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'NC' ? 'selected' : '' }}>North
                        Carolina</option>
                    <option value="ND"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'ND' ? 'selected' : '' }}>North
                        Dakota</option>
                    <option value="OH"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'OH' ? 'selected' : '' }}>Ohio
                    </option>
                    <option value="OK"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'OK' ? 'selected' : '' }}>Oklahoma
                    </option>
                    <option value="OR"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'OR' ? 'selected' : '' }}>Oregon
                    </option>
                    <option value="PA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'PA' ? 'selected' : '' }}>
                        Pennsylvania</option>
                    <option value="RI"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'RI' ? 'selected' : '' }}>Rhode
                        Island</option>
                    <option value="SC"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'SC' ? 'selected' : '' }}>South
                        Carolina</option>
                    <option value="SD"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'SD' ? 'selected' : '' }}>South
                        Dakota</option>
                    <option value="TN"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'TN' ? 'selected' : '' }}>Tennessee
                    </option>
                    <option value="TX"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'TX' ? 'selected' : '' }}>Texas
                    </option>
                    <option value="UT"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'UT' ? 'selected' : '' }}>Utah
                    </option>
                    <option value="VT"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'VT' ? 'selected' : '' }}>Vermont
                    </option>
                    <option value="VA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'VA' ? 'selected' : '' }}>Virginia
                    </option>
                    <option value="WA"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'WA' ? 'selected' : '' }}>Washington
                    </option>
                    <option value="WV"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'WV' ? 'selected' : '' }}>West
                        Virginia</option>
                    <option value="WI"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'WI' ? 'selected' : '' }}>Wisconsin
                    </option>
                    <option value="WY"
                        {{ isset($find_me_here->state) && $find_me_here->state == 'WY' ? 'selected' : '' }}>Wyoming
                    </option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="city" class="mb-2">City<span class="star">*</span></label>
                <input type="text" class="form-control" id="city" placeholder="City"
                    value="{{ $find_me_here->city ?? '' }}" name="city" required />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Town" class="mb-2">Town</label>
                <input value="{{ $find_me_here->town ?? '' }}" name="town" type="text"
                    class="form-control wizard-required" id="town" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="township" class="mb-2">Township </label>
                <input value="{{ $find_me_here->township ?? '' }}" name="township" type="text"
                    class="form-control wizard-required" id="township" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="parish" class="mb-2">Parish </label>
                <input value="{{ $find_me_here->parish ?? '' }}" name="parish" type="text"
                    class="form-control wizard-required" id="parish" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="village" class="mb-2">Village </label>
                <input value="{{ $find_me_here->village ?? '' }}" name="village" type="text"
                    class="form-control wizard-required" id="village" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Hamlet" class="mb-2">Hamlet </label>
                <input value="{{ $find_me_here->hamlet ?? '' }}" name="hamlet" type="text"
                    class="form-control wizard-required" id="hamlet" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Congressional" class="mb-2">Congressional District</label>
                <input value="{{ $find_me_here->district ?? '' }}" name="district" type="text"
                    class="form-control wizard-required" id="district" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Test country" class="mb-2">County<span class="star">*</span></label>
                <input value="{{ $find_me_here->county ?? '' }}" name="county" type="text"
                    class="form-control wizard-required" id="county"
                    @if (!empty($find_me_here)) disabled @endif />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Name of Neighborhood" class="mb-2">Name of
                    Neighborhood</label>
                <input value="{{ $find_me_here->neighborhood_name ?? '' }}" name="neighborhood_name" type="text"
                    class="form-control wizard-required" id="neighborhood_name" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Zip Code" class="mb-2">Zip Code<span class="star">*</span></label>
                <input value="{{ $find_me_here->zipcode ?? '' }}" name="zipcode" type="text"
                    class="form-control wizard-required" id="zip_code" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Urbanization" class="mb-2">Urbanization (Puerto Rico &
                    Virgin Island
                    Only)</label>
                <input type="text" value="{{ !empty($find_me_here) ? $find_me_here->urbanization_name : '' }}"
                    class="form-control" id="urbanization_name" placeholder="Urbanization"
                    name="urbanization_name" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="House Type" value="{{ !empty($find_me_here) ? $find_me_here->house_type : '' }}"
                    class="mb-2">House Type</label>
                <input type="text" class="form-control" id="house_type" name="house_type" required />
                <p class="text_danger form_error"></p>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-4 p-3">
            <div class="form-check form-switch pb-2">
                <input class="form-check-input" name="do_you_live_in_sky_crapper" onclick="sky_crapper_field()"
                    @if (!empty($find_me_here) && $find_me_here->do_you_live_in_sky_crapper) checked @endif type="checkbox" role="switch"
                    id="do_you_live_in_sky_crapper" />
                <label class="form-check-label label-italic" for="your-responce">Do you
                    live in multi-story building?</label>
            </div>
            <div class="form-check form-switch pb-2">
                <input class="form-check-input" type="checkbox" @if (!isset($find_me_here) || $find_me_here->living_for_two_years === 1) checked @endif
                    onclick="living_for_two_year()" name="living_for_two_years" role="switch"
                    id="living_for_two_years" />


                <label class="form-check-label label-italic" for="your-responce">Have
                    you lived at this address for 2 years or more?
                    <span>(Permanent)</span></label>
            </div>
        </div>
    </div>
    <div class="shadow-stepper mb-10 p-3" id="additional-address-info" style="display: none;">
        <div class="row">
            <div class="col-md-4 mb-3 form-group">
                <label for="Email" class="mb-2">Email<span class="star">*</span></label>
                <input value="{{ $find_me_here->email ?? '' }}" name="email" type="email"
                    class="form-control wizard-required" id="email" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="number" class="mb-2">primary Mobile area code & number<span class="star">*</span>
                </label>
                <input value="{{ $find_me_here->primary_mobile_number ?? '' }}" name="primary_mobile_number"
                    type="text" class="form-control wizard-required" id="primary_mobile_number" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for="Area Code" class="mb-2">Alternate Telephone no. Area Code
                </label>
                <input value="{{ $find_me_here->alternate_area_code ?? '' }}" name="alternate_area_code"
                    type="text" class="form-control wizard-required" id="alternate_area_code" />
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3 form-group">
                <label for=" Alternate Telephone No" class="mb-2"> Alternate Telephone
                    No</label>
                <input value="{{ $find_me_here->alternate_telephone_number ?? '' }}"
                    name="alternate_telephone_number" type="text" class="form-control "
                    id="alternate_telephone_number" />
                <!-- <p class="text_danger form_error"></p> -->

            </div>

        </div>
    </div>

    <button type="button" onclick="returnLater('fieldset_two','consumer_this_is_me')" name="previous"
        class="form-wizard-return-btn  arrow-btn float-start">
        <img src="{{ asset('public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" onclick="checkFieldSetThisIsMe()" id="find_me_here_next_button" name="next"
        class="form-wizard-next-btn-without-click  arrow-btn float-end">
        Save & Continue
        <img src="{{ asset('public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>
    <script>
        function living_for_two_year() {
            const checkbox = document.getElementById('living_for_two_years');
          
            const additionalInfo = document.getElementById('additional-address-info');
            console.log(checkbox);
            if (checkbox.checked) {
                // YES selected — hide extra section
                additionalInfo.style.display = 'none';
            } else {
                // NO selected — show extra section
                additionalInfo.style.display = 'block';
            }
        }

        // Page load pe bhi check karo
        document.addEventListener('DOMContentLoaded', function() {
            living_for_two_year();
        });
        jQuery(document).ready(function($) {
            var delayTimer1;
            $('#house_address_find_me').on('input', function() {
                // console.log('input');
                $('.address-preloader').show();
                var value = $(this).val().trim();
                if (value === '') {
                    $('.address-preloader').hide();
                }

                clearTimeout(delayTimer1);
                delayTimer1 = setTimeout(function() {
                    var searchText1 = $('#house_address_find_me').val()
                        .trim();
                    // console.log(searchText1);

                    smarty_api_list(searchText1);
                }, 800);
            });
        });


        function smarty_api_list(searchQuery1 = '') {
            /* Make an AJAX request to the SmartyStreets US Autocomplete API */
            var appUrl = @json($app_url);
            $.ajax({
                url: `http://127.0.0.1:8000/getautocomplete`,
                method: 'GET',
                /* //'5477091202526005',
                headers: {
                    'Authorization': 'Bearer 5477091202526005',
                }, */
                data: {
                    search: searchQuery1,
                    prefer_geolocation: 'city',
                    max_results: '6',

                    /* '174963703593278384', 
                                       //'auth-id': 'cf19fb0e-b635-f97d-470f-3517b8e82015', 
                                       //'auth-token': 'Uwu2LtPC2yEjfAN7SFQ0' */
                },
                success: function(resp_text) {
                    var data = JSON.parse(resp_text)
                    // Handle the response data
                    display_api_(data);
                    setTimeout(function() {
                        suggestion_click();
                    }, 1000);
                    $('.address-preloader').hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('.address-preloader').hide();
                }
            });
        }



        function display_api_(resp_text) {
            var resultsList = $('#list_smarty_add');
            let inputWith = $("#house_address_find_me").outerWidth(true);
            $(".ss_suggestion_list").width(inputWith)
            resultsList.empty();
            /* resultsList.html(''); */
            if (resp_text && resp_text) {
                resultsList.addClass('active');

                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state +
                        ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="list_api_items" data-item-street-line="' + suggestion
                        .street_line + '" data-item-secondary="' + suggestion.secondary + '" data-item-city="' +
                        suggestion.city + '" data-item-state="' + suggestion.state + '" data-item-zipcode="' +
                        suggestion.zipcode + '" data-item-entries="' + suggestion.entries +
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestion_click() {
            $(".list_api_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr(
                    'data-item-secondary') : '';
                $('#house_address_find_me').val(street_line_Val);
                $('#street_name_data').val(secondary_val);
                $('#zip_code').val($(this).attr('data-item-zipcode'));
                $('#city').val($(this).attr('data-item-city'));
                var stateAbbrvVal = $(this).attr('data-item-state');
                $('#state').val(stateAbbrvVal);
                $('#list_smarty_add').removeClass('active');
                $('#list_smarty_add').empty();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `http://127.0.0.1:8000/getAddressDetail`,
                    method: 'POST',
                    data: {
                        "street": street_line_Val,
                        "city": $(this).attr('data-item-city'),
                        "state": $(this).attr('data-item-state'),
                        "zipcode": $(this).attr('data-item-zipcode'),
                        "candidates": 10
                    },
                    success: function(resp_text) {
                        const meta_data = resp_text[0].metadata
                        const latitude = meta_data.latitude
                        const longitude = meta_data.longitude
                        $('#longitude').val(longitude);
                        $('#latitude').val(latitude);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

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





        function checkFieldSetThisIsMe() {
            var data = {};
            nextWizardStep = false;
            $("#fieldset_two input").each(function() {
                if ($(this).attr("type") == "radio") {
                    const checkedInput = document.querySelector('input[name="' + $(this).attr("name") +
                        '"]:checked');
                    data[$(this).attr("name")] = checkedInput ? checkedInput.value : '';
                    console.log("checkedInput :", checkedInput ? checkedInput.value : '')
                }
                if ($(this).attr("type") == "checkbox") {
                    data[$(this).attr("name")] = $(this).is(":checked") ? 1 : 0;
                }
                if ($(this).attr("type") != "radio" && $(this).attr("type") != "checkbox") {
                    data[$(this).attr("name")] = $(this).val();
                }
            });
            $("#fieldset_two select").each(function() {
                data[$(this).attr("name")] = $(this).val();
            });
            $("#fieldset_two textarea").each(function() {
                data[$(this).attr("name")] = $(this).val();
            });
            data['form_section'] = 'find_me_here';

            if ($("#fieldset_two").find(":input").valid()) {
                nextWizardStep = true;
            } else {
                nextWizardStep = false;

            }
            $("#fieldset_two").find(":input").each(function() {
                if (!$(this).valid()) {
                    nextWizardStep = false;
                    console.log("Field not valid: " + $(this).attr("name"));
                }
            });

            if (nextWizardStep) {
                store_this_is_me_form_data(data, "find_me_here_next_button");

                $(`#find_me_here_bar`).addClass("completed");
                $(`#find_me_here_bar`).addClass("set-filled");
                $(`#find_me_here_bar`).children("div").eq(0).addClass("text-white");
                $(`#find_me_here_bar`).removeClass("active");
                $(`#gender_identity_bar`).addClass("active");
            }
            // move_to_next_step(nextWizardStep,'find_me_here_bar','gender_identity_bar');
            // $.ajax({
            //     url: "/ginicoe/admin/consumer/validate-address",
            //     type: "GET",
            //     dataType: "json",
            //     data: data,
            //     success: function (response) {
            //         if (response.valid) {
            //             console.log("valid", $("#fieldset_two").find(":input").valid());
            //             if ($("#fieldset_two").find(":input").valid()) {
            //                 move_to_next_step(true);
            //             } else {
            //                 move_to_next_step(false);
            //             }
            //         } else {
            //         }
            //     },
            //     error: function (xhr, status, error) {
            //         // Handle error here
            //     },
            // });
            if (!nextWizardStep) {
                console.log(`eeeeeeeeeeeeeeee`);

                // Find invalid fields and log them
                $("#fieldset_two").find(":input").each(function() {
                    if (!$(this).valid()) {
                        console.log(`Invalid field: Name = ${$(this).attr('name')}, ID = ${$(this).attr('id')}`);
                    }
                });
            }
            console.log(":rrrrrr", nextWizardStep);
            console.log(":D", data);
        }
    </script>
</fieldset>
