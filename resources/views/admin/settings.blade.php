@extends('admin.admin_layouts')

@section('admin_content')
<style>
.container {
    max-width: 1242px;
    margin: 0 auto;
    padding: 20px;
}

.warning-box {

    border: 1px solid #b3d9ff;
    padding: 15px;
    margin-bottom: 20px;
    color: red;
}

.steps-list {
    padding-left: 20px;
    margin-bottom: 20px;
    color: #000;
    font-weight: bold;
}

.qr-code-container {
    text-align: left;
    margin: 20px 0;
    border: 1px solid #ccc;
    padding: 10px;
}

.verify-input {
    width: 100px;
    padding: 5px;
    margin-right: 10px;
}

.icon-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

/* New styles for centering the modal */
.modal-dialog {
    display: flex;
    align-items: center;
    min-height: calc(100% - 1rem);
}

@media (min-width: 576px) {
    .modal-dialog {
        min-height: calc(100% - 3.5rem);
    }
}

.error-message {
    color: red;
    margin-top: 10px;
}
</style>

<div class="container">
    <div id="twofa-config">
@if(session('google2fa_enabled') == 1)
        <h2 class="text-dark">Two-Factor Authentication Status</h2>
        <p class="alert alert-success">Two-Factor Authentication (2FA) is currently enabled for your account.</p>
        <form action="{{ route('disable2fa') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" id="disable-2fa-button" name="disable-2fa-button" onclick="return confirm('Are you sure you want to disable 2FA?');">Disable 2FA</button>
        </form>
@else
    <h2 class="text-dark ">Configure two factor authentication</h2>
    <p>Two-Factor Authentication (2FA) adds an extra layer of security to your account. It requires not only your
        password but also a second factor to verify your identity.</p>

    <div class="d-flex align-items-center py-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
            class="bi bi-person-exclamation text-danger me-2" viewBox="0 0 16 16">
            <path
                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
            <path
                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z" />
        </svg>
        <div>
            <strong class="text-danger">Please read this: it is extremely important!</strong>
            <p class="text-danger mb-0">Please make sure that you have entered your backup security details. If you
                don't have any backup details, we will not be able to assist you if you lose two factor authentication
                code. <a href="" class="text-danger">Please check these details now!</a></p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <p style="color: #000; font-weight: bold;">You do not currently have two factor authentication enabled on
                your account. To enable it, please follow the steps below:</p>

            <ol class="steps-list">
                <li>Download and install the Google Authentication app from either <a
                        href="https://apps.apple.com/us/app/google-authenticator/id388497605" target="_blank">Apple App
                        Store</a> or <a
                        href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&pli=1"
                        target="_blank">Google Play</a></li>
                <li>Select Add Token and scan the QR code opposite.</li>
                <li>Enter the number which the app generates below to enable.</li>
            </ol>
        </div>

        <div class="icon-container col-md-6 d-flex justify-content-center align-items-center">

            <div class="qr-code-container ">
                <img src="data:image/png;base64,{{ $QR_Image }}" alt="QR Code" style="width: 250px; height: 250px;" />
            </div>
        </div>
    </div>




    <div>
        <label for="verify-code" class="text-dark font-weight-bold">Verify the code from app:</label><br>
        <input type="text" id="verify-code" class="verify-input" maxlength="6" pattern="[0-9]*" autocomplete="off">
        <button class="btn btn-primary" id="verify-button" aria-modal="verifyModal" data-toggle="modal" onclick="verifyCode()">
            Verify
        </button>

        <!-- Error message placeholder -->
        <div id="error-message" class="error-message"></div>

        <!-- Modal -->
        <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body p-5 d-flex flex-column align-items-center justify-content-center">
                        <img src="https://ginicoe.com/public/uploads/logo.jpg" alt="Ginicoe Logo"
                            style="width: 100px; height: 100px;">
                        <p class="text-center">Two factor authentication Setup <br> completed</p>
                        <button class="btn btn-primary">Continue to your Ginicoe Admin</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
</div>
</div>
<script>
    var isLoading = false;
    function setLoading(isLoading){
        const verifyButton = document.getElementById('verify-button');
        if(isLoading){
            verifyButton.disabled = true;
            verifyButton.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> Verifying...';
        }else{
            verifyButton.disabled = false;
            verifyButton.innerHTML = 'Verify';
        }
    }
    async function verifyCode() {
    try {
        if (isLoading) {
            return;
        }
        isLoading = true;
        setLoading(true);
        const verifyCode = document.getElementById('verify-code').value;
        if (verifyCode.length !== 6) {
            throw "Please enter a 6-digit code";
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Make a request to verify the code
        const response = await $.post('2fa/verify', {
            code: verifyCode,
            secret: "{{ $secret }}"
        });
        
        if (response.success) {
            // Show success message
            $('#error-message').html('<div class="alert alert-success">' + response.message + '</div>');
            
            // Update the view to show 2FA is enabled
            $('#twofa-config').html(`
                <h2 class="text-dark">Two-Factor Authentication Status</h2>
                <p class="alert alert-success">Two-Factor Authentication (2FA) is currently enabled for your account.</p>
                <form action="{{ route('disable2fa') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" id="disable-2fa-button" name="disable-2fa-button" onclick="return confirm('Are you sure you want to disable 2FA?');">Disable 2FA</button>
                </form>
            `);
        } else {
            throw response.message;
        }
    } catch (error) {
        console.log("Error occurred", error);
        const errorMessage = typeof error == 'string' ? error : error.responseJSON?.message || 'An error occurred';
        $('#error-message').html('<div class="alert alert-danger">' + errorMessage + '</div>');
    } finally {
        isLoading = false;
        setLoading(false);
    }
}
</script>
@endsection
