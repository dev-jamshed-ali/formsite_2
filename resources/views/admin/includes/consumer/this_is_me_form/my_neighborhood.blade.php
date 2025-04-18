<fieldset class="wizard-fieldset  mt-4 @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_five') show @endif" id="fieldset_five">
   
    <div class="shadow-stepper p-3">
        <div class="row">
            <div class="col-md-4">
                <h4 class="stepper-right-f1 mb-3">
                    5. My Neighborhood is
                </h4>
                <input type="hidden" name="form_section" value="my_neighborhood_information" />
            </div>
            <div class="col-md-4">
                <h6 class="fs-6">
                    <b>Race:</b> Physical characteristics
                </h6>
            </div>
            <div class="col-md-4">
                <h6 class="fs-6">
                    <b>Ethnicity:</b> language, heritage, religion
                </h6>
            </div>
        </div>
        <div class="row">
                <h6 class="fs-6 mt-2 mb-4 stepper-right-f1  ">
                    Standing with the front door of your house address at your back;and where distance is of no consequence,please answer the below directional question to the best of your knowledge.
                </h6>
        </div>

        <div class="row" id="neighborhood_right">
            <div class="col-md-4 mb-3">
                <label for="firstname" class="mb-2">What race are your nearest neighbors to the RIGHT of you?</label>
                <select class="form-select" name="neighborhood_race_right" id="neighborhood_race_right"
                    aria-label="Default select example">
                    <option></option>

                    <option value="pacific_islander_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'pacific_islander_americans') selected @endif>Pacific
                        Islander Americans</option>
                    <option value="lgbtq" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'lgbtq') selected @endif>LGBTQ+</option>
                    <option value="african_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'african_americans') selected @endif>African
                        Americans</option>
                    <option value="asian" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'asian') selected @endif>Asian</option>
                    <option value="asian_indians" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'asian_indians') selected @endif>Asian Indians
                    </option>
                    <option value="alaska_natives" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'alaska_natives') selected @endif>Alaska Natives
                    </option>
                    <option value="alaska_native_corporations" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'alaska_native_corporations') selected @endif>Alaska
                        Native Corporations</option>
                    <option value="hasidic_jews" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'hasidic_jews') selected @endif>Hasidic Jews</option>
                    <option value="hispanic_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'hispanic_americans') selected @endif>
                        Hispanic-Americans</option>
                    <option value="native_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'native_americans') selected @endif>Native
                        Americans</option>
                    <option value="ex_offenders" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'ex_offenders') selected @endif>Ex-Offenders
                    </option>
                    <option value="tribal_entities" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'tribal_entities') selected @endif>Tribal entities
                    </option>
                    <option value="decline" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'decline') selected @endif>Decline</option>
                    <option value="other_combination_not_described" @if (
                        !empty($my_neighborhood_info) &&
                            $my_neighborhood_info->neighborhood_race_right == 'other_combination_not_described') selected @endif>
                        Other Combination Not Described</option>
                    <option value="15_cfr" @if (!empty($ethnicity_info) && $ethnicity_info->race == '15_cfr') selected="selected" @endif>15 C.F.R.
                        §1400 e.g. Muslims, Disabled, impoverished</option>
                    <option value="white" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_right == 'white') selected @endif>White</option>
                </select>
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="l-name" class="mb-2">What is the last name of the head of household of your nearest neighbor to the RIGHT?
                </label>
                <input value="{{ $my_neighborhood_info->name_of_neighborhood_household_head_right ?? '' }}"
                    name="name_of_neighborhood_household_head_right" type="text" class="form-control "
                    id="name_of_neighborhood_household_head_right">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="neighborhood_house_address_right" class="mb-2">Please provide the house address of your nearest neighbor to the RIGHT of you.
                </label>
                <input type="text" class="form-control" id="neighborhood_house_address_right"
                    value="{{ $my_neighborhood_info->neighborhood_house_address_right ?? '' }}"
                    name="neighborhood_house_address_right" />
                <div class="ss_suggestion_list"  id="address_list"></div>
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="State" class="mb-2">Can you provide the GUID of your nearest
                    neighbor
                    to the RIGHT?</label>
                <input value="{{ $my_neighborhood_info->neighborhood_guid_right ?? '' }}" name="neighborhood_guid_right"
                    type="number" class="form-control wizard-required" id="neighborhood_guid_right">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-12 my-2">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" id="provide_neigborhood_address_right"
                        name="provide_neigborhood_address_right" value="1"
                        @if (!empty($my_neighborhood_info) && $my_neighborhood_info->provide_neigborhood_address_right == 1) checked @endif name="provide_neigborhood_address_right"
                        type="checkbox" role="switch" onclick="provide_address('provide_neigborhood_address_right','neighborhood_right')"  />
                    <label class="form-check-label" for="your-responce">House is empty or vacant ?</label>
                    <p class="text_danger form_error"></p>
                </div>
            </div>

            <!-- --------------------- -->
        </div>
    </div>
    <div class="shadow-stepper mt-4 mb-5 p-3 "id="neighborhood_left">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="firstname" class="mb-2">What race are your nearest neighbors
                    to the LEFT of
                    you?</label>
                <select class="form-control" name="neighborhood_race_left" id="neighborhood_race_left" required>
                    <option></option>

                    <option value="pacific_islander_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'pacific_islander_americans') selected @endif> Pacific Islander Americans</option>
                    <option value="lgbtq" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'lgbtq') selected @endif>LGBTQ+</option>
                    <option value="african_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'african_americans') selected @endif>African Americans</option>
                    <option value="asian" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'asian') selected @endif>Asian</option>
                    <option value="asian_indians" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'asian_indians') selected @endif>Asian Indians </option>
                    <option value="alaska_natives" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'alaska_natives') selected @endif>Alaska Natives</option>
                    <option value="alaska_native_corporations" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'alaska_native_corporations') selected @endif>Alaska Native Corporations</option>
                    <option value="hasidic_jews" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'hasidic_jews') selected @endif>Hasidic Jews</option>
                    <option value="hispanic_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'hispanic_americans') selected @endif>Hispanic-Americans</option>
                    <option value="native_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'native_americans') selected @endif>NativeAmericans</option>
                    <option value="ex_offenders" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'ex_offenders') selected @endif>Ex-Offenders</option>
                    <option value="tribal_entities" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'tribal_entities') selected @endif>Tribal entities</option>
                    <option value="decline" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'decline') selected @endif>Decline</option>
                    <option value="other_combination_not_described"
                        @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'other_combination_not_described') selected @endif>
                        Other Combination Not Described</option>
                    <option value="other" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == '15_cfr') selected @endif>15 C.F.R. §1400 e.g.
                        Muslims, Disabled, impoverished</option>
                    <option value="white" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_left == 'white') selected @endif>White</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="l-name" class="mb-2">What is the last name of the head of
                    household of
                    your nearest neighbor to the LEFT of you?
                </label>
                <input value="{{ $my_neighborhood_info->name_of_neighborhood_household_head_left ?? '' }}"
                    name="name_of_neighborhood_household_head_left" type="text"
                    class="form-control wizard-required" id="name_of_neighborhood_household_head_left">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="Area Code" class="mb-2">Please provide the house address of
                    your nearest
                    neighbor to the LEFT of you
                </label>
                <input type="text" class="form-control" id="neighborhood_house_address_left"
                    value="{{ $my_neighborhood_info->neighborhood_house_address_left ?? '' }}"
                    name="neighborhood_house_address_left" required />
                <div class="suggestion_address_left suggestion_list_style" id="address_list_left"> </div>

            </div>
            <div class="col-md-4 mb-3">
                <label for=" No" class="mb-2">Can you provide us the GUID of your
                    nearest
                    neighbor to the LEFT of you?</label>
                <input value="{{ $my_neighborhood_info->neighborhood_guid_left ?? '' }}" name="neighborhood_guid_left"
                    type="number" class="form-control wizard-required" id="neighborhood_guid_left">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-12 my-2">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" id="provide_neigborhood_address_left" value="1"
                        @if (!empty($my_neighborhood_info) && $my_neighborhood_info->provide_neigborhood_address_left == 1) checked @endif name="provide_neigborhood_address_left"
                        name="provide_neigborhood_address_left" type="checkbox" role="switch" onclick="provide_address('provide_neigborhood_address_left','neighborhood_left')"/>
                    <label class="form-check-label" for="your-responce">House is empty or vacant ?</label>
                </div>
            </div>

            <!-- --------------------- -->
        </div>
    </div>
    <div class="shadow-stepper mt-4 mb-5 p-3" id="neighborhood_front">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="firstname" class="mb-2">What race are your nearest neighbors
                    to the FRONT
                    of you?</label>
                <select class="form-control" name="neighborhood_race_front" id="neighborhood_race_front" required>
                    <option></option>

                    <option value="pacific_islander_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'pacific_islander_americans') selected @endif>
                        Pacific
                        Islander Americans</option>
                    <option value="lgbtq" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'lgbtq') selected @endif>LGBTQ+</option>
                    <option value="african_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'african_americans') selected @endif>African
                        Americans</option>
                    <option value="asian" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'asian') selected @endif>Asian</option>
                    <option value="asian_indians" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'asian_indians') selected @endif>Asian Indians
                    </option>
                    <option value="alaska_natives" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'alaska_natives') selected @endif>Alaska Natives
                    </option>
                    <option value="alaska_native_corporations" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'alaska_native_corporations') selected @endif>
                        Alaska
                        Native Corporations</option>
                    <option value="hasidic_jews" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'hasidic_jews') selected @endif>Hasidic Jews
                    </option>
                    <option value="hispanic_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'hispanic_americans') selected @endif>
                        Hispanic-Americans</option>
                    <option value="native_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'native_americans') selected @endif>Native
                        Americans</option>
                    <option value="ex_offenders" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'ex_offenders') selected @endif>Ex-Offenders
                    </option>
                    <option value="tribal_entities" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'tribal_entities') selected @endif>Tribal entities
                    </option>
                    <option value="decline" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'decline') selected @endif>Decline</option>
                    <option value="other_combination_not_described"
                        @if (
                            !empty($my_neighborhood_info) &&
                                $my_neighborhood_info->neighborhood_race_front == 'other_combination_not_described') selected @endif>
                        Other Combination Not Described</option>
                    <option value="15_cfr" @if (!empty($ethnicity_info) && $ethnicity_info->race == '15_cfr') selected="selected" @endif>15 C.F.R.
                        §1400 e.g. Muslims, Disabled, impoverished</option>
                    <option value="white" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_front == 'white') selected @endif>White</option>
                </select>
                <p class="text_danger form_error"></p>


            </div>
            <div class="col-md-4 mb-3">
                <label for="l-name" class="mb-2">What is the last name of the head of
                    household of
                    your nearest neighbor to the FRONT of you?
                </label>
                <input value="{{ $my_neighborhood_info->name_of_neighborhood_household_head_front ?? '' }}"
                    name="name_of_neighborhood_household_head_front" type="text"
                    class="form-control wizard-required" id="name_of_neighborhood_household_head_front">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="Area Code" class="mb-2">Please provide the house address of
                    your nearest
                    neighbor to the FRONT of you?
                </label>
                <input type="text" class="form-control" id="neighborhood_house_address_front"
                    value="{{ $my_neighborhood_info->neighborhood_house_address_front ?? '' }}"
                    name="neighborhood_house_address_front" required />
                <div class="suggestion_address_front suggestion_list_style" id="address_list_front"> </div>
                <p class="text_danger form_error"></p>


            </div>
            <div class="col-md-4 mb-3">
                <label for=" No" class="mb-2">Can you provide us the GUID of your
                    nearest
                    neighbor to the FRONT of you?</label>
                <input value="{{ $my_neighborhood_info->neighborhood_guid_front ?? '' }}"
                    name="neighborhood_guid_front" type="number" class="form-control wizard-required"
                    id="neighborhood_guid_front">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-12 my-2">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" value="1" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->provide_neigborhood_address_front == 1) checked @endif
                        name="provide_neigborhood_address_front" id="provide_neigborhood_address_front"
                        type="checkbox" role="switch" id="your-responce" onclick="provide_address('provide_neigborhood_address_front','neighborhood_front')"/>
                    <label class="form-check-label" for="your-responce">House is empty or vacant ?</label>
                </div>
            </div>
            <!-- --------------------- -->
        </div>
    </div>
    <div class="shadow-stepper mt-4 mb-10 p-3" id="neighborhood_back">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="firstname" class="mb-2">What race are your nearest neighbors
                    to the BACK of
                    you?</label>
                <select class="form-control" name="neighborhood_race_back" id="neighborhood_race_back" required>
                    <option></option>

                    <option value="pacific_islander_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'pacific_islander_americans') selected @endif>
                        Pacific
                        Islander Americans</option>
                    <option value="lgbtq" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'lgbtq') selected @endif>LGBTQ+</option>
                    <option value="african_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'african_americans') selected @endif>African
                        Americans</option>
                    <option value="asian" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'asian') selected @endif>Asian</option>
                    <option value="asian_indians" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'asian_indians') selected @endif>Asian Indians
                    </option>
                    <option value="alaska_natives" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'alaska_natives') selected @endif>Alaska Natives
                    </option>
                    <option value="alaska_native_corporations" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'alaska_native_corporations') selected @endif>
                        Alaska
                        Native Corporations</option>
                    <option value="hasidic_jews" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'hasidic_jews') selected @endif>Hasidic Jews
                    </option>
                    <option value="hispanic_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'hispanic_americans') selected @endif>
                        Hispanic-Americans</option>
                    <option value="native_americans" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'native_americans') selected @endif>Native
                        Americans</option>
                    <option value="ex_offenders" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'ex_offenders') selected @endif>Ex-Offenders
                    </option>
                    <option value="tribal_entities" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'tribal_entities') selected @endif>Tribal entities
                    </option>
                    <option value="decline" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'decline') selected @endif>Decline</option>
                    <option value="other_combination_not_described"
                        @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'other_combination_not_described') selected @endif>
                        Other Combination Not Described</option>
                    <option value="15_cfr" @if (!empty($ethnicity_info) && $ethnicity_info->race == '15_cfr') selected="selected" @endif>15 C.F.R.
                        §1400 e.g. Muslims, Disabled, impoverished</option>
                    <option value="white" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->neighborhood_race_back == 'white') selected @endif>White</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-4 mb-3">
                <label for="l-name" class="mb-2">What is the last name of the head of
                    household of
                    your nearest neighbor to the BACK of you?
                </label>
                <input value="{{ $my_neighborhood_info->name_of_neighborhood_household_head_back ?? '' }}"
                    name="name_of_neighborhood_household_head_back" type="text"
                    class="form-control wizard-required" id="name_of_neighborhood_household_head_back">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="Area Code" class="mb-2">Please provide the house address of
                    your nearest
                    neighbor to the BACK of you?
                </label>
                <input type="text" class="form-control" id="neighborhood_house_address_back" placeholder="523|"
                    name="neighborhood_house_address_back"
                    value="{{ $my_neighborhood_info->neighborhood_house_address_back ?? '' }}" />
                <div class="suggestion_address_back_side suggestion_list_style" id="address_list_back"> </div>

            </div>
            <div class="col-md-4 mb-3">
                <label for=" No" class="mb-2">Can you provide us the GUID of your
                    nearest
                    neighbor to the BACK of you?</label>
                <input value="{{ $my_neighborhood_info->neighborhood_guid_back ?? '' }}"
                    name="neighborhood_guid_back" type="number" class="form-control wizard-required"
                    id="neighborhood_guid_back">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-12 my-2">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" value="1" @if (!empty($my_neighborhood_info) && $my_neighborhood_info->provide_neigborhood_address_back == 1) checked @endif
                        name="provide_neigborhood_address_back"  type="checkbox" role="switch"
                        id="provide_neigborhood_address_back" onclick="provide_address('provide_neigborhood_address_back','neighborhood_back')"/>
                    <label class="form-check-label" for="your-responce">House is empty or vacant ?</label>
                </div>
            </div>
        </div>
    </div>

    <button type="button" name="previous" onclick="returnLater('fieldset_five','consumer_this_is_me')"
        class="form-wizard-return-btn arrow-btn float-start">
        <img src="{{ asset('public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" onclick="checkFieldSetNeighborhood()" id="my_neighborhood_button" name="next"
        class="form-wizard-next-btn  arrow-btn float-end">
        Save & Continue
        <img src="{{ asset('public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>
    <script>
            var appUrl = @json($app_url);

        var authId = '180387782200692062';
        if (window.location.href.includes("localhost")) {
            authId = '199536484783203974';
        }
        jQuery(document).ready(function($) {
            var delayTimer1;
            var delayTimer2;
            var delayTimer3;
            var delayTimer4;
            $('#neighborhood_house_address_right').on('input', function() {
                clearTimeout(delayTimer1);
                delayTimer1 = setTimeout(function() {
                    var searchText1 = $('#neighborhood_house_address_right ').val().trim();
                    serach_us_smarty_address_list(searchText1, 'right');
                }, 800);
            });
            $('#neighborhood_house_address_left').on('input', function() {
                clearTimeout(delayTimer2);
                delayTimer2 = setTimeout(function() {
                    var searchText2 = $('#neighborhood_house_address_left').val().trim();
                    serach_us_smarty_address_list(searchText2, 'left');
                }, 800);
            });
            $('#neighborhood_house_address_back').on('input', function() {
                clearTimeout(delayTimer3);
                delayTimer3 = setTimeout(function() {
                    var searchText3 = $('#neighborhood_house_address_back').val().trim();
                    serach_us_smarty_address_list(searchText3, 'back');
                }, 800);
            });
            $('#neighborhood_house_address_front').on('input', function() {
                clearTimeout(delayTimer4);
                delayTimer4 = setTimeout(function() {
                    var searchText4 = $('#neighborhood_house_address_front').val().trim();
                    serach_us_smarty_address_list(searchText4, 'front');
                }, 800);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    provide_address('provide_neigborhood_address_right','neighborhood_right')
provide_address('provide_neigborhood_address_left','neighborhood_left')
provide_address('provide_neigborhood_address_front','neighborhood_front')
provide_address('provide_neigborhood_address_back','neighborhood_back')
});

        function provide_address(id, parentDivId) {
    const checkbox = document.getElementById(id);
    const value = checkbox.checked ? 1 : 0;
    console.log('Checkbox value:', value);

    const parentDiv = document.getElementById(parentDivId);
    const inputs = parentDiv.querySelectorAll('input, select');

    inputs.forEach(input => {
        if (input.type !== 'checkbox' && input.id !== id) {
            input.disabled = value === 1;
            input.required = value === 0;
        }
    });
}
        function serach_us_smarty_address_list(searchQuery1 = '', address_type) {
            /* Make an AJAX request to the SmartyStreets US Autocomplete API */
            $.ajax({
                url: `https://ginicoe.com/getautocomplete`,
                method: 'GET',

                data: {
                    search: searchQuery1,
                    prefer_geolocation: 'city',
                    max_results: '6',

                },
                success: function(resp_text) {
                    // Handle the response data
                    resp_text = JSON.parse(resp_text)
                    if (address_type === 'right') {
                        displayResults1(resp_text);
                        setTimeout(function() {
                            suggestions_item_func1();
                        }, 1000);
                    }
                    if (address_type === 'left') {
                        displayResults2(resp_text);
                        setTimeout(function() {
                            suggestions_item_func2();
                        }, 1000);
                    }
                    if (address_type === 'back') {
                        displayAddressBackList(resp_text);
                        setTimeout(function() {
                            suggestions_item_func3();
                        }, 1000);
                    }
                    if (address_type === 'front') {
                        displayResults4(resp_text);
                        setTimeout(function() {
                            suggestions_item_func4();
                        }, 1000);
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }


        function displayAddressBackList(data) {
            var resultsList = $('#address_list_back');
            resultsList.empty();
            /* resultsList.html(''); */
            let inputWith = $("#neighborhood_house_address_back").outerWidth(true);
            $("#address_list_back").width(inputWith)

            if (data && data.suggestions) {
                resultsList.addClass('active');
                data.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state +
                        ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="suggestion_address_back" data-item-street-line="' + suggestion
                        .street_line + '" data-item-secondary="' + suggestion.secondary + '" data-item-city="' +
                        suggestion.city + '" data-item-state="' + suggestion.state + '" data-item-zipcode="' +
                        suggestion.zipcode + '" data-item-entries="' + suggestion.entries +
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestions_item_func3() {
            $(".suggestion_address_back").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var city = $(this).attr('data-item-city');
                var state = $(this).attr('data-item-state');
                var zipcode = $(this).attr('data-item-zipcode');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr(
                    'data-item-secondary') : '';
                var resultsList = $('#address_list_back');
                resultsList.append('<input type="hidden" name="neighborhood_urbanization_name_back" value="' +
                    street_line_Val + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_zipcode_back" value="' + zipcode +
                    '" />');
                resultsList.append('<input type="hidden" name="neighborhood_state_back" value="' + state + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_city_back" value="' + city + '" />');
                $('#neighborhood_house_address_back').val(street_line_Val + ', ' + city + ', ' + state + ', ' +
                    zipcode);
                //$('#neighborhood_house_address_back #street_name').val( secondary_val );   

                var stateAbbrvVal = $(this).attr('data-item-state');
                $('#neighborhood_house_address_back select#state_legal option[data-state-abbrv="' + stateAbbrvVal +
                    '"]').prop('selected', true);

                $("#neighborhood_house_address_back select#state_legal").trigger("change");

                /* setTimeout(function() {
                    $('#neighborhood_house_address_back #city_legal').val($(this).attr('data-item-city') );
                }, 1500);  */

                $('#neighborhood_house_address_back #zip_legal').val($(this).attr('data-item-zipcode'));


                resultsList.removeClass('active');
                // resultsList.empty(); 
            });
        }

        function displayResults4(resp_text) {
            var resultsList = $('#address_list_front');
            resultsList.empty();
            let inputWith = $("#neighborhood_house_address_front").outerWidth(true);
            $("#address_list_front").width(inputWith)
            /* resultsList.html(''); */

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state +
                        ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="suggestion_address_front_items" data-item-street-line="' +
                        suggestion.street_line + '" data-item-secondary="' + suggestion.secondary +
                        '" data-item-city="' + suggestion.city + '" data-item-state="' + suggestion.state +
                        '" data-item-zipcode="' + suggestion.zipcode + '" data-item-entries="' + suggestion
                        .entries + '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestions_item_func4() {
            $(".suggestion_address_front_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var city = $(this).attr('data-item-city');
                var state = $(this).attr('data-item-state');
                var zipcode = $(this).attr('data-item-zipcode');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr(
                    'data-item-secondary') : '';
                var resultsList = $('#address_list_front');
                resultsList.append('<input type="hidden" name="neighborhood_urbanization_name_front" value="' +
                    street_line_Val + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_zipcode_front" value="' + zipcode +
                    '" />');
                resultsList.append('<input type="hidden" name="neighborhood_state_front" value="' + state + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_city_front" value="' + city + '" />');
                $('#neighborhood_house_address_front').val(street_line_Val + ', ' + city + ', ' + state + ', ' +
                    zipcode);
                //$('#neighborhood_house_address_front #street_name').val( secondary_val );   

                var stateAbbrvVal = $(this).attr('data-item-state');
                $('#neighborhood_house_address_front select#state_legal option[data-state-abbrv="' + stateAbbrvVal +
                    '"]').prop('selected', true);

                $("#neighborhood_house_address_front select#state_legal").trigger("change");

                /* setTimeout(function() {
                    $('#neighborhood_house_address_front #city_legal').val($(this).attr('data-item-city') );
                }, 1500);  */

                $('#neighborhood_house_address_front #zip_legal').val($(this).attr('data-item-zipcode'));


                resultsList.removeClass('active');
                // resultsList.empty(); 
            });
        }

        function displayResults2(resp_text) {
            var resultsList = $('#address_list_left');
            resultsList.empty();
            let inputWith = $("#neighborhood_house_address_left").outerWidth(true);
            $("#address_list_left").width(inputWith)
            /* resultsList.html(''); */

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');

                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state +
                        ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="suggestion_address_left_items" data-item-street-line="' +
                        suggestion.street_line + '" data-item-secondary="' + suggestion.secondary +
                        '" data-item-city="' + suggestion.city + '" data-item-state="' + suggestion.state +
                        '" data-item-zipcode="' + suggestion.zipcode + '" data-item-entries="' + suggestion
                        .entries + '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestions_item_func2() {

            $(".suggestion_address_left_items").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var city = $(this).attr('data-item-city');
                var state = $(this).attr('data-item-state');
                var zipcode = $(this).attr('data-item-zipcode');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr(
                    'data-item-secondary') : '';
                var resultsList = $('#address_list_left');
                resultsList.append('<input type="hidden" name="neighborhood_urbanization_name_left" value="' +
                    street_line_Val + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_zipcode_left" value="' + zipcode +
                    '" />');
                resultsList.append('<input type="hidden" name="neighborhood_state_left" value="' + state + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_city_left" value="' + city + '" />');
                $('#neighborhood_house_address_left').val(street_line_Val + ', ' + city + ', ' + state + ', ' +
                    zipcode);
                //$('#neighborhood_house_address_left #street_name').val( secondary_val );   

                var stateAbbrvVal = $(this).attr('data-item-state');
                $('#neighborhood_house_address_left select#state_legal option[data-state-abbrv="' + stateAbbrvVal +
                    '"]').prop('selected', true);

                $("#neighborhood_house_address_left select#state_legal").trigger("change");

                /* setTimeout(function() {
                    $('#neighborhood_house_address_left #city_legal').val($(this).attr('data-item-city') );
                }, 1500);  */

                $('#neighborhood_house_address_left #zip_legal').val($(this).attr('data-item-zipcode'));


                resultsList.removeClass('active');
                // resultsList.empty(); 
            });
        }

        function displayResults1(resp_text) {
            var resultsList = $('#address_list');
            let inputWith = $("#neighborhood_house_address_right").outerWidth(true);
            $("#address_list").width(inputWith)
            resultsList.empty();
            /* resultsList.html(''); */

            if (resp_text && resp_text.suggestions) {
                resultsList.addClass('active');
                resp_text.suggestions.forEach(function(suggestion) {
                    var address_title = suggestion.street_line + ', ' + suggestion.city + ', ' + suggestion.state +
                        ', ' + suggestion.zipcode;
                    address_title = address_title.trim();
                    resultsList.append('<li class="ss_suggestion_item" data-item-street-line="' + suggestion
                        .street_line + '" data-item-secondary="' + suggestion.secondary + '" data-item-city="' +
                        suggestion.city + '" data-item-state="' + suggestion.state + '" data-item-zipcode="' +
                        suggestion.zipcode + '" data-item-entries="' + suggestion.entries +
                        '" data-item-address="' + address_title + '">' + address_title + '</li>');
                });
            }
        }

        function suggestions_item_func1() {
            $(".ss_suggestion_item").click(function() {
                var street_line_Val = $(this).attr('data-item-street-line');
                var city = $(this).attr('data-item-city');
                var state = $(this).attr('data-item-state');
                var zipcode = $(this).attr('data-item-zipcode');
                var secondary_val = ($(this).attr('data-item-secondary') != '#') ? $(this).attr(
                    'data-item-secondary') : '';
                var resultsList = $('#address_list');
                resultsList.append('<input type="hidden" name="neighborhood_urbanization_name_right" value="' +
                    street_line_Val + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_zipcode_right" value="' + zipcode +
                    '" />');
                resultsList.append('<input type="hidden" name="neighborhood_state_right" value="' + state + '" />');
                resultsList.append('<input type="hidden" name="neighborhood_city_right" value="' + city + '" />');

                $('#neighborhood_house_address_right').val(street_line_Val + ', ' + city + ', ' + state + ', ' +
                    zipcode);
                //$('#neighborhood_house_address_right #street_name').val( secondary_val );   

                var stateAbbrvVal = $(this).attr('data-item-state');
                $('#neighborhood_house_address_right select#state_legal option[data-state-abbrv="' + stateAbbrvVal +
                    '"]').prop('selected', true);

                $("#neighborhood_house_address_right select#state_legal").trigger("change");

                /* setTimeout(function() {
                    $('#neighborhood_house_address_right #city_legal').val($(this).attr('data-item-city') );
                }, 1500);  */

                $('#neighborhood_house_address_right #zip_legal').val($(this).attr('data-item-zipcode'));


                resultsList.removeClass('active');
                // resultsList.empty(); 
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
</fieldset>
