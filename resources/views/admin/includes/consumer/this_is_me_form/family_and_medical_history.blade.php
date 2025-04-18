<fieldset class="wizard-fieldset  mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_fifteen') show @endif" id="fieldset_fifteen">
    <h5>15. Family & medical History</h5>
    <input type="hidden" name="form_section" value="family_and_medical_information" />

    <div class="row">

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <select name="number_of_brother" class="form-control wizard-required" id="number_of_brother">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                </select>
                <label for="number_of_brother " class="wizard-form-text-label">15.1 How many brothers do you have living?</label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->olders_brother_name ?? ''}}" name="olders_brother_name"  type="text" class="form-control wizard-required"
                    id="olders_brother_name">
                <label for="olders_brother_name" class="wizard-form-text-label">15.2 What is your oldest brother’s first
                    name? </label>
                <p class="text_danger form_error d-none"></p>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <select name="number_of_sister" class="form-control wizard-required" id="number_of_sister">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                </select>
                <label for="number_of_sister" class="wizard-form-text-label">15.3 How many sisters do you have living?</label>
                <p class="text_danger form_error"></p>
            </div>
        </div>



        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->youngest_sister_name ?? ''}}" name="youngest_sister_name" type="text" class="form-control wizard-required" id="youngest_sister_name">
                <label for="youngest_sister_name" class="wizard-form-text-label">15.4 What is your youngest sister’s last
                    name?</label>
                <p class="text_danger form_error d-none"></p>
            </div>
        </div>




        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->place_of_birth ?? ''}}" name="place_of_birth" type="text" class="form-control wizard-required" id="place_of_birth"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="place_of_birth" class="wizard-form-text-label">15.5 What is your place of birth? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error d-none"></p>
            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->name_of_hospital_you_born_in ?? ''}}" name="name_of_hospital_you_born_in" type="text" class="form-control wizard-required" id="name_of_hospital_you_born_in"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="name_of_hospital_you_born_in" class="wizard-form-text-label">15.6 What is the name of the hospital that you were born?  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->name_of_mid_wife ?? ''}}" name="name_of_mid_wife" type="text" class="form-control wizard-required" id="name_of_mid_wife"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="name_of_mid_wife" class="wizard-form-text-label">15.7 If no hospital, what is the name of the mid-wife?  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->first_name_of_mid_wife ?? ''}}" name="first_name_of_mid_wife" type="text" class="form-control wizard-required" id="first_name_of_mid_wife" @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="first_name_of_mid_wife" class="wizard-form-text-label">15.8 First name of mid-wife? <span data-toggle="tooltip" title="You cannot change this field once you submit" class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error d-none"></p>
            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <select name="last_name_of_mid_wife" class="form-control wizard-required" id="last_name_of_mid_wife">
                    @for ($i = 1; $i <= 111; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <label for="last_name_of_mid_wife" class="wizard-form-text-label">15.9 Last name of mid-wife? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input value="{{$family_and_medical_info->exact_location_of_first_reponder ?? ''}}" name="exact_location_of_first_reponder" type="text" class="form-control wizard-required" id="exact_location_of_first_reponder"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="exact_location_of_first_reponder" class="wizard-form-text-label">15.10 If no mid-wife where was the exact location of the first responder for your birth?   <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span> </label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input value="{{$family_and_medical_info->address_description ?? ''}}" name="address_description" type="text" class="form-control wizard-required" id="address_description"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="address_description" class="wizard-form-text-label">15.11 Street, highway, bridge, tunnel, or please describe in detail. <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error d-none"></p>
            </div>
        </div>


        <div class="col-md-12 col-lg-12 mb-4">
            <div class="form-group">

                <label for="" class="wizard-form-text-label">If Not a hospital, then what was the address of your birth?  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>

            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->birth_house_address ?? ''}}" name="birth_house_address" type="text" class="form-control wizard-required" id="birth_house_address"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="birth_house_address" class="wizard-form-text-label">15.12 House Address  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->birth_street ?? ''}}" name="birth_street" type="text" class="form-control wizard-required" id="birth_street"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="birth_street" class="wizard-form-text-label">15.13 Street  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->birth_country ?? ''}}" name="birth_country" type="text" class="form-control wizard-required" id="birth_country"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="birth_country" class="wizard-form-text-label">15.14 Country  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">

                <label for="birth_state" class="wizard-form-text-label">15.15 State  <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <select class="form-control" name="birth_state" id="birth_state"  @if(!empty($family_and_medical_info) ) disabled @endif>
                    <option></option>
                    <option value="{{ $family_and_medical_info->birth_state ?? '' }}" selected>
                        {{ $family_and_medical_info->birth_state ?? '' }}</option>
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Arkansas">Arkansas</option>
                    <option value="California">California</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Delaware">Delaware</option>
                    <option value="District Of Columbia">District Of Columbia</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Louisiana">Louisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Michigan">Michigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Mississippi">Mississippi</option>
                    <option value="Missouri">Missouri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="New Hampshire">New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Washington">Washington</option>
                    <option value="West Virginia">West Virginia</option>
                    <option value="Wisconsin">Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>

        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="birth_city" class="wizard-form-text-label">15.16 City <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <select class="form-control" name="birth_city" id="birth_city" required  @if(!empty($family_and_medical_info) ) disabled @endif>
                    <option value="{{ $family_and_medical_info->birth_city ?? '' }}" selected>
                        {{ $family_and_medical_info->birth_city ?? '' }}</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>

        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->birth_zipcode ?? ''}}" name="birth_zipcode" type="text" class="form-control wizard-required" id="birth_zipcode"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="birth_zipcode" class="wizard-form-text-label">15.17 Zip code <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->birth_address_description ?? ''}}" name="birth_address_description" type="text" class="form-control wizard-required" id="birth_address_description"  @if(!empty($family_and_medical_info) ) disabled @endif>
                <label for="birth_address_description" class="wizard-form-text-label">15.18 If no address, then please describe the location in detail. <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                <input value="{{$family_and_medical_info->your_age ?? ''}}" name="your_age" type="number" class="form-control wizard-required" id="your_age">
                <label for="your_age" class="wizard-form-text-label">15.19 What is your age today? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>


    </div>


    <div class="form-group clearfix">
        <a  href="javascript:;" onclick="returnLater('fieldset_fifteen','consumer_this_is_me')" class="form-wizard-return-btn float-left mr-3">Pause & Return Later</a>

        {{-- <a href="javascript:;" onclick="previousStep('family_history_bar','medical_info_bar')" --}}
            {{-- class="form-wizard-previous-btn float-left">Previous</a> --}}
        <a onclick="checkFieldSetFamilyAndMedicalHistory()" href="javascript:;" id="family_and_medical_information_button" class="form-wizard-next-btn  float-right">Save & Continue</a>
    </div>
    <script>
        $(document).ready(function() {
            $('#olders_brother_name,#youngest_sister_name,#place_of_birth,#address_description').on('input', function() {
                var input = $(this);
                var value = input.val();

                // Remove any non-alphabetical characters
                value = value.replace(/[^a-zA-Z]/g, '');

                // Ensure the length does not exceed 10 characters
                if (value.length > 256) {
                    value = value.slice(0, 256);
                }

                // Update the input value
                input.val(value);
            });
            $('#first_name_of_mid_wife').on('input', function() {
                var input = $(this);
                var value = input.val();

                // Remove special characters and symbols
                value = value.replace(/[^A-Za-z0-9\s]/g, '');

                // Limit to 256 characters
                if (value.length > 256) {
                    value = value.substring(0, 256);
                }

                // Ensure one white space per word
                value = value.replace(/\s+/g, ' '); // Replace multiple spaces with a single space
                value = value.trim(); // Remove leading and trailing spaces

                // Update the input value
                input.val(value);
            });
        });
    </script>
</fieldset>
