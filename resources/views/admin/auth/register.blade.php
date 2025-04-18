@php
    $general_setting = DB::table('general_settings')->where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/responisve.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">

    @include('admin.includes.scripts')
</head>

<body>
    <div class="main-container">
        <div class="row min-100 m-0 p-0 g-4">
            <div class="col-12 col-md-4 m-0 p-0 bg-grey d-none d-md-flex justify-content-start align-items-center">
                <div>
                    <img src="{{ asset('public/uploads/' . $general_setting->login_bg) }}" class="img-fluid "
                        alt="">
                </div>
            </div>
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                <div class="main-form-div form-signup p-4">
                    <form id="adminRegisterForm" action="{{ route('admin.register.store') }}" method="post">@csrf
                        <h1 class="font-big-700">Signup to <br> Advance Social Justice</h1>
                        <p class="font-sm-400">
                            Empower change through proactive participation. Sign up to advance social justice.
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
                        @if ($errors = Session::get('error'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-block">
                                        <div class="d-flex justify-content-start align-items-center w-100">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong class="ml-4">Whoops! Something went wrong:</strong>
                                        </div>
                                        <ul>
                                            @foreach ($errors as $field => $errorMessages)
                                                @foreach ($errorMessages as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row row-cols-2 g-3">
                            <div class="col">
                                <label for="signup_uname" class="form-label">
                                    Username <span class="text-danger">*</span>
                                </label>
                                <input id="name" type="text" class="form-control form-control-user"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                    placeholder="Name" maxlength="60" />
                                <p style="color:red;"></p>
                            </div>
                            <div class="col">
                                <label for="signup_email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input id="email" type="email" class="form-control form-control-user"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                    placeholder="Email Address" maxlength="80" />
                                <p style="color:red;"></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Phone <span class="text-danger">*</span>
                            </label>
                            <input id="phone" type="text" class="form-control form-control-user" name="phone"
                                value="{{ old('phone') }}" autocomplete="phone" autofocus placeholder="(123) 456-7890"
                                maxlength="14">

                            <p style="color:red;"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="d-flex position-relative justify-content-start align-items-center">
                                <div class="position-relative col-11">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="password" placeholder="Password" maxlength="32">
                                    <p style="color:red;"></p>
                                </div>
                                <img src="{{ asset('public/files/img/eye-close.svg') }}" alt="eye-off" class="eye">
                            </div>
                        </div>
                        <div class="mb-3 row row-cols-2  row-cols-lg-3 gx-3 gy-2">
                            @foreach ($roles as $role)
                                @if ($role->role_name != 'Admin' && $role->role_name != 'Tracker')
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input {{ $role->role_name }}"
                                                value="{{ $role->id }}" name="role_id"
                                                id="role_{{ $role->id }}">
                                            <label class="form-check-label"
                                                for="role_{{ $role->id }}">{{ $role->role_name }}</label>
                                        </div>

                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="mb-3">
                            {{-- <div class="g-recaptcha" data-sitekey="6Lci7RkrAAAAAO_kfqC_MhvTy_Sdy9DikhYSk8IM"></div>
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>


                            @if (isset($errors) && $errors->has('g-recaptcha-response'))
                                <p style="color:red;">{{ $errors->first('g-recaptcha-response') }}</p>
                            @endif --}}
                        </div>

                        <div class="mb-4">
                            <button type="submit"
                                class="btn btn-lg btn-primary fw-semibold w-100 btn-user btn-block">Sign Up</button>
                        </div>
                        <p class="d-flex flex-wrap justify-content-between">
                            <a class="link-hover" href="{{ route('admin.forget_password') }}">Forgot password?</a>
                            <span>Already a user <a class="link-hover" href="{{ route('admin.login') }}">Sign
                                    In</a></span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.scripts-footer')
    <script>
        function getQueryParams() {
            let params = {};
            let queryString = window.location.search.substring(1);
            let queries = queryString.split("&");
            for (let i = 0; i < queries.length; i++) {
                let pair = queries[i].split("=");
                params[pair[0]] = pair[1];
            }
            return params;
        }

        // Check the quere parameter and select the radio button
        function selectRadioButton() {
            let params = getQueryParams();
            if (params['quere'] === 'tr') {
                let radioButton = document.querySelector('.Tracker');
                if (radioButton) {
                    radioButton.checked = true;
                    radioButton.click();
                }
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            selectRadioButton();
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.querySelector('.eye');
            eyeIcon.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });

        });
        $.validator.addMethod(
            "no_sql_keywords_and_special_chars_for_email",
            function(value, element) {
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


        $("#adminRegisterForm").validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.siblings("p"));
            },
            onkeyup: function(element) {
                var element_id = $(element).attr("id");
                if (this.settings?.rules[element_id]?.onkeyup !== false) {
                    $(element).valid();
                }
            },
            rules: {
                name: {
                    required: true,
                    maxlength: 40,
                    no_sql_keywords_and_special_chars_for_email: true,

                },
                phone: {
                    required: true,
                    no_sql_keywords_and_special_chars_for_email: false,
                    maxlength: 14,
                    minlength: 10,
                    digits: false
                },
                email: {
                    required: true,
                    no_sql_keywords_and_special_chars_for_email: true,
                    noemail: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32,
                    strong_password: true,
                },
                role_id: {
                    required: true,
                },

            },
            messages: {
                phone: {
                    minlength: "Please enter at least 10 numbers"
                }
            },
        });
    </script>
    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    <script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
    <script src="{{ asset('public/backend/js/form_wizard.js') }}"></script>
    <script src="{{ asset('public/backend/js/govt/update_my_info.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let phoneInput = document.getElementById('phone');

            phoneInput.addEventListener('input', function(e) {
                let value = phoneInput.value.replace(/\D/g, '').substring(0, 10); // sirf digits lo
                let formattedValue = '';

                if (value.length > 0) {
                    formattedValue += '(' + value.substring(0, 3);
                }
                if (value.length >= 4) {
                    formattedValue += ') ' + value.substring(3, 6);
                }
                if (value.length >= 7) {
                    formattedValue += '-' + value.substring(6, 10);
                }

                phoneInput.value = formattedValue;
            });
        });
    </script>

</body>

</html>
