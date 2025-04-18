<!-- @php
    $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
@endphp
@php
    $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
@endphp -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/responisve.css') }}">
</head>

<body>
    <div class="main-container">
        <div class="row g-4 min-100 m-0 p-0">
            <div class="col-12 col-md-4 m-0 p-0 bg-grey d-none d-md-flex justify-content-start align-items-center">
                <div>
                    <img src="{{ asset('public/uploads/' . $general_setting->login_bg) }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-12 col-md-8  d-flex justify-content-center align-items-center">
                <div class="main-form-div form-login p-3">
                    <form id="adminLoginForm" action="{{ route('admin.login.store') }}" method="post"> @csrf
                        <h1 class="font-big2-700">Login In</h1>
                        <p>Enter your login details to continue</p>
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
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control form-control-user" id="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email Address"
                                maxlength="80">
                            <p style="color:red;"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="password" placeholder="Password" maxlength="32">
                                <img src="{{ asset('public/files/img/eye-close.svg') }}" alt="eye-off" class="eye">
                            </div>
                            <p style="color:red;"></p>
                        </div>
                        <div class="mb-2  d-flex justify-content-start align-items-center ">
                            <input type="checkbox" class="m-1" name="remember" id="remember">
                            <label for="remember">Remember this device for 30 days</label>
                        </div>
                        
                        <div class="mb-3 d-flex justify-content-between align-items-center ">
                            <button type="button" class="btn btn-sm btn-outline-primary px-3 py-1 rounded-pill"
                                        data-bs-toggle="modal" data-bs-target="#mfaModal">
                                        Instructions
                                    </button>
                            <div>Create Account <a class="link-hover" href="{{ route('admin.register') }}">Sign Up</a>
                            </div>
                        </div>
                        
                        <button type="submit" id="submit"
                            class="btn btn-lg fw-semibold btn-primary w-100 btn-user btn-block">Login</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- MFA Modal -->
<div class="modal fade" id="mfaModal" tabindex="-1" aria-labelledby="mfaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="mfaModalLabel">Google Authenticator Setup Guide</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-light">
          <ol style="line-height: 1.8;" class="ps-3">
              <li>Download and install <strong>Google Authenticator</strong> from Google Playstore or Apple iTunes Store.</li>
              <li>Launch the Google Authenticator app.</li>
              <li>Click on <strong>Begin Setup</strong> at the bottom.</li>
              <li>Choose either:
                  <ul class="mt-1">
                      <li><strong>Scan a QR code</strong></li>
                      <li><strong>Enter a setup key</strong></li>
                  </ul>
              </li>
              <li><strong>Backup Codes:</strong> Write them down and keep them safe. If lost, restart the process to get new ones.</li>
              <li>Pair the Google Authenticator with your new <strong>Ginicoe Profile</strong>.</li>
              <li>Enable the blue <strong>Multi-Factor Authentication (MFA)</strong> slider in your Ginicoe profile.</li>
              <li>Use your smartphone to tap <strong>‘scan a QR code’</strong>.</li>
              <li>Scan the QR code shown on your Ginicoe profile page.</li>
              <li>A 6-digit code will appear and refresh every 30 seconds.</li>
              <li>Enter that 6-digit code in the box labeled <strong>"Code Generator"</strong> on the page.</li>
              <li><strong>Congratulations!</strong> You have now successfully paired your profile with Google Authenticator.</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.querySelector('.eye');
            eyeIcon.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        });
        
        $.validator.addMethod(
            "no_sql_keywords_and_special_chars_for_email",
            function (value, element) {
                return false;
                // List of forbidden SQL keywords
                const forbiddenKeywords = [
                    "INSERT", "UNION", "SELECT", "ORDER BY", "AND", "OR",
                    "NOT", "NULL", "UPDATE", "INTRO", "DELETE",
                    "COUNT", "SUM", "AVG", "LIKE", "WILDCARD"
                ];

                // Special characters to remove
                const specialChars = /[!#$%^&*()_+={}:"<>]/g;

                // Convert input value to uppercase to perform case-insensitive comparison
                let upperValue = value.toUpperCase();
                let originalValue = value;

                // Replace any forbidden keywords found
                forbiddenKeywords.forEach(keyword => {
                    const regex = new RegExp(keyword, 'gi');
                    originalValue = originalValue.replace(regex, '');
                });

                // Replace any special characters found
                originalValue = originalValue.replace(specialChars, '');

                // Update the input field with the cleaned value
                $(element).val(originalValue);

                // If the cleaned value is different from the original, return false
                return value === originalValue;
            },
            "Input contains forbidden SQL keywords or special characters, and they have been removed"
        );
        $("#adminLoginForm").validate({
            errorPlacement: function (error, element) {

                error.appendTo(element.siblings('p'));
            },
            onkeyup: function (element) {
                var element_id = $(element).attr('id');
                if (this.settings?.rules[element_id]?.onkeyup !== false) {
                    $(element).valid();
                }
            },
            rules: {

                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32,


                },

                email: {
                    required: true,
                    no_sql_keywords_and_special_chars_for_email: true,
                    email: true,
                    maxlength: 80,
                    noemail: true,
                },


            },
            messages: {

                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },

                email: "Please enter a valid email address",

            }
        });
    </script>
    
    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    <script src="{{ asset('public/files/js/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/files/js/multi-step-script.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    @include('admin.includes.scripts-footer')
</body>

</html>