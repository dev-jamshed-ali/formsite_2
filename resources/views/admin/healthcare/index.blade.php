@extends('admin.admin_layouts')

@section('admin_content')
        <div class="col-lg-12 p-3 col-md-12">
            <form id="update_my_info_form_health" action="{{ route('admin.healthcare.update_my_info.store') }}" method="post"
                role="form">
                @csrf
                <div class="form-wizard">
                    <div class="row">
                        <!-- firstname -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="first_name" class="mb-2">What is Your First Name? </label>
                                <input value="{{$healthcare->first_name ?? ""}}" name="first_name" type="text" class="form-control wizard-required">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- lastname -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="last_name" class="mb-2">What is Your Last Name?</label>

                                <label for="last_name" class="mb-2"></label>
                                <input value="{{$healthcare->last_name ?? ""}}" name="last_name" type="text" class="form-control wizard-required">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- building Number -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="building_number" class="mb-2">What is the Physical Building Number of your work site?</label>
                                <input value="{{$healthcare->building_number ?? ""}}" name="building_number" type="text" class="form-control wizard-required"
                                    id="building_number">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- apartment Number -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                            <label for="apartment_number" class="mb-2">What is the Physical Apartment, Office, Suite, Number of your work site?</label>
                                <input value="{{$healthcare->apartment_number ?? ""}}" name="apartment_number" type="text" class="form-control wizard-required"
                                    id="apartment_number">
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
                                        if($states_arrs){
                                            foreach($states_arrs as $stateName => $stateAbbrv ){ ?>
                                                <option value="{{ $stateName }}" data-state-abbrv="{{ $stateAbbrv }}" <?=((isset($healthcare->state) && $healthcare->state == $stateName) ? 'selected="selected"' : '' )?> > {{ $stateName }} </option>
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
                                <label for="city" class="mb-2">What U.S City, Town, Village, Hamlet, Parish, etc. do you work from?</label>
                                <input value="{{$healthcare->city ?? ""}}" name="city" type="city" class="form-control wizard-required"
                                    id="city">
                                <p class="text_danger form_error"></p>
                
                            </div>
                        </div>
                        <!-- phone -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="phone" class="mb-2"> What is a good telephone number to reach you at?  </label>
                                <input value="{{$healthcare->phone ?? ""}}" name="phone" type="number" class="form-control wizard-required"
                                    id="phone">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="email" class="mb-2"> What is your work email address?  </label>
                                <input value="{{$healthcare->email ?? ''}}" name="email" type="email" class="form-control wizard-required" id="email">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- street name -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="street_name" class="mb-2">What is your street name?</label>
                                <input value="{{$healthcare->street_name ?? ''}}" name="street_name" type="text" class="form-control wizard-required" id="street_name">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- country -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="country" class="mb-2">Country</label>
                                <input value="{{$healthcare->country ?? ''}}" name="country" type="text" class="form-control wizard-required" id="country">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- zipcode -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zipcode" class="mb-2">Zip Code</label>
                                <input value="{{$healthcare->zipcode ?? ''}}" name="zipcode" type="text" class="form-control wizard-required" id="zipcode">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- country code -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="country_code" class="mb-2">Country Code</label>
                                <input value="{{$healthcare->country_code ?? ''}}" name="country_code" type="text" class="form-control wizard-required" id="country_code">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- date of birth -->
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="dob" class="mb-2">Date of Birth</label>
                                <input value="{{$healthcare->dob ?? ''}}" name="dob" type="date" class="form-control wizard-required" id="dob">
                                <p class="text_danger form_error"></p>
                            </div>
                        </div>
                        <!-- help description -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="help_description" class="mb-2">Help Description</label>
                                <textarea name="help_description" class="form-control" id="help_description" rows="3">{{$healthcare->help_description ?? ''}}</textarea>
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
        

        $("#update_my_info_form_health").validate({
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
                first_name:{
                    required:true,
                    maxlength: 40,
                },
                last_name:{
                    required:true,
                    maxlength: 40,
                },
                state:{
                    required:true,
                },
                city:{
                    required:true,
                },
                building_number:{
                    required:true,
                    maxlength:10,
                },
                apartment_number:{
                    required:true,
                    maxlength:10,
                },
                phone:{
                    required:true,
                    maxlength:14,
                    minlength:9,
                },
                email:{
                    required:true,
                    noemail:true
                },
                street_name: {
                    required: true,
                    maxlength: 100
                },
                country: {
                    required: true,
                    maxlength: 100
                },
                zipcode: {
                    required: true,
                    maxlength: 20
                },
                country_code: {
                    required: true,
                    maxlength: 10
                },
                dob: {
                    required: true
                },
                help_description: {
                    required: true,
                    maxlength: 1000
                }
            },
            messages: {},
        });
            </script>
    <script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
    <script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
    <script src="{{ asset('public/backend/js/govt/update_my_info.js') }}"></script>
@endsection
