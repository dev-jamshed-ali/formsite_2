<fieldset class="wizard-fieldset mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_nine') show @endif" id="fieldset_nine">
    <h5>9. Head & Face Info</h5>
    <input type="hidden" name="form_section" value="head_and_face_information" />

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">

                <label for="chin_description" class="wizard-form-text-label">9.1 What best describe your chin as you see
                    it?
                </label>
                <select class="form-control" name="chin_description" id="chin_description" >
                    <option></option>
                    <option value="bi_lateral_dimples_cheek" @if (!empty($head_and_face_info) && $head_and_face_info->chin_description === 'bi_lateral_dimples_cheek') selected @endif>
                        Bi-Lateral Dimples Cheek</option>
                    <option value="cleft_chin" @if (!empty($head_and_face_info) && $head_and_face_info->chin_description === 'cleft_chin') selected @endif>Cleft Chin</option>
                    <option value="left_dimples_cheek" @if (!empty($head_and_face_info) && $head_and_face_info->chin_description === 'left_dimples_cheek') selected @endif>Left Dimples,
                        Cheek</option>
                    <option value="right_dimples_cheek" @if (!empty($head_and_face_info) && $head_and_face_info->chin_description === 'right_dimples_cheek') selected @endif>Right Dimples,
                        Cheek</option>
                    <option value="other" @if (!empty($head_and_face_info) && $head_and_face_info->chin_description === 'other') selected @endif>Other</option>

                </select>
                <p class="text_danger form_error"></p>


            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="eyes_description" class="wizard-form-text-label">9.2 What best describe your eyes as you see
                    it?
                </label>
                <select class="form-control" name="eyes_description" id="eyes_description" >
                    <option></option>
                    <option value="eye_eccentricity" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'eye_eccentricity') selected @endif>Eye Eccentricity
                    </option>
                    <option value="eye_size" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'eye_size') selected @endif>Eye Size</option>
                    <option value="eye_spacing" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'eye_spacing') selected @endif>Eye Spacing</option>
                    <option value="eyebrow_slant" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'eyebrow_slant') selected @endif>Eyebrow Slant
                    </option>
                    <option value="pupil_size" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'pupil_size') selected @endif>Pupil Size</option>
                    <option value="other" @if (!empty($head_and_face_info) && $head_and_face_info->eyes_description === 'other') selected @endif>Other</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="hair_description" class="wizard-form-text-label">9.3 What best describe your hair as you see
                    it?
                </label>
                <select class="form-control" name="hair_description" id="hair_description" >
                    <option></option>
                    <option value="head_eccentricity" @if (!empty($head_and_face_info) && $head_and_face_info->hair_description === 'head_eccentricity') selected @endif>Head
                        Eccentricity</option>
                    <option value="unibrow" @if (!empty($head_and_face_info) && $head_and_face_info->hair_description === 'unibrow') selected @endif>Unibrow</option>
                    <option value="widows_peak" @if (!empty($head_and_face_info) && $head_and_face_info->hair_description === 'widows_peak') selected @endif>Widow's Peak
                    </option>
                    <option value="other" @if (!empty($head_and_face_info) && $head_and_face_info->hair_description === 'other') selected @endif>Other</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="mouth_description" class="wizard-form-text-label">9.4 What best describe your mouth as you
                    see
                    it?
                </label>
                <select class="form-control" name="mouth_description" id="mouth_description" >
                    <option></option>
                    <option value="mouth_curvature" @if (!empty($head_and_face_info) && $head_and_face_info->mouth_description === 'mouth_curvature') selected @endif>Mouth Curvature
                    </option>
                    <option value="mouth_openness" @if (!empty($head_and_face_info) && $head_and_face_info->mouth_description === 'mouth_openness') selected @endif>Mouth Openness
                    </option>
                    <option value="mouth_width" @if (!empty($head_and_face_info) && $head_and_face_info->mouth_description === 'mouth_width') selected @endif>Mouth Width</option>
                    <option value="other" @if (!empty($head_and_face_info) && $head_and_face_info->mouth_description === 'other') selected @endif>Other</option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="eye_color" class="wizard-form-text-label">9.5 What is your natural eye color? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span>
                </label>
               <select class="form-control" name="eye_color" id="eye_color"  @if(!empty($head_and_face_info) ) disabled @endif>
                    <option></option>  
                    <option value="amber" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'amber') selected @endif>Amber</option>
                    <option value="blue" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'blue') selected @endif>Blue</option>
                    <option value="brown" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'brown') selected @endif>Brown</option>
                    <option value="gray" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'gray') selected @endif>Gray</option>
                    <option value="green" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'green') selected @endif>Green</option>
                    <option value="hazel" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'hazel') selected @endif>Hazel</option>
                    <option value="red" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'red') selected @endif>Red</option>
                    <option value="violet" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'violet') selected @endif>Violet</option>
                    <option value="spectrum" @if (!empty($head_and_face_info) && $head_and_face_info->eye_color === 'spectrum') selected @endif>Spectrum</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                9.6 Do you require prescription eyewear? 
                <div class="wizard-form-radio">
                    <input name="eyeware_prescription" @if (!empty($head_and_face_info) && $head_and_face_info->eyeware_prescription == 1) checked @endif value="1"
                        id="radio1" type="radio" >
                    <label for="radio1">Yes</label>
                </div>
                <div class="wizard-form-radio">
                    <input name="eyeware_prescription" @if (empty($head_and_face_info) || $head_and_face_info->eyeware_prescription == 0) checked @endif value="0"
                        id="radio2" type="radio">
                    <label for="radio2">No</label>
                </div>
            </div>
        </div>

    </div>
    <div class="form-group clearfix">
        <a  href="javascript:;" onclick="returnLater('fieldset_nine','consumer_this_is_me')" class="form-wizard-return-btn float-left mr-3">Pause & Return Later</a>

        {{-- <a href="javascript:;" onclick="previousStep('head_n_face_bar','facial_image_upload_bar')"
            class="form-wizard-previous-btn float-left">Previous</a> --}}
        <a onclick="checkFieldSetHeadAndFace()" id="head_and_face_information_button" href="javascript:;"
            class="form-wizard-next-btn  float-right">Save & Continue</a>
    </div>
</fieldset>
