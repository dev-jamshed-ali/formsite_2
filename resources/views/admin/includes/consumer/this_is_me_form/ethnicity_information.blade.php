<fieldset
    class="wizard-fieldset mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_four') show @endif"
    id="fieldset_four">
    <h4 class="stepper-right-f1 mb-3">
        4. Ethnicity Information
    </h4>
    <input type="hidden" name="form_section" value="ethnicity_information" />

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="Ethnicity" class="mb-2">Ethnicity <span class="star">*</span></label>
         
            <select class="form-control" name="Ethnicity" id="Ethnicity" required>
                <option></option>
                <option value="pacific_islander_americans" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'pacific_islander_americans') selected="selected" @endif>Pacific
                    Islander Americans</option>
                <option value="lgbtq" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'lgbtq')
                selected="selected" @endif>LGBTQ+</option>
                <option value="african_americans" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'african_americans') selected="selected" @endif>African Americans
                </option>
                <option value="asian" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'asian')
                selected="selected" @endif>Asian</option>
                <option value="asian_indians" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'asian_indians') selected="selected" @endif>Asian Indians</option>
                <option value="alaska_natives" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'alaska_natives') selected="selected" @endif>Alaska Natives</option>
                <option value="alaska_native_corporations" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'alaska_native_corporations') selected="selected" @endif>Alaska Native
                    Corporations</option>
                <option value="hasidic_jews" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'hasidic_jews')
                selected="selected" @endif>Hasidic Jews</option>
                <option value="hispanic_americans" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'hispanic_americans') selected="selected" @endif>Hispanic-Americans
                </option>
                <option value="native_americans" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'native_americans') selected="selected" @endif>Native Americans</option>
                <option value="ex_offenders" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'ex_offenders')
                selected="selected" @endif>Ex-Offenders</option>
                <option value="tribal_entities" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'tribal_entities') selected="selected" @endif>Tribal entities</option>
                <option value="decline" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'decline')
                selected="selected" @endif>Decline</option>
                <option value="other_combination_not_described" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'other_combination_not_described') selected="selected" @endif>Other
                    Combination Not Described</option>
                <option value="15_cfr" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == '15_cfr')
                selected="selected" @endif>15 C.F.R. §1400 e.g. Muslims, Disabled, impoverished</option>

                <option value="white" @if(!empty($ethnicity_info) && $ethnicity_info->Ethnicity == 'white')
                selected="selected" @endif>White</option>
            </select>
            <p class="text_danger form_error"></p>


        </div>
        <div class="col-md-4 mb-3">
            <label for="Marital Status" class="mb-2">Current Marital Status?
            </label>
          
                <select class="form-control" name="marital_status" id="marital_status" >
                    <option></option>
                    <option value="divorced" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'divorced') selected @endif>Divorced</option>
                    <option value="domestic_partners" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'domestic_partners') selected @endif>Domestic Partners</option>
                    <option value="engaged" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'engaged') selected @endif>Engaged</option>
                    <option value="married" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'married') selected @endif>Married</option>
                    <option value="other" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'other') selected @endif>Other</option>
                    <option value="separated" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'separated') selected @endif>Separated</option>
                    <option value="significant_other" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'significant_other') selected @endif>Significant Other</option>
                    <option value="single" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'single') selected @endif>Single</option>
                    <option value="unknown" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'unknown') selected @endif>Unknown</option>
                    <option value="widowed" @if (!empty($ethnicity_info) && $ethnicity_info->marital_status == 'widowed') selected @endif>Widowed</option>

                </select>
            <p class="text_danger form_error"></p>

        </div>
        <div class="col-md-4 mb-3">
            <label for="Weight (lbs)" class="mb-2">Weight (lbs)<span class="star">*</span>
            </label>
            <input name="weight" value="{{$ethnicity_info->weight ?? ''}}" type="text"
                class="form-control wizard-required" id="weight">
            <p class="text_danger form_error"></p>

        </div>
        <div class="col-md-4 mb-3">
            <label for="inches" class="mb-2">Height <span class="inches">(inches)</span>
            <span class="star">*</span></label>
            <input name="height" value="{{$ethnicity_info->height ?? ''}}" type="text"
                class="form-control wizard-required" id="height">
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="suffix" class="mb-2">How do others perceive your complexion
                today?
            </label>
           
                <select class="form-control" name="complexion" id="complexion" >
                    <option></option>
                    <option value="albinism" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'albinism') selected @endif>Albinism</option>
                    <option value="black" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'black') selected @endif>Black</option>
                    <option value="brown_skin" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'brown_skin') selected @endif>Brown Skin</option>
                    <option value="brown" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'brown') selected @endif>Brown</option>
                    <option value="dark_brown" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'dark_brown') selected @endif>Dark Brown</option>
                    <option value="dark_skin" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'dark_skin') selected @endif>Dark Skin</option>
                    <option value="freckles" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'freckles') selected @endif>Freckles</option>
                    <option value="light_skin" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'light_skin') selected @endif>Light Skin</option>
                    <option value="liver_spots" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'liver_spots') selected @endif>Liver Spots</option>
                    <option value="medium_white_to_light_brown" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'medium_white_to_light_brown') selected @endif>Medium White To Light Brown</option>
                    <option value="moderate_brown" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'moderate_brown') selected @endif>Moderate Brown</option>
                    <option value="olive" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'olive') selected @endif>Olive</option>
                    <option value="orange" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'orange') selected @endif>Orange</option>
                    <option value="other" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'other') selected @endif>Other</option>
                    <option value="pale_white" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'pale_white') selected @endif>Pale White</option>
                    <option value="pink" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'pink') selected @endif>Pink</option>
                    <option value="suntanned" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'suntanned') selected @endif>Suntanned</option>
                    <option value="tanned" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'tanned') selected @endif>Tanned</option>
                    <option value="very_dark_brown" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'very_dark_brown') selected @endif>Very Dark Brown</option>
                    <option value="vitiligo" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'vitiligo') selected @endif>Vitiligo</option>
                    <option value="white_fair" @if(!empty($ethnicity_info) && $ethnicity_info->complexion == 'white_fair') selected @endif>White Fair</option>


                </select>
                <p class="text_danger form_error"></p><p class="text_danger form_error"></p>
        </div>
    </div>

    <button type="button" name="previous" onclick="returnLater('fieldset_four','consumer_this_is_me')"
        class="form-wizard-return-btn  arrow-btn float-start">
        <img src="{{asset('/public/files/img/arrow-back.png')}}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" onclick="checkFieldSetEthnicityInformation();add_disable_property(['race']);" name="next"
        id="ethnicity_information_button" class="form-wizard-next-btn  arrow-btn float-end">
        Save & Continue
        <img src="{{asset('/public/files/img/btn-arrow.png')}}" alt="btn-arrow" />
    </button>
    <script>
        $(document).ready(function () {
            // Numeric input validation
            $('#weight, #height').on('input', function () {
                var input = $(this);
                var numericValue = input.val().replace(/[^0-9]/g, ''); // Remove non-numeric characters
                input.val(numericValue); // Set the input value to the numeric value
            });
        });
    </script>
    <!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
</fieldset>