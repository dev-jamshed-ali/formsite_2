

@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="row g-4 min-100 m-0 p-0">
        <div class="col-12 col-md-4 m-0 p-0 bg-grey d-none d-md-flex justify-content-start align-items-center">
            <div>
                <img src="{{ asset('public/uploads/' . $general_setting->login_bg) }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8  d-flex justify-content-center align-items-center">
            <div class="main-form-div form-login p-3">
                <form id="adminForgetPassworForm" action="{{ route('admin.forget_password.store') }}" method="post">
                    @csrf
                    <h1 class="font-big2-700">Forgot your password</h1>
                    <p>Enter your email address and we’ll send you a link to reset your password</p>
                    @if ($message = Session::get('success')||$message = Session::get('error'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>If your email is valid then you will receive a verification email</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="login_email" class="form-label">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="login_email" name="email"
                            value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email Address"
                            maxlength="80">
                        <p style="color:red;"></p>

                    </div>

                    <div class="mb-3 ps-0 py-4 form-check">
                        <a href="{{ route('admin.login') }}">Back to Login Page</a>
                    </div>
                    <button type="submit" class="btn btn-lg fs-6 py-2 btn-primary w-100">Send Verification
                        Link</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.includes.scripts-footer')



<script>
     $.validator.addMethod(
        "no_sql_keywords_and_special_chars_for_email",
        function (value, element) {
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
    $("#adminForgetPassworForm").validate({
        errorPlacement: function (error, element) {

            error.appendTo(element.siblings('p'));
        },
        rules: {
            email: {
                required: true,
                no_sql_keywords_and_special_chars_for_email:true,
                email: true,
                maxlength: 80,
                noemail: true,
            },
        },
        messages: {
            email: "Please enter a valid email address",
        }
    });
</script>
@endsection