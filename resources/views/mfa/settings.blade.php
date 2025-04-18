@php
    $general_setting = DB::table('general_settings')->where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFA Setup</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/responisve.css') }}">
    <!-- Include Toast CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        /* Remove borders from the input fields and buttons */
        .form-control {
            border: none !important;
            box-shadow: none !important;
        }

        .btn-outline-primary {
            border: none !important;
            background: transparent !important;
        }

        /* Style the secret key container */
        .form-control:read-only {
            background-color: #f7f7f7;
        }
    </style>
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
                        <h1 class="font-big2-700">MFA Setup</h1>

                        <!-- QR Code Display -->
                        <div class="mb-3 text-center">
                            <img src="{{ $qrImage }}" alt="QR Code" class="img-fluid" style="max-width: 300px; height: auto;">
                        </div>

                        <!-- Secret Key Display with Copy Button -->
                        <div class="mb-3 d-flex align-items-center">
                            <input type="text" id="secretKey" class="form-control" value="{{ $secret }}" readonly>
                            <button type="button" class="btn btn-outline-primary ms-2" id="copyButton">Copy</button>
                        </div>

                        <!-- Message if any error -->
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Enter the code from your app</label>
                            <input type="text" name="code" id="code" class="form-control form-control-user" required placeholder="123456">
                        </div>

                        <button type="submit" class="btn btn-lg fw-semibold btn-primary w-100 mt-3">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS and Toastify for notifications -->
    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    <script src="{{ asset('public/files/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('public/files/js/multi-step-script.js') }}"></script>
    
    <!-- Include Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

    <script>
        // Copy to Clipboard Functionality
        document.getElementById('copyButton').addEventListener('click', function() {
            var secretInput = document.getElementById('secretKey');
            secretInput.select();
            document.execCommand('copy');

            // Show Toast notification
            Toastify({
                text: "Secret Key copied to clipboard!",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "green"
            }).showToast();
        });
    </script>

    @include('admin.includes.scripts-footer')
</body>

</html>
