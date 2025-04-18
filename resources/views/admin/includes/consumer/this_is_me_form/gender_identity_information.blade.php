
<fieldset class="wizard-fieldset mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_three') show @endif" id="fieldset_three">
                                    <h4 class="stepper-right-f1 mb-3">
                                        3 . Gender Identity Information
                                    </h4>
    <input type="hidden" name="form_section" value="gender_identity_info" />

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="firstname" class="mb-2">Sex Assigned at Birth
                                            <span class="star">*</span></label>
                                            <select class="form-select form-control " name="sex_at_birth" id="sex_at_birth" required @if(isset($gender_identity_info->sex_at_birth) )  @endif  aria-label="Default select example">
                                            <option></option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'choose_not_to_disclose') selected @endif value="choose_not_to_disclose">Choose not to disclose</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'female') selected @endif value="female">Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'intersex') selected @endif value="intersex">Intersex</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'male') selected @endif value="male">Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'not_recorded') selected @endif value="not_recorded">Not Recorded on Birth</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'uncertain') selected @endif value="uncertain">Uncertain</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->sex_at_birth == 'unknown') selected @endif value="unknown">Unknown</option>                
                                            </select>
                <p class="text_danger form_error"></p>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="legal_sex" class="mb-2">Legal Sex <span class="star">*</span></label>
                                            <select class="form-control" name="legal_sex" id="legal_sex"  aria-label="Default select example">
                                            <option></option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->legal_sex == 'female') selected @endif value="female">Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->legal_sex == 'male') selected @endif value="male">Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->legal_sex == 'non_binary') selected @endif value="non_binary">Non Binary</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->legal_sex == 'unknown') selected @endif value="unknown">Unknow</option>                
                                            </select>
                <p class="text_danger form_error"></p>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="firstname" class="mb-2">What Gender do you self-identify as
                                                today</label>
                                            <select class="form-select form-control" name="self_identify_sex" id="self_identify_sex" aria-label="Default select example">
                                            <option></option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'androgyn') selected @endif value="androgyn">Androgyn</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'bisexual_as_female') selected @endif  value="bisexual_as_female">Bi-Sexual Accept Me A Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'bisexual_as_male') selected @endif  value="bisexual_as_male">Bi-Sexual Accept Me A Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'boi') selected @endif  value="boi">Boi</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'butch') selected @endif  value="butch">Butch</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'cisgender') selected @endif  value="cisgender">Cisgender</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'cross_dresser') selected @endif  value="cross_dresser">Cross-Dresser</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'female') selected @endif  value="female">Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gay_female') selected @endif  value="gay_female">Gay Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gay_male') selected @endif  value="gay_male">Gay Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gender_bender') selected @endif  value="gender_bender">Gender Bender</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gender_neutrality') selected @endif  value="gender_neutrality">Gender Neutrality</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gender_non_conforming') selected @endif  value="gender_non_conforming">Gender Non-Conforming</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gender_queer') selected @endif  value="gender_queer">Gender Queer</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'gender_variance') selected @endif  value="gender_variance">Gender Variance</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'lesbian') selected @endif  value="lesbian">Lesbian</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'male') selected @endif  value="male">Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'man') selected @endif  value="man">Man</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'non_binary') selected @endif  value="non_binary">Non-Binary</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'other') selected @endif  value="other">Other</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'post_genderism') selected @endif  value="post_genderism">Post Genderism</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'something_else') selected @endif  value="something_else">Something Else</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'trans_man') selected @endif  value="trans_man">Trans Man</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'trans_woman') selected @endif  value="trans_woman">Trans Woman</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'transgender_female_to_male') selected @endif  value="transgender_female_to_male">Transgender Female/Male to Female</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'transgender_male_to_female') selected @endif  value="transgender_male_to_female">Transgender Male/Female to Male</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'transsexual') selected @endif  value="transsexual">Transsexual</option>
                    <option @if(!empty($gender_identity_info) && $gender_identity_info->self_identify_sex == 'woman') selected @endif  value="woman">Woman</option>
                                            </select>
                <p class="text_danger form_error"></p>

                                        </div>
                                    </div>

                                    <button type="button" onclick="returnLater('fieldset_three','consumer_this_is_me')"  name="previous" class="form-wizard-return-btn  arrow-btn float-start">
                                        <img src="{{asset('/public/files/img/arrow-back.png')}}" alt="btn-arrow" value="Pause and Return Later" />
                                        Pause and Return Later
                                    </button>

                                    <button type="button" id="gender_identity_info_button"  onclick="checkFieldSetGenderIdentityInformation()" name="next" class="form-wizard-next-btn  arrow-btn float-end">
                                        Save & Continue
                                        <img src="{{asset('/public/files/img/btn-arrow.png')}}" alt="btn-arrow" />
                                    </button>

                                </fieldset>