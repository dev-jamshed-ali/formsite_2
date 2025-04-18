<fieldset class="wizard-fieldset @if (empty($this_is_me_return_back_data) || $this_is_me_return_back_data->fieldset_id == 'fieldset_one') show @endif mt-4" id="fieldset_one">

    {{-- <fieldset class="wizard-fieldset show mt-4" id="fieldset_one"> --}}
    <h4 class="stepper-right-f1 mb-3">My Pedigree Info</h4>
    <input type="hidden" name="form_section" value="my_pidegree_info" />

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="firstname" class="mb-2">First Name
                <span class="star">*</span></label>
            <input type="text" id="firstname" name="fname" value="{{ $my_pidegree_info->fname ?? '' }}"
                attr-value="{{ $my_pidegree_info->fname ?? '' }}" class="form-control wizard-required" id="fname"
                @if (!empty($my_pidegree_info))  @endif placeholder="First Name" />
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="middlename" class="mb-2">Middle Initial
                <span class="star">*</span></label>
            <input name="middle_initial" id="middle_initial" value="{{ $my_pidegree_info->middle_initial ?? '' }}"
                type="text" class="form-control wizard-required" />
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="lastname" class="mb-2">Last Name
                <span class="star">*</span></label>
            <input name="lname" value="{{ $my_pidegree_info->lname ?? '' }}" type="text"
                class="form-control wizard-required" id="lname" placeholder="Last Name"
                @if (!empty($my_pidegree_info))  @endif />
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="suffix" class="mb-2">Suffix<span class="star">*</span></label>
            <input type="text" class="form-control wizard-required" id="suffix" name="suffix"
                value="{{ $my_pidegree_info->suffix ?? '' }}" />
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nick_name" class="mb-2" title="You can not change this field once you submit">Nick Name<span
                    class="star">*</span></label>
            <input type="text" class="form-control wizard-required" id="nick_name" name="nick_name"
                @if (!empty($my_pidegree_info))  @endif value="{{ $my_pidegree_info->nick_name ?? '' }}" />
            <p class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="date_of_birth" class="mb-2">Date of Birth <span class="star">*</span></label>
            <input name="date_of_birth" value="{{ $my_pidegree_info->date_of_birth ?? '' }}" value="{{ date('Y-m-d') }}"
                type="date" class="form-control wizard-required" id="date_of_birth"
                @if (!empty($my_pidegree_info))  @endif />
            <p class="text_danger form_error"></p>

        </div>
        <div class="col-md-4 mb-3">
            <label for="social_security_no" class="mb-2">Social Security Number
                <span class="star">*</span></label>
            <input id="social_security_no" name="social_security_no"
                value="{{ $my_pidegree_info->social_security_no ?? '' }}" type="text"
                class="form-control wizard-required" id="social_security_no" onkeyup="verifySSN()"
                @if (!empty($my_pidegree_info))  @endif>
            <p id="fetch_social_security_no_result" class="text_danger form_error"></p>
        </div>
        <div class="col-md-4 mb-3">
            <label for="verify_social_security_no" class="mb-2">Verify Social Security Number
                <span class="star">*</span></label>
            <input id="verify_social_security_no" value="{{ $my_pidegree_info->social_security_no ?? '' }}"
                name="verify_social_security_no" type="text" class="form-control wizard-required"
                @if (!empty($my_pidegree_info))  @endif>
            <p class="text_danger form_error"></p>

        </div>

        <div class="col-md-12 mt-4">
            <div class="form-check form-switch pb-2">
                <!-- <input class="form-check-input" value="1" @if (!empty($my_pidegree_info->eligibility_protection) && $my_pidegree_info->eligibility_protection == 1) checked @endif type="checkbox"  name="eligibility_protection" role="switch"
                                                    id="eligibility_protection" />
                                                <label class="form-check-label label-italic fst-italic"
                                                    for="your-responce">Your response will not affect your eligibility
                                                    to
                                                    be protected</label>  -->
            </div>
            <div class="form-check form-switch pb-2">

                <input class="form-check-input" name="us_vetran" id="us_vetran" value="1"
                    @if (!empty($my_pidegree_info->us_vetran) && $my_pidegree_info->us_vetran == 1) checked @endif type="checkbox" role="switch" />

                <label class="form-check-label label-italic" for="us_vetran">
                    Are you US Veteran? <span class="star">*</span>
                </label>
            </div>


            <div class="form-check form-switch pb-2">
                <input class="form-check-input" name="consumer_presently_incarcerated" type="checkbox"
                    role="switch" id="consumer_presently_incarcerated" />
                <label class="form-check-label label-italic" for="your-responce">Is the
                    consumer an ex-offender?</label>
            </div>
            <div class="small text-muted mt-1" style="font-style: italic;">
                Your response will not affect your eligibility to be protected.
            </div>
        </div>
    </div>


    <button id="my_pidegree_info_button" type="button" onclick="checkFieldSetPidegree()" name="next"
        class="form-wizard-next-btn-without-click arrow-btn float-end ">
        Save & Continue
        <img src="{{ asset('public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
    </button>

</fieldset>
