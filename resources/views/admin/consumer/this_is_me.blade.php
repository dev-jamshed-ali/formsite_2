@extends('admin.admin_layouts')

@section('admin_content')
<style>
    .stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
  cursor: pointer;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
.permanent_color{
  color:skyblue;
}





.upper_name .step-name {
    position: absolute;
    top: calc(-30% - 10px); /* Update to desired spacing */
    left: 0;
    right: 0;
    white-space: nowrap; /* Prevent step name from wrapping */
    transform: rotate(-45deg);

}

.step-name{
  /* transform: rotate(-8deg); */
}

@import "<?php public_path("public/frontend/css/style.css") ?>";

<?php
// dd($this_is_me_return_back_data);
?>


</style>
        <div class="col-lg-12 col-md-12" >
            <div class="form-wizard">
                <form id="this_is_me_form" action="" method="post" role="form">
                    @include('admin.includes.consumer.this_is_me_form.pidegree_info')
                    @include('admin.includes.consumer.this_is_me_form.find_me_here')
                    @include('admin.includes.consumer.this_is_me_form.gender_identity_information')
                    @include('admin.includes.consumer.this_is_me_form.ethnicity_information')
                    @include('admin.includes.consumer.this_is_me_form.my_neighborhood')
                    @include('admin.includes.consumer.this_is_me_form.employment_information')
                    @include('admin.includes.consumer.this_is_me_form.charges_card')
                    @include('admin.includes.consumer.this_is_me_form.facial_image')
                    @include('admin.includes.consumer.this_is_me_form.travel_info')
                    @include('admin.includes.consumer.this_is_me_form.attestation')
                </form>
            </div>
        </div>

    <script src="{{ asset('public/backend/js/consumer_form/this_is_me_form.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/pidegree_info.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/find_me_here.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/gender_identity_information.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/ethnicity_info.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/my_neighborhood.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/employment_information.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/charges_card.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/facial_image_upload.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/travel_info.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/attestation.js') }}"></script>
    <script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
    <script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
@endsection
