@php
    $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
@endphp
@php
    $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
@endphp
@extends('layouts.app')

@section('content')
    <div class="container v-center">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background-image: url({{ asset('public/uploads/' . $general_setting->login_bg) }});">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>

                                    <form id="adminResetPasswordForm" action="{{ url('admin/reset-password/update') }}"
                                        class="user" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email_from_url }}" />
                                        <div class="form-group">
                                            <input id="new_password" type="password" class="form-control form-control-user"
                                                name="new_password" autofocus placeholder="New Password" maxlength="32" />
                                            <p style="color:red;"></p>

                                        </div>
                                        <div class="form-group">
                                            <input id="retype_password" type="password" class="form-control form-control-user"
                                                name="retype_password" placeholder="Retype New Password" maxlength="32" />
                                            <p style="color:red;"></p>

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('admin.includes.scripts-footer')
    <script>
      

        $("#adminResetPasswordForm").validate({
            errorPlacement: function(error, element) {

                error.appendTo(element.siblings('p'));
            },
            onkeyup: function(element) {
                var element_id = $(element).attr('id');
                if (this.settings.rules[element_id].onkeyup !== false) {
                    $(element).valid();
                }
            },
            rules: {
                new_password: {
                    required: true,
                 
                    minlength: 8,
                    maxlength: 32,
                    strong_password: true,
                  
                },
                retype_password: {
                    required: true,
                  
                    maxlength: 32,
                    equalTo: "#new_password",
                    minlength: 8,
                }
            },
           
        });
    </script>
@endsection
