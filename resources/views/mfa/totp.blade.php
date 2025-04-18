<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Authenticator Setup</title>
    <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
</head>
<body>
    <div class="main-container">
        <div class="row g-4 min-100 m-0 p-0">
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                <div class="main-form-div form-login p-3">
                    <h1 class="font-big2-700">Scan QR Code in Google Authenticator</h1>
                    <p>Scan the QR code below using your Google Authenticator app.</p>
                    <img src="{{ $qrImage }}" alt="QR Code" />

                    <form method="POST" action="{{ route('mfa.verify.totp') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Enter the code from Google Authenticator</label>
                            <input type="text" name="code" id="code" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-lg fw-semibold btn-primary w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
