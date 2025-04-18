@php
    $general_setting = DB::table('general_settings')->where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select MFA Method</title>
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

            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                <div class="main-form-div form-login p-3">
                    <form action="{{ route('mfa.select.method') }}" method="POST">
                        @csrf
                        <h1 class="font-big2-700">Select MFA Method</h1>
                        <p>Choose how you'd like to verify your login</p>

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="phone" value="phone" required>
                                <label class="form-check-label" for="phone">
                                    Send code via phone
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="google" value="google_authenticator" required>
                                <label class="form-check-label" for="google">
                                    Use Google Authenticator
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg fw-semibold btn-primary w-100 btn-user btn-block">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    @include('admin.includes.scripts-footer')
</body>

</html>
