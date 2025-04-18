@extends('admin.admin_layouts')

@section('admin_content')
<div class="container">
    @if(session('role_id') == config('constants.admin_types.financial_institution') || session('role_id') == config('constants.admin_types.merchant'))
        <div class="card">
            <div class="card-header">
                <h3>SDK Documentation</h3>
            </div>
            <div class="card-body">
                <!-- Role-based content display -->
                <div class="sdk-docs">
                    <h4>
                        @if(session('role_id') == config('constants.admin_types.financial_institution'))
                            Financial Institution Integration Documentation
                        @else
                            Merchant Integration Documentation
                        @endif
                    </h4>

                    <!-- PDF Viewer -->
                    <div class="sdk-content-wrapper">
                        <div id="pdf-container" class="mt-4 {{ !$admin->is_sdk_checked ? 'blurred' : '' }}" style="width: 100%; height: 500px; overflow: auto;">
                            @php
                                $pdf_file = session('role_id') == config('constants.admin_types.financial_institution') 
                                    ? $general_setting->sdk_for_bank 
                                    : $general_setting->sdk_for_merchant;
                            @endphp
                            
                            @if($pdf_file)
                                <object id="pdf-viewer" data="{{ asset('public/uploads/'.$pdf_file) }}" type="application/pdf" width="100%" height="500px">
                                    <p>Unable to display PDF file. <a href="#" id="fallback-download">Click here to download the PDF!</a></p>
                                </object>
                            @else
                                <div class="alert alert-warning">
                                    No SDK documentation has been uploaded yet.
                                </div>
                            @endif
                        </div>

                        @if($pdf_file)
                            <!-- Agreement Section -->
                            <div class="agreement-section mt-4 {{ $admin->is_sdk_checked ? 'd-none' : '' }}">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Please accept the terms and conditions to view and download the SDK documentation.
                                </div>
                                
                                <div class="form-check mt-3">
                                    <input type="checkbox" class="form-check-input" id="agreementCheck">
                                    <label class="form-check-label" for="agreementCheck">
                                        I have read and agree to the terms and conditions for using this SDK
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Download Button -->
                            <form action="{{ route('admin.sdk.agree') }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="file" value="{{ $pdf_file ?? '' }}">
                                <input type="hidden" name="type" value="{{ session('role_id') == config('constants.admin_types.merchant') ? 'merchant' : 'bank' }}">
                                <button type="submit" id="downloadBtn" class="btn btn-primary">
                                    <i class="fas fa-download"></i> Agree To SDK Documentation
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> You don't have permission to access this documentation.
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const agreementCheck = document.getElementById('agreementCheck');
    const downloadBtn = document.getElementById('downloadBtn');
    const pdfContainer = document.getElementById('pdf-container');
    const downloadForm = document.querySelector('form');
    
    // Only handle agreement checkbox if user hasn't agreed yet
    @if(!$admin->is_sdk_checked)
        if (agreementCheck && downloadBtn) {
            downloadBtn.disabled = true; // Initially disable button
            agreementCheck.addEventListener('change', function() {
                downloadBtn.disabled = !this.checked;
                if (this.checked) {
                    pdfContainer.classList.remove('blurred');
                } else {
                    pdfContainer.classList.add('blurred');
                }
            });
        }
    @endif

    // Handle form submission
    if (downloadForm) {
        downloadForm.addEventListener('submit', function(e) {
            // After a short delay, refresh the page
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        });
    }
});
</script>
@endpush

<style>
.sdk-docs {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.sdk-content-wrapper {
    position: relative;
}

.blurred {
    filter: blur(5px);
    pointer-events: none;
    user-select: none;
}

.agreement-section {
    border-top: 1px solid #eee;
    padding-top: 20px;
    margin-top: 20px;
}

#downloadBtn:disabled {
    cursor: not-allowed;
    opacity: 0.6;
}

.form-check-label {
    cursor: pointer;
}
</style>
@endsection
