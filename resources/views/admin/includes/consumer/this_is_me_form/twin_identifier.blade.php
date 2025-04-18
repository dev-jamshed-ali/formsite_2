<fieldset class="wizard-fieldset  mt-4 @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_twelve') show @endif" id="fieldset_twelve">
    <h5>12. Twin Identifiers </h5>
    <input type="hidden" name="form_section" value="twin_identifier_information" />

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="dominant_hand_writing_side" class="wizard-form-text-label">12.1 What is your dominant hand
                    writing side? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <select class="form-control" name="dominant_hand_writing_side" id="dominant_hand_writing_side"  @if(!empty($twin_identifier_info) ) disabled @endif>
                    <option value=""></option>
                    <option value="ambidextrous" @if (!empty($twin_identifier_info) && $twin_identifier_info->dominant_hand_writing_side == 'ambidextrous') selected @endif>Ambidextrous</option>
                    <option value="left_handed" @if (!empty($twin_identifier_info) && $twin_identifier_info->dominant_hand_writing_side == 'left_handed') selected @endif>Left Handed</option>
                    <option value="right_handed" @if (!empty($twin_identifier_info) && $twin_identifier_info->dominant_hand_writing_side == 'right_handed') selected @endif>Right Handed</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="are_you_twin" class="wizard-form-text-label">12.2 Are you a </label>
                <select class="form-control" name="are_you_twin" id="are_you_twin">
                    <option value=""></option>
                    <option value="not_applicable" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'not_applicable') selected @endif>
                        Not Applicable</option>
                    <option value="conjoined_or_siamese_twins" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'conjoined_or_siamese_twins') selected @endif>
                        Conjoined or Siamese twins</option>
                    <option value="different_birthday_twin" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'different_birthday_twin') selected @endif>Different
                        Birthday Twin</option>
                    <option value="different_race_twins_or_bi_racial_twins"
                        @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'different_race_twins_or_bi_racial_twins') selected @endif>Different Race Twins or Bi-Racial Twins
                    </option>
                    <option value="dizygotic" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'dizygotic') selected @endif>Dizygotic</option>
                    <option value="heteropaternal_superfecundation" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'heteropaternal_superfecundation') selected @endif>
                        Heteropaternal Superfecundation</option>
                    <option value="mirror-image" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'mirror-image') selected @endif>Mirror-Image</option>
                    <option value="monozygotic" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'monozygotic') selected @endif>Monozygotic</option>
                    <option value="parasitic" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'parasitic') selected @endif>Parasitic</option>
                    <option value="quadruplet" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'quadruplet') selected @endif>Quadruplet</option>
                    <option value="semi-identical" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'semi-identical') selected @endif>Semi-Identical
                    </option>
                    <option value="superfetation" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'superfetation') selected @endif>Superfetation
                    </option>
                    <option value="twin_triplet" @if(!empty($twin_identifier_info) && $twin_identifier_info->are_you_twin === 'twin_triplet') selected @endif>Twin/Triplet
                    </option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_type" class="wizard-form-text-label">12.3 Are you</label>
                <select class="form-control" name="twin_type" id="twin_type">
                    <option value=""></option>
                    <option value="fraternal" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_type === 'fraternal') selected @endif>Fraternal</option>
                    <option value="identical" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_type === 'identical') selected @endif>Identical</option>
                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input value="{{ $twin_identifier_info->twin_first_name ?? '' }}" name="twin_first_name" type="text"
                    class="form-control wizard-" id="twin_first_name">
                <label for="twin_first_name" class="wizard-form-text-label">12.4 What is your twin’s first name?</label>
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input value="{{ $twin_identifier_info->twin_mi ?? '' }}" name="twin_mi" type="text"
                    class="form-control wizard-" id="twin_mi" required="">
                <label for="twin_mi" class="wizard-form-text-label">12.5 What is your twin’s MI?</label>
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <input value="{{ $twin_identifier_info->twin_last_name ?? '' }}" name="twin_last_name" type="text"
                    class="form-control wizard-" id="twin_last_name">
                <label for="twin_last_name" class="wizard-form-text-label">12.6 What is your twin’s Last Name?</label>
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <textarea name="twin_difference_description" type="text" class="form-control wizard-"
                    id="twin_difference_description"  @if(!empty($twin_identifier_info) ) disabled @endif>{{ $twin_identifier_info->twin_difference_description ?? '' }}</textarea>
                <label for="twin_difference_description" class="wizard-form-text-label">12.7 Please tell us what best
                    describes the difference between you and your twin.
                    Physical Differences?? <span data-toggle="tooltip" title="You can not change this field once you submit"  class="permanent_color">(Permanent)</span></label>
                <p class="text_danger form_error"></p>
            </div>
        </div>




        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="birth_mark_located" class="wizard-form-text-label">12.8 My Birthmarks is located on?</label>
                <select class="form-control" name="birth_mark_located" id="birth_mark_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->birth_mark_located === 'foot_right') selected @endif>Foot Right</option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_birth_mark_located" class="wizard-form-text-label">12.9 My closest twin's Birthmarks
                    is
                    located on?</label>
                <select class="form-control" name="twin_birth_mark_located" id="twin_birth_mark_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_birth_mark_located === 'foot_right') selected @endif>Foot Right</option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="my_freckles_located" class="wizard-form-text-label">12.10 My freckles is located
                    on?</label>
                <select class="form-control" name="my_freckles_located" id="my_freckles_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_freckles_located === 'foot_right') selected @endif>Foot Right</option>



                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_freckles_located" class="wizard-form-text-label">12.11 My closest twin's freckles is
                    located on?</label>
                <select class="form-control" name="twin_freckles_located" id="twin_freckles_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_freckles_located === 'foot_right') selected @endif>Foot Right</option>




                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="my_moles_located" class="wizard-form-text-label">12.12 My moles is located on?</label>
                <select class="form-control" name="my_moles_located" id="my_moles_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_moles_located === 'foot_right') selected @endif>Foot Right</option>




                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_moles_located" class="wizard-form-text-label">12.13 My twin's moles is located
                    on?</label>
                <select class="form-control" name="twin_moles_located" id="twin_moles_located">
                    <option value=""></option>
                    <option value="face_forehead" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'face_forehead') selected @endif>Face Forehead
                    </option>
                    <option value="face_cheek_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'face_cheek_left') selected @endif>Face Cheek Left
                    </option>
                    <option value="face_cheek_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'face_cheek_right') selected @endif>Face Cheek
                        Right</option>
                    <option value="face_chin" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'face_chin') selected @endif>Face Chin</option>
                    <option value="neck_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'neck_left') selected @endif>Neck Left</option>
                    <option value="neck_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'neck_right') selected @endif>Neck Right</option>
                    <option value="neck_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'neck_front') selected @endif>Neck Front</option>
                    <option value="neck_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'neck_back') selected @endif>Neck Back</option>
                    <option value="shoulder_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'shoulder_left') selected @endif>Shoulder Left
                    </option>
                    <option value="shoulder_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'shoulder_right') selected @endif>Shoulder Right
                    </option>
                    <option value="arm_upper_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'arm_upper_left') selected @endif>Arm Upper Left
                    </option>
                    <option value="arm_upper_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'arm_upper_right') selected @endif>Arm Upper Right
                    </option>
                    <option value="arm_lower_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'arm_lower_left') selected @endif>Arm Lower Left
                    </option>
                    <option value="arm_lower_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'arm_lower_right') selected @endif>Arm Lower Right
                    </option>
                    <option value="left_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'left_hand') selected @endif>Left Hand</option>
                    <option value="right_hand" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'right_hand') selected @endif>Right Hand</option>
                    <option value="wrist_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'wrist_left') selected @endif>Wrist Left</option>
                    <option value="wrist_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'wrist_right') selected @endif>Wrist Right
                    </option>
                    <option value="torso_front" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'torso_front') selected @endif>Torso Front
                    </option>
                    <option value="torso_back" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'torso_back') selected @endif>Torso Back</option>
                    <option value="torso_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'torso_left') selected @endif>Torso Left</option>
                    <option value="torso_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'torso_right') selected @endif>Torso Right
                    </option>
                    <option value="upper_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'upper_leg_left') selected @endif>Upper Leg Left
                    </option>
                    <option value="upper_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'upper_leg_right') selected @endif>Upper Leg Right
                    </option>
                    <option value="lower_leg_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'lower_leg_left') selected @endif>Lower Leg Left
                    </option>
                    <option value="lower_leg_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'lower_leg_right') selected @endif>Lower Leg Right
                    </option>
                    <option value="ankle_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'ankle_left') selected @endif>Ankle Left</option>
                    <option value="ankle_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'ankle_right') selected @endif>Ankle Right
                    </option>
                    <option value="foot_left" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'foot_left') selected @endif>Foot Left</option>
                    <option value="foot_right" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_moles_located === 'foot_right') selected @endif>Foot Right</option>




                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>



        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="hair_are_different" class="wizard-form-text-label">12.14 My hair is different from my
                    twin’s
                    because</label>
                <select class="form-control" name="hair_are_different" id="hair_are_different">
                    <option value=""></option>
                    <option value="1" @if(!empty($twin_identifier_info) && $twin_identifier_info->hair_are_different == 1) selected  @endif>My whorls spiral is clockwise and my twin's is counter-clockwise</option>
                    <option value="2" @if(!empty($twin_identifier_info) && $twin_identifier_info->hair_are_different == 2) selected  @endif>My cowlicks spiral is clockwise and my twin's is counter-clockwise</option>
                    <option value="3" @if(!empty($twin_identifier_info) && $twin_identifier_info->hair_are_different == 3) selected  @endif>My whorls spiral is counter-clockwise and my twin's is clockwise</option>
                    <option value="4" @if(!empty($twin_identifier_info) && $twin_identifier_info->hair_are_different == 4) selected  @endif>My cowlicks spiral is counter-clockwise and my twin's is clockwise</option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="my_eye_color" class="wizard-form-text-label">12.15 My Eye Color?</label>
                <select class="form-control" name="my_eye_color" id="my_eye_color">
                    <option value=""></option>
                    <option value="amber" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'amber') selected @endif>Amber</option>
                    <option value="blue" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'blue') selected @endif>Blue</option>
                    <option value="brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'brown') selected @endif>Brown</option>
                    <option value="gray" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'gray') selected @endif>Gray</option>
                    <option value="green" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'green') selected @endif>Green</option>
                    <option value="hazel" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'hazel') selected @endif>Hazel</option>
                    <option value="red_and_violet" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'red_and_violet') selected @endif>Red and violet</option>
                    <option value="spectrum_of_eye_color" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_eye_color == 'spectrum_of_eye_color') selected @endif>Spectrum of eye color</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_eye_color" class="wizard-form-text-label">12.16 My Twin's Eye Color?</label>
                <select class="form-control" name="twin_eye_color" id="twin_eye_color">
                    <option value=""></option>
                    <option value="amber" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'amber') selected @endif>Amber</option>
                    <option value="blue" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'blue') selected @endif>Blue</option>
                    <option value="brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'brown') selected @endif>Brown</option>
                    <option value="gray" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'gray') selected @endif>Gray</option>
                    <option value="green" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'green') selected @endif>Green</option>
                    <option value="hazel" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'hazel') selected @endif>Hazel</option>
                    <option value="red_and_violet" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'red_and_violet') selected @endif>Red and violet</option>
                    <option value="spectrum_of_eye_color" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_eye_color == 'spectrum_of_eye_color') selected @endif>Spectrum of eye color</option>


                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="my_hair_color" class="wizard-form-text-label">12.17 My current Hair Color</label>
                <select class="form-control" name="my_hair_color" id="my_hair_color">
                    <option value=""></option>
                    <option value="black" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'black') selected @endif>Black</option>
                    <option value="blonde" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'blonde') selected @endif>Blonde</option>
                    <option value="brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'brown') selected @endif>Brown</option>
                    <option value="brunette" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'brunette') selected @endif>Brunette</option>
                    <option value="carrot_top_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'carrot_top_red') selected @endif>Carrot Top Red</option>
                    <option value="dark_brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'dark_brown') selected @endif>Dark-Brown</option>
                    <option value="fiery_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'fiery_red') selected @endif>Fiery Red</option>
                    <option value="gray" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'gray') selected @endif>Gray</option>
                    <option value="honey" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'honey') selected @endif>Honey</option>
                    <option value="light_brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'light_brown') selected @endif>Light-Brown</option>
                    <option value="platinum_blonde" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'platinum_blonde') selected @endif>Platinum Blonde</option>
                    <option value="sandy" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'sandy') selected @endif>Sandy</option>
                    <option value="silver" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'silver') selected @endif>Silver</option>
                    <option value="strawberry_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->my_hair_color === 'strawberry_red') selected @endif>Strawberry Red</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>


        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label for="twin_hair_color" class="wizard-form-text-label">12.18 My twin's current Hair Color</label>
                <select class="form-control" name="twin_hair_color" id="twin_hair_color">
                    <option value=""></option>
                    <option value="black" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'black') selected @endif>Black</option>
                    <option value="blonde" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'blonde') selected @endif>Blonde</option>
                    <option value="brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'brown') selected @endif>Brown</option>
                    <option value="brunette" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'brunette') selected @endif>Brunette</option>
                    <option value="carrot_top_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'carrot_top_red') selected @endif>Carrot Top Red</option>
                    <option value="dark_brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'dark_brown') selected @endif>Dark-Brown</option>
                    <option value="fiery_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'fiery_red') selected @endif>Fiery Red</option>
                    <option value="gray" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'gray') selected @endif>Gray</option>
                    <option value="honey" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'honey') selected @endif>Honey</option>
                    <option value="light_brown" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'light_brown') selected @endif>Light-Brown</option>
                    <option value="platinum_blonde" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'platinum_blonde') selected @endif>Platinum Blonde</option>
                    <option value="sandy" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'sandy') selected @endif>Sandy</option>
                    <option value="silver" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'silver') selected @endif>Silver</option>
                    <option value="strawberry_red" @if(!empty($twin_identifier_info) && $twin_identifier_info->twin_hair_color === 'strawberry_red') selected @endif>Strawberry Red</option>

                </select>
                <p class="text_danger form_error"></p>
            </div>
        </div>



    </div>
    <div class="form-group clearfix">
        <a  href="javascript:;" onclick="returnLater('fieldset_twelve','consumer_this_is_me')" class="form-wizard-return-btn float-left mr-3">Pause & Return Later</a>

        {{-- <a href="javascript:;" onclick="previousStep('twin_identifier_bar','distinguish_bar')"
            class="form-wizard-previous-btn float-left">Previous</a> --}}
        <a onclick="checkFieldSetTwinIdentifier()" href="javascript:;" id="twin_identifier_information_button"
            class="form-wizard-next-btn  float-right">Save & Continue</a>
    </div>
    <script>
    
    $(document).ready(function() {
        $('#twin_first_name,#twin_mi,#twin_last_name').on('input', function() {
            var input = $(this);
            var value = input.val();
    
            // Remove any non-alphabetical characters
            value = value.replace(/[^a-zA-Z]/g, '');
    
            // Update the input value
            input.val(value);
        });
    
    });
    </script>
</fieldset>
