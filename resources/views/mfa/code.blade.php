@php
    $general_setting = DB::table('general_settings')->where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFA Verification</title>
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
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                <div class="main-form-div form-login p-3">
                    <form action="{{ route('mfa.verify.totp') }}" method="POST">
                        @csrf
                        <h1 class="font-big2-700">MFA Verification</h1>
                        <p>Enter the 6-digit code from your authenticator app</p>

                        <div class="mb-3">
                            <label class="form-label">Authentication Code</label>
                            <input type="text" name="code" id="code" class="form-control form-control-user" placeholder="123456" required>
                        </div>

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-lg fw-semibold btn-primary w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    <script src="{{ asset('public/files/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('public/files/js/multi-step-script.js') }}"></script>
    @include('admin.includes.scripts-footer')
</body>

</html>
