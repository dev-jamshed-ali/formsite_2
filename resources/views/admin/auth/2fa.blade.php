@php
    $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>2 Factor Auth</title>
   <!-- css -->
   <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('public/files/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('public/files/css/responisve.css') }}">
</head>

<body>
<div class="main-container ">
    <div class="row g-4 min-100 m-0 p-0">
        <div class="col-12 col-md-4 m-0 p-0 bg-grey d-none d-md-flex justify-content-start align-items-center">
            <div>
                <img src="{{ asset('public/uploads/' . $general_setting->login_bg) }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8  d-flex justify-content-center align-items-center">
            <div class="main-form-div form-otp px-3 py-5">
                <form method="POST" id="login_form" action="{{ route('2fa.post') }}">
                    @csrf
                    <h1 class="font-big2-700">OTP VERIFICATION</h1>
                    <p class="font-sm-400 mb-4 otp-digit-text">
                        We've sent a text message to
                        {{ substr(session('phone'), 0, 5) . '******' . substr(session('phone'), -2) }} . Enter the
                        6-digit code
                    </p>
                    @if ($message = Session::get('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3" id="otpForm">
                        <input type="text" class="verification-input" name="sms_code_1" maxlength="1" id="digit1"
                            onkeyup="moveToNextOrRemove(this, 'digit1', 'digit2')" onpaste="handlePaste(event)">
                        <input type="text" class="verification-input" name="sms_code_2" maxlength="1" id="digit2"
                            onkeyup="moveToNextOrRemove(this, 'digit1', 'digit3')" onpaste="handlePaste(event)">
                        <input type="text" class="verification-input" name="sms_code_3" maxlength="1" id="digit3"
                            onkeyup="moveToNextOrRemove(this, 'digit2', 'digit4')" onpaste="handlePaste(event)">
                        <input type="text" class="verification-input" name="sms_code_4" maxlength="1" id="digit4"
                            onkeyup="moveToNextOrRemove(this, 'digit3', 'digit5')" onpaste="handlePaste(event)">
                        <input type="text" class="verification-input" name="sms_code_5" maxlength="1" id="digit5"
                            onkeyup="moveToNextOrRemove(this, 'digit4', 'digit6')" onpaste="handlePaste(event)">
                        <input type="text" class="verification-input" name="sms_code_6" maxlength="1" id="digit6"
                            onkeyup="moveToNextOrRemove(this, 'digit5', '')" onpaste="handlePaste(event)">

                            <input name="code" id="code" type="hidden" value="" required class="form-control @error('code') is-invalid @enderror">


                        </div>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="mb-3 ps-0 form-check">
                        <p class="d-flex flex-wrap justify-content-between">
                            <span>
                                Didn't receive the code?
                                <a class="link-hover" href="{{ route('2fa.resend') }}"> Resend</a>
                            </span>
                            <span><a class="link-hover text-dark" href="{{ route('google2fa.index') }}">Try another Method?</a></span>
                        </p>
                    </div>
                    <div class="mb-3 form-check mb-5">
                        <input type="checkbox" class="form-check-input" id="otp_remember" checked>
                        <label class="form-check-label" for="login_remember">Remember this device for 30
                            days</label>
                    </div>
                    <button type="submit" class="btn btn-lg fw-semibold btn-primary w-100">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.scripts-footer')

<script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
   <script src="{{ asset('public/files/js/script.js') }}"></script>
   <script>
    document.addEventListener("DOMContentLoaded", function() {
        var digit_1 = document.getElementById("digit1");
        digit_1.focus()
    document.querySelectorAll('input.verification-input').forEach(function(input) {
        input.addEventListener('keyup', function() {
            // Allow only numbers
            this.value = this.value.replace(/[^0-9\.]/g, '');

            var maxLength = this.getAttribute('maxlength');
            var inputLength = this.value.length;

            if (inputLength == maxLength) {
                var nextInput = this.nextElementSibling;
                if (nextInput && nextInput.classList.contains('verification-input')) {
                    nextInput.focus();
                }
            } else if (inputLength === 0) {
                var prevInput = this.previousElementSibling;
                if (prevInput && prevInput.classList.contains('verification-input')) {
                    prevInput.focus();
                }
            }

            var sms_code_1 = document.getElementById("digit1").value;
            var sms_code_2 = document.getElementById("digit2").value;
            var sms_code_3 = document.getElementById("digit3").value;
            var sms_code_4 = document.getElementById("digit4").value;
            var sms_code_5 = document.getElementById("digit5").value;
            var sms_code_6 = document.getElementById("digit6").value;

            var sms_code_val = '';
            if (sms_code_1 !== '') {
                sms_code_val += sms_code_1;
            }
            if (sms_code_2 !== '') {
                sms_code_val += sms_code_2;
            }
            if (sms_code_3 !== '') {
                sms_code_val += sms_code_3;
            }
            if (sms_code_4 !== '') {
                sms_code_val += sms_code_4;
            }
            if (sms_code_5 !== '') {
                sms_code_val += sms_code_5;
            }
            if (sms_code_6 !== '') {
                sms_code_val += sms_code_6;
            }
            document.getElementById('code').value = sms_code_val;

            if (sms_code_val.length == 6) {
                document.getElementById('submit_btn').focus();
            }
        });
    });
});

    </script>
</body>

</html>