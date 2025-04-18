@extends('admin.admin_layouts')

@section('admin_content')
<div class="col-lg-12 p-3 col-md-12">
    <form id="update_my_info_form_tracker" action="{{ route('admin.tracker.update_my_info.store') }}" method="post"
        role="form">
        @csrf
        <div class="form-wizard">
            <div class="row">
                <!-- firstname -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="first_name" class="mb-2">What is Your First Name? </label>
                        <input value="{{$tracker->first_name ?? ""}}" name="first_name" type="text"
                            class="form-control wizard-required">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- lastname -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="last_name" class="mb-2">What is Your Last Name?</label>

                        <label for="last_name" class="mb-2"></label>
                        <input value="{{$tracker->last_name ?? ""}}" name="last_name" type="text"
                            class="form-control wizard-required">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- Date of birth -->
                <div class="col-md-4 mb-3">
                    <label for="date_of_birth" class="mb-2">Date of Birth <span>(Permanent)</span></label>
                    <input name="date_of_birth" value="{{$tracker->date_of_birth ?? ''}}"
                        value="{{ date('Y-m-d') }}" type="date" class="form-control wizard-required" id="date_of_birth"
                        @if(!empty($tracker)) @endif />
                    <p class="text_danger form_error"></p>

                </div>
                <!-- gender -->
                <div class="col-md-4 mb-3">
                                            <label for="legal_sex" class="mb-2">Legal Sex (Permanent)
                                                <span>(Permanent)</span></label>
                                            <select class="form-control" name="legal_sex" id="legal_sex"  aria-label="Default select example">
                                            <option></option>
                    <option @if(!empty($tracker) && $tracker->legal_sex == 'female') selected @endif value="female">Female</option>
                    <option @if(!empty($tracker) && $tracker->legal_sex == 'male') selected @endif value="male">Male</option>
                    <option @if(!empty($tracker) && $tracker->legal_sex == 'non_binary') selected @endif value="non_binary">Non Binary</option>
                    <option @if(!empty($tracker) && $tracker->legal_sex == 'unknown') selected @endif value="unknown">Unknow</option>                
                                            </select>
                <p class="text_danger form_error"></p>

                                        </div>
                <!-- building Number -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="building_number" class="mb-2">What is the Physical Building Number of your work
                            site?</label>
                        <input value="{{$tracker->building_number ?? ""}}" name="building_number" type="text"
                            class="form-control wizard-required" id="building_number">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- apartment Number -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="apartment_number" class="mb-2">What is the Physical Apartment, Office, Suite, Number
                            of your work site?</label>
                        <input value="{{$tracker->apartment_number ?? ""}}" name="apartment_number" type="text"
                            class="form-control wizard-required" id="apartment_number">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- state -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="street_name" class="mb-2">What U.S State do you work from?</label>
                        <select class="form-control" name="state" id="state" required>
                            <option value="">Select State </option>
                            <?php 
                                        $states_arrs = get_h_states_list();
if ($states_arrs) {
    foreach ($states_arrs as $stateName => $stateAbbrv) { ?>
                            <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" <?=((isset($tracker->
                                state) && $tracker->state == $stateName) ? 'selected="selected"' : '' )?> >
                                {{ $stateName }} </option>
                            <?php 
                                            }
}  ?>
                        </select>
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- city -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="city" class="mb-2">What U.S City, Town, Village, Hamlet, Parish, etc. do you work
                            from?</label>
                        <input value="{{$tracker->city ?? ""}}" name="city" type="city"
                            class="form-control wizard-required" id="city">
                        <p class="text_danger form_error"></p>

                    </div>
                </div>
                <!-- phone -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="phone" class="mb-2"> What is a good telephone number to reach you at? </label>
                        <input value="{{$tracker->phone ?? ""}}" name="phone" type="number"
                            class="form-control wizard-required" id="phone">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
                <!-- email -->
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="email" class="mb-2"> What is your work email address? </label>
                        <input value="{{$tracker->email ?? ""}}" name="email" type="email"
                            class="form-control wizard-required" id="email">
                        <p class="text_danger form_error"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group clearfix">

            <button class="btn btn-success float-right" style="color:white">Submit</button>
        </div>
</div>
</div>
</form>
</div>
<script>

let dob_age;
    $.validator.addMethod("DOB", function(value, element) {
        let dob = new Date(value);
        let today = new Date();
        let age = today.getFullYear() - dob.getFullYear();

        let monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        dob_age=age;
        return age >= 18 && age <= 100;
    }, function(value, element) {
        if (dob_age < 18) {
            return 'You must be at least 18 years old.';
        } else if (dob_age > 100) {
            return 'You must be less than 100 years old.';
        }
        return false;
    });
    
    $("#update_my_info_form_tracker").validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.siblings("p"));
        },
        onkeyup: function (element) {
            var element_id = $(element).attr("id");
            if (this.settings?.rules[element_id]?.onkeyup !== false) {
                $(element).valid();
            }
        },
        rules: {
            first_name: {
                required: true,
                maxlength: 40,
            },
            last_name: {
                required: true,
                maxlength: 40,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            building_number: {
                required: true,
                maxlength: 10,
            },
            apartment_number: {
                required: true,
                maxlength: 10,
            },
            phone: {
                required: true,
                maxlength: 14,
                minlength: 9,
            },
            email: {
                required: true,
                noemail: true
            },
            date_of_birth: {
                DOB:true,
                required: true,
                date: true,
                maxlength: 32,
                max: new Date().toISOString().split('T')[0]
            },
            legal_sex: {
                required: true,
            }
        },
        messages: {},
    });
</script>
<script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
<script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
<script src="{{ asset('public/backend/js/govt/update_my_info.js') }}"></script>
@endsection