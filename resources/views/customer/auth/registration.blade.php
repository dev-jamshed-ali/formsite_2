@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/' . $g_setting->banner_registration) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>Customer SignUp</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer SignUp</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="reg-login-form">
                        <div class="inner">
                            <form id="registerForm" action="{{ route('customer.registration.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="customer_name">
                                    <span style="float: left;color:red"> </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Email address</label>
                                    <input type="text" class="form-control" name="customer_email">
                                    <span style="float: left;color:red"> </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input id="customer_password" type="password" class="form-control"
                                        name="customer_password">
                                        <span style="float: left;color:red"> </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control" name="customer_re_password">
                                    <span style="float: left;color:red"> </span>
                                </div>

                                @if ($g_setting->google_recaptcha_status == 'Show')
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="{{ $g_setting->google_recaptcha_site_key }}">
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary btn-arf">Make SignUp</button>
                                <div class="new-user">
                                    <a href="{{ route('customer.login') }}">Existing User? Go to Login Page</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#registerForm").validate({
            errorPlacement: function(error, element) {

                error.appendTo(element.siblings("span"));
            },
            rules: {
                customer_name: {
                    required: true,
                    maxlength: 25
                },
                customer_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 25
                },
                customer_re_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#customer_password",
                    maxlength: 25
                },
                customer_email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },


            },
            messages: {
                customer_name: "Please enter your Name",


                customer_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                customer_re_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                },
                customer_email: "Please enter a valid email address",

            }
        });
    </script>
@endsection
