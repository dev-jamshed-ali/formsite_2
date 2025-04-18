<fieldset class="wizard-fieldset mt-4 @if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_seventeen') show @endif" id="fieldset_seventeen">
  
   

    <div class="shadow-stepper mb-3 p-3">
        <h4 class="stepper-right-f1 mb-3">10. Opt-In Consent</h4>
        <input type="hidden" name="form_section" value="attestation_information" />

        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" @if (!empty($attestation_info) && $attestation_info->i_confirm_data_is_accurate == 1) checked @endif type="checkbox"
                        role="switch" name="i_confirm_data_is_accurate" id="i_confirm_data_is_accurate" />
                    <label class="form-check-label" for="your-responce">I attest that
                        all the information I provided on
                        and in connection with this form is true and
                        correct to the best of my knowledge. I also
                        understand that any false statements or deliberate
                        omissions on this form may delay my
                        enrollment.</label>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-end flex-column">
                <label class="mb-2">How did you hear about Us? Please Select</label>
                <select class="form-control" required name="how_you_heared_about_us" id="how_you_heared_about_us">
                    <option></option>
                    <option value="tekker_guid" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'tekker_guid') selected @endif>Trekker Guid</option>
                    <option value="friends_family_word_of_mouth" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'friends_family_word_of_mouth') selected @endif>Friends / Family Word of Mouth</option>
                    <option value="counselor_bank_professional_referral"
                        @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'counselor_bank_professional_referral') selected @endif>Counselor / Bank Professional referral
                    </option>
                    <option value="yahoo" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'yahoo') selected @endif>Yahoo!</option>
                    <option value="google" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'google') selected @endif>Google</option>
                    <option value="bing" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'bing') selected @endif>Bing</option>
                    <option value="youtube" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'youtube') selected @endif>YouTube</option>
                    <option value="website_banners" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'website_banners') selected @endif>Website Banners
                    </option>
                    <option value="advertisement_on_clothing" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_on_clothing') selected @endif>
                        Advertisement on Clothing</option>
                    <option value="advertisement_received_at_home" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_received_at_home') selected @endif>
                        Advertisement received at home</option>
                    <option value="advertisement_at_bank" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_at_bank') selected @endif>
                        Advertisement at bank</option>
                    <option value="advertisement_at_a_store" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_at_a_store') selected @endif>
                        Advertisement at a store</option>
                    <option value="advertisement_at_a_health_care_place"
                        @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_at_a_health_care_place') selected @endif>Advertisement at a health care place
                    </option>
                    <option value="advertisement_in_magazine" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'advertisement_in_magazine') selected @endif>
                        Advertisement in magazine</option>
                    <option value="newspaper_editorial" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'newspaper_editorial') selected @endif>Newspaper
                        Editorial</option>
                    <option value="radio" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'radio') selected @endif>Radio</option>
                    <option value="television" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'television') selected @endif>Television</option>
                    <option value="email_ads" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'email_ads') selected @endif>E-mail ads</option>
                    <option value="internet_blogs" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'internet_blogs') selected @endif>Internet Blogs
                    </option>
                    <option value="other" @if (!empty($attestation_info) && $attestation_info->how_you_heared_about_us === 'other') selected @endif>Other</option>

                </select>
            </div>
        </div>
    </div>

    <div class="shadow-stepper mb-10 p-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="face-rec-h1">
                    A Ginicoe Trekker must be heedful to:
                </h3>
                <ul class="face-rec-h2">
                    <li>You will take an Oath to protect the data.</li>
                    <li>
                        You must pass an independent background check.
                    </li>
                    <li>
                        You must verify that you are one of the following
                        <ul class="face-rec-h3 mt-1">
                            <li>Demographer</li>
                            <li>Researcher</li>
                            <li>Non-profit org</li>
                            <li>Government agency</li>
                            <li>University</li>
                            <li>Research group</li>
                            <li>Mathematician</li>
                            <li>Quantitative analyst</li>
                            <li>Social justice warrior</li>
                            <li>ESG guru</li>
                            <li>Social worker</li>
                            <li>Front line responder</li>
                        </ul>
                    </li>
                </ul>
                <h3 class="face-rec-h1">Oath of Servicee</h3>
                <ul>
                    <li class="face-rec-h2">
                        As a Ginicoe Trekker Volunteer, I will not
                        disclose any personally identifiable information
                        (PII) contained in the mobile app, race mapping,
                        or other data obtained for or prepared by the
                        Ginicoe Corporation, its subsidiaries, or its
                        agents to any person or persons either during or
                        after my volunteer service.
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="subbox">
                    <div class="bg-blue-form10 p-3">
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" @if (!empty($attestation_info) && $attestation_info->volunteer_trekker == 1) checked @endif
                                type="checkbox" role="switch" name="volunteer_trekker" id="volunteer_trekker" />
                            <label class="form-check-label face-rec-h2" for="your-responce">I voluntary wish to join the
                                Ginicoe
                                Trekker
                                Team</label>
                        </div>
                        <h5>
                            I am sure that most [builders] are as much
                            against [racial] discrimination as I am, but I
                            think they are either bound by custom or fear of
                            financial loss. Joseph Eichler, July 1, 1958
                            Resigning from the National Association of Home
                            Builders
                        </h5>
                    </div>
                    <span class="my-3 fst-italic">
                        You are no longer accepting the things you cannot
                        change. You are changing the things you cannot
                        accept.
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div>

        <button type="button"  onclick="returnLater('fieldset_seventeen','consumer_this_is_me')"
            class="form-wizard-return-btn arrow-btn float-start">
            <img src="{{ asset('/public/files/img/arrow-back.png') }}" alt="btn-arrow" value="Pause and Return Later" />
            Pause and Return Later
        </button>
        <div class="d-flex justify-content-end align-items-center gap-3">
            <a name="preview" onclick="review_form()"
                class="form-wizard-review-btn arrow-btn float-end text-decoration-none ">
                Preview
                <img src="{{ asset('/public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
            </a>
            <button type="button" name="next" onclick="submit_full_form()"
                class="form-wizard-review-btn arrow-btn float-end">
                Save & Continue
                <img src="{{ asset('/public/files/img/btn-arrow.png') }}" alt="btn-arrow" />
            </button>

        </div>

    </div>

</fieldset>
