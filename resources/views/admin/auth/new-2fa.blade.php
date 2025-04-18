@extends('admin.admin_layouts')
@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">2FA Verification</div>
  
                <div class="card-body">
                    <form name="otp_datas_form" id="otp_datas_form" method="POST" action="{{ route('2fa.post') }}">
                        @csrf
  
                        <p class="text-center">We sent code to your phone : {{ substr(session('phone'), 0, 5) . '******' . substr(session('phone'),  -2) }} and Email: {{session('email')}}</p>
  
                        @if ($message = Session::get('success'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
  
                        @if ($message = Session::get('error'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
                        <!-- <form action="" class="otp-form"> </form> -->
                        <style>
                            input[type="text"].otp-field {
                                width:40px;
                                float: left;
                                margin: 0px 4px 0px 4px;
                            }
                        </style>
                        <div class="form-group row mb-3 mt-4">
                            <label for="code" class="col-md-3 col-form-label text-md-right pt-14">Code</label> 
                            <div class="col-md-8 text-center">
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" autofocus  />
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" />
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" />
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" />
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" />
                                <input class="form-control otp-field required" type="text" name="opt-field[]" maxlength="1" /> 

                                <input id="otp_code" type="hidden" name="code" value="" />
                            </div>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  

                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-3">
                            <button name="otp_submit_btn" id="otp_submit_btn" type="submit" class="btn btn-primary">
                                    Submit
                            </button> &nbsp; | &nbsp; <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div> 
                    </form>
                    <script>
                        $(document).ready(function () {
                            $("#otp_datas_form *:input[type!=hidden]:first").focus();

                            let otp_fields = $("#otp_datas_form input.otp-field"),
                                otp_value_field = $("#otp_datas_form input#otp_code");

                                otp_fields.on("input", function (e) {
                                    $(this).val(
                                        $(this).val().replace(/[^0-9]/g, "")
                                    );

                                    let opt_value = '';
                                    otp_fields.each(function () {
                                        let field_value = $(this).val();
                                        if (field_value != ''){ 
                                            opt_value += field_value; 
                                        }
                                    }); 

                                    if(opt_value != ''){
                                        otp_value_field.val(opt_value);
                                        var otp_value_length = (otp_value_field.val()).length;
                                        if(otp_value_length == 6){
                                            $("#otp_submit_btn").focus();   
                                        } 
                                    }
                                })
                                .on("keyup", function (e) {
                                    let key = e.keyCode || e.charCode;
                                    if (key == 8 || key == 46 || key == 37 || key == 40) {
                                        // Backspace or Delete or Left Arrow or Down Arrow
                                        $(this).prev().focus();
                                    } else if (key == 38 || key == 39 || $(this).val() != "") {
                                        // Right Arrow or Top Arrow or Value not empty
                                        $(this).next().focus();
                                    }
                                })
                                .on("paste", function (e) {
                                    let paste_data = e.originalEvent.clipboardData.getData("text");
                                    let paste_data_splitted = paste_data.split("");
                                    let opt_value2 = '';
                                    $.each(paste_data_splitted, function (index, vals) {
                                        otp_fields.eq(index).val(vals);  
                                        if (vals != ""){
                                           opt_value2 += vals;
                                        }  
                                    }); 

                                    if(opt_value2 != ''){
                                        otp_value_field.val(opt_value2);
                                        var otp_value_length = (otp_value_field.val()).length; 
                                        if(otp_value_length == 6){
                                            $("#otp_submit_btn").focus();   
                                        } 
                                    } 
                                });
                            }); 
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection