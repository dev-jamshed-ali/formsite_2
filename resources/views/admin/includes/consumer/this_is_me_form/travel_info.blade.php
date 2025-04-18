<fieldset class="wizard-fieldset mt-4 @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_sixteen') show @endif" id="fieldset_sixteen">
    <input type="hidden" name="form_section" value="travel_information" />
    <div class="shadow-stepper mb-3 p-3">
        <h4 class="stepper-right-f1 mb-3">9. Special Licenses</h4>
        <div class="form-check form-switch ms-2 py-3">
            <input class="form-check-input" @if (!empty($travel_info) && $travel_info->are_you_us_citizen == 1) checked @endif name="are_you_us_citizen"
                value="1" type="checkbox" role="switch" id="are_you_us_citizen" />
            <label class="form-check-label label-italic fst-italic" for="your-responce">“Are you a U.S. Citizen”</label>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="Passport Number" class="mb-2">U.S. Passport Number</label>
                <input value="{{ $travel_info->passport_number ?? '' }}" name="passport_number" type="text"
                    class="form-control wizard-required" id="passport_number">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label for="Alien identification number" class="mb-2">Alien
                    identification number</label>
                <input value="{{ $travel_info->alien_id_number ?? '' }}" name="alien_id_number" type="text"
                    class="form-control wizard-required" id="alien_id_number">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-4 mb-3">
                <label class="mb-2">Country of dual citizenship</label>
                <input value="{{ $travel_info->dual_citizen_ship ?? '' }}" name="dual_citizen_ship" type="text"
                    class="form-control wizard-required" id="dual_citizen_ship">
                <p class="text_danger form_error"></p>
            </div>
        </div>
    </div>

    <div class="shadow-stepper mb-10 p-3">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-check form-switch pb-0">
                    <input class="form-check-input" @if (!empty($travel_info) && $travel_info->are_you_on_visa == 1) checked @endif
                        name="are_you_on_visa" value="1" type="checkbox" role="switch" id="are_you_on_visa" />
                    <label class="form-check-label label-italic" for="your-responce">Are
                        you in the U.S. on a Visa?</label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">U.S. Visa purpose</label>
                <input value="{{ $travel_info->visa_purpose ?? '' }}" name="visa_purpose" type="text"
                    class="form-control wizard-required" id="visa_purpose">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">U.S. Visa Numbers</label>
                <input value="{{ $travel_info->visa_number ?? '' }}" name="visa_number" type="text"
                    class="form-control wizard-required" id="visa_number">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">U.S. Visa expiry</label>
                <input value="{{ $travel_info->us_visa_expiration_date ?? '' }}" name="us_visa_expiration_date"
                    type="text" class="form-control wizard-required" id="us_visa_expiration_date">
                <p class="text_danger form_error"></p>

            </div>

            <div class="col-md-6 mb-3">
                <label class="mb-2">State Driver's License?</label>
                <select class="form-control" name="state_driver_license" id="state_driver_license">
                    <option></option>
                    <option value="{{ $travel_info->state_driver_license ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_driver_license ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">DL Number</label>
                <input value="{{ $travel_info->state_driver_license_no ?? '' }}" name="state_driver_license_no"
                    type="text" class="form-control wizard-required" id="state_driver_license_no">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State of identity claimant non-dl ID</label>
                <select class="form-control" name="us_state" id="us_state">
                    <option></option>
                    <option value="{{ $travel_info->us_state ?? ('' ?? '') }}" selected>
                        {{ $travel_info->us_state ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State ID Number</label>
                <input value="{{ $travel_info->state_id_no ?? '' }}" name="state_id_no" type="text"
                    class="form-control wizard-required" id="state_id_no">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State of identity claimant hunting license</label>
                <select class="form-control" name="state_hunting" id="state_hunting">
                    <option></option>
                    <option value="{{ $travel_info->state_hunting ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_hunting ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State hunting license number</label>
                <input value="{{ $travel_info->state_hunting_no ?? '' }}" name="state_hunting_no" type="text"
                    class="form-control wizard-required" id="state_hunting_no">
                <p class="text_danger form_error"></p>

            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State of identity claimant fishing license</label>
                <select class="form-control" name="state_fishing" id="state_fishing">
                    <option></option>
                    <option value="{{ $travel_info->state_fishing ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_fishing ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State fishing license number</label>
                <input value="{{ $travel_info->state_fishing_no ?? '' }}" name="state_fishing_no" type="text"
                    class="form-control wizard-required" id="state_fishing_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State of identity claimant pilot license</label>
                <select class="form-control" name="state_pilot_license" id="state_pilot_license">
                    <option></option>
                    <option value="{{ $travel_info->state_pilot_license ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_pilot_license ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State pilot license number</label>
                <input value="{{ $travel_info->state_pilot_license_no ?? '' }}" name="state_pilot_license_no"
                    type="text" class="form-control wizard-required" id="state_pilot_license_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State of identity claimant firearm license</label>
                <select class="form-control" name="state_handgun_firearm" id="state_handgun_firearm">
                    <option></option>
                    <option value="{{ $travel_info->state_handgun_firearm ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_handgun_firearm ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State firearm license number</label>
                <input value="{{ $travel_info->state_handgun_firearm_no ?? '' }}" name="state_handgun_firearm_no"
                    type="text" class="form-control wizard-required" id="state_handgun_firearm_no">
                <p class="text_danger form_error"></p>
            </div>

            <div class="col-md-6 mb-3">
                <label class="mb-2">State Medical ID?</label>
                <select class="form-control" name="state_medicaid" id="state_medicaid">
                    <option></option>
                    <option value="{{ $travel_info->state_medicaid ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_medicaid ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State Medicaid Number?</label>
                <input value="{{ $travel_info->state_medicaid_no ?? '' }}" name="state_medicaid_no" type="text"
                    class="form-control wizard-required" id="state_medicaid_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">State Medicare?</label>
                <select class="form-control" name="state_medicare" id="state_medicare">
                    <option></option>
                    <option value="{{ $travel_info->state_medicare ?? ('' ?? '') }}" selected>
                        {{ $travel_info->state_medicare ?? '' }}</option>
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
            <div class="col-md-6 mb-3">
                <label class="mb-2">State Medicare Number</label>
                <input value="{{ $travel_info->state_medicare_no ?? '' }}" name="state_medicare_no" type="text"
                    class="form-control wizard-required" id="state_medicare_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="mb-2">US Military Branch</label>
                <select class="form-control" name="us_military_branch" id="us_military_branch">
                    <option></option>
                    <option value="{{ $travel_info->us_military_branch ?? ('' ?? '') }}" selected>
                        {{ $travel_info->us_military_branch ?? '' }}</option>
                    <option value="air_force">Air Force</option>
                    <option value="army_marines">Army Marines</option>
                    <option value="navy">Navy</option>
                    <option value="Arkansas">Space Forece</option>
                    <option value="Arkansas">Air National Guard</option>
                    <option value="Arkansas">Coast Guard</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Card Number" class="mb-2">US Military ID Number
                </label>
                <input value="{{ $travel_info->us_military_branch_no ?? '' }}" name="us_military_branch_no"
                    type="text" class="form-control wizard-required" id="us_military_branch_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Card Number" class="mb-2">Bureau of Indian Affairs card
                    Number
                </label>
                <input value="{{ $travel_info->bureau_of_indian_affair_card_no ?? '' }}"
                    name="bureau_of_indian_affair_card_no" type="text" class="form-control wizard-required"
                    id="bureau_of_indian_affair_card_no">
                <p class="text_danger form_error"></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Card Number" class="mb-2">Tribal ID card Number
                </label>
                <input value="{{ $travel_info->tribal_id_card_no ?? '' }}" name="tribal_id_card_no" type="text"
                    class="form-control wizard-required" id="tribal_id_card_no">
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6 d-flex justify-content-start align-items-center">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" checked type="checkbox" role="switch" id="your-responce" />
                    <label class="form-check-label fs-5" for="your-responce"><b>Witness
                            Security Program</b></label>
                </div>
            </div>

        </div>
        <div class="row " id="special_licenses_form">
            <div class="row my-3">
                <div class="col-md-12 d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-primary" id="addLicesenseButton">+ Add Child</button>
                </div>
            </div>
            @if (!isset($children) || empty($children))
                <div class="card_licesense row" id="card_1">

                    <div class="col-md-4 mb-3">
                        <label for="OLD FN" class="mb-2">OLD FN </label>
                        <input value="{{ $travel_info->old_first_name[0] ?? '' }}" name="old_first_name[0]"
                            type="text" class="form-control wizard-required" id="old_first_name[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Old LN" class="mb-2">Old LN </label>
                        <input value="{{ $travel_info->old_last_name[0] ?? '' }}" name="old_last_name[0]"
                            type="text" class="form-control wizard-required" id="old_last_name[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Old DOB" class="mb-2">Old DOB </label>
                        <input value="{{ $travel_info->old_dob[0] ?? date('Y-m-d') }}" name="old_dob[0]"
                            type="date" class="form-control wizard-required" id="old_dob[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Spouse Old FN" class="mb-2">Spouse Old FN
                        </label>
                        <input value="{{ $travel_info->old_spouse_first_name[0] ?? '' }}"
                            name="old_spouse_first_name[0]" type="text" class="form-control wizard-required"
                            id="old_spouse_first_name[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="House|" class="mb-2">Spouse old LN
                        </label>
                        <input value="{{ $travel_info->old_spouse_last_name[0] ?? '' }}"
                            name="old_spouse_last_name[0]" type="text" class="form-control wizard-required"
                            id="old_spouse_last_name[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Spouse old DOB " class="mb-2">Spouse old DOB
                        </label>
                        <input value="{{ $travel_info->old_spouse_dob[0] ?? date('Y-m-d') }}"
                            name="old_spouse_dob[0]" type="date" class="form-control wizard-required"
                            id="old_spouse_dob[0]">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
            @else
                @foreach ($children as $index => $child)
                    <div class="card_license row my-3" id="card_{{ $index }}">
                        <div class="col-md-4 mb-3">
                            <label for="old_first_name[{{ $index }}]" class="mb-2">OLD FN </label>
                            <input value="{{ $child['old_first_name'] }}" name="old_first_name[{{ $index }}]"
                                type="text" class="form-control wizard-required"
                                id="old_first_name_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="old_last_name[{{ $index }}]" class="mb-2">Old LN </label>
                            <input value="{{ $child['old_last_name'] }}" name="old_last_name[{{ $index }}]"
                                type="text" class="form-control wizard-required"
                                id="old_last_name_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="old_dob[{{ $index }}]" class="mb-2">Old DOB </label>
                            <input value="{{ $child['old_dob'] }}" name="old_dob[{{ $index }}]"
                                type="date" class="form-control wizard-required"
                                id="old_dob_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="old_spouse_first_name[{{ $index }}]" class="mb-2">Spouse Old
                                FN</label>
                            <input value="{{ $child['old_spouse_first_name'] }}"
                                name="old_spouse_first_name[{{ $index }}]" type="text"
                                class="form-control wizard-required" id="old_spouse_first_name_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="old_spouse_last_name[{{ $index }}]" class="mb-2">Spouse old
                                LN</label>
                            <input value="{{ $child['old_spouse_last_name'] }}"
                                name="old_spouse_last_name[{{ $index }}]" type="text"
                                class="form-control wizard-required" id="old_spouse_last_name_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="old_spouse_dob[{{ $index }}]" class="mb-2">Spouse old DOB</label>
                            <input value="{{ $child['old_spouse_dob'] }}" name="old_spouse_dob[{{ $index }}]"
                                type="date" class="form-control wizard-required"
                                id="old_spouse_dob_{{ $index }}">
                            <p class="text_danger form_error"></p>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>

    <button type="button" name="previous" onclick="returnLater('fieldset_sixteen','consumer_this_is_me')"
        class="form-wizard-return-btn arrow-btn float-start">
        <img src="{{ asset('/public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" name="next" onclick="checkFieldSetTravelInfo()" id="travel_information_button"
        class="form-wizard-next-btn  arrow-btn float-end">
        Save & Continue
        <img src="{{ asset('/public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>
    <script>
        document.getElementById('addLicesenseButton').addEventListener('click', function() {
            const specialLicensesForm = document.getElementById('special_licenses_form');

            // Count the current number of cards to set unique IDs and names
            const cardCount = specialLicensesForm.querySelectorAll('.card_licesense').length + 1;
            const cardArreyIndex = cardCount - 1;

            const cardHTML = `
        <div class="card_licesense row my-3" id="card_${cardCount}">
                <div class="row my-3">
                    <div class="col-md-12 d-flex justify-content-end align-items-center">
                        <button class="btn btn-primary delete-card-btn" data-card-id="card_${cardCount}">- Delete Child</button>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="old_first_name[${cardArreyIndex}]" class="mb-2">OLD FN </label>
                    <input value="" name="old_first_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="old_first_name">
                    <p class="text_danger form_error"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="old_last_name[${cardArreyIndex}]" class="mb-2">Old LN </label>
                    <input value="" name="old_last_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="old_last_name">
                    <p class="text_danger form_error"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="old_dob[${cardArreyIndex}]" class="mb-2">Old DOB </label>
                    <input value="" name="old_dob[${cardArreyIndex}]" type="date" class="form-control wizard-required" id="old_dob">
                    <p class="text_danger form_error"></p>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="old_spouse_first_name[${cardArreyIndex}]" class="mb-2">Spouse Old FN</label>
                    <input value="" name="old_spouse_first_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="old_spouse_first_name">
                    <p class="text_danger form_error"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="old_spouse_last_name[${cardArreyIndex}]" class="mb-2">Spouse old LN</label>
                    <input value="" name="old_spouse_last_name[${cardArreyIndex}]" type="text" class="form-control wizard-required" id="old_spouse_last_name">
                    <p class="text_danger form_error"></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="old_spouse_dob[${cardArreyIndex}]" class="mb-2">Spouse old DOB</label>
                    <input value="" name="old_spouse_dob[${cardArreyIndex}]" type="date" class="form-control wizard-required" id="old_spouse_dob">
                    <p class="text_danger form_error"></p>
                </div>
                
        </div>
    `;

            // Append the new card
            specialLicensesForm.insertAdjacentHTML('beforeend', cardHTML);

            // Add event listener to the new delete button
            document.querySelector(`#card_${cardCount} .delete-card-btn`).addEventListener('click', function() {
                const cardId = this.getAttribute('data-card-id');
                document.getElementById(cardId).remove();
            });
        });
    </script>
</fieldset>
