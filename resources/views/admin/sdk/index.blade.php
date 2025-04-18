@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Sdk Management</h1>

    @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.sdk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="document_name">Sdk Name *</label>
                    <input type="text" name="document_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role_id">Select User Role *</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">Select Role</option>
                        <option value="{{ config('constants.admin_types.merchant') }}">Merchant</option>
                        <option value="{{ config('constants.admin_types.financial_institution') }}">Bank</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_path">Upload Sdk</label>
                    <input type="file" name="file_path" class="form-control" accept="application/pdf" required>
                    <small class="text-muted">Upload PDF file (Max: 10MB)</small>
                </div>

                <button type="submit" class="btn btn-success mb-4">
                    <i class="fas fa-upload"></i> Upload Sdk
                </button>

                <div class="mt-4">
                    <h4>Current Sdk</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Role</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>Merchant</td>
                                <td>
                                    @if($general_setting->sdk_for_merchant)
                                        <a href="{{ asset('public/uploads/'.$general_setting->sdk_for_merchant) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No SDK uploaded</span>
                                    @endif
                                </td>
                                <td>
                                    @if($general_setting->sdk_for_merchant)
                                        <a href="{{ route('admin.sdk.delete', 'merchant') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this SDK?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Bank</td>
                                <td>
                                    @if($general_setting->sdk_for_bank)
                                        <a href="{{ asset('public/uploads/'.$general_setting->sdk_for_bank) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No SDK uploaded</span>
                                    @endif
                                </td>
                                <td>
                                    @if($general_setting->sdk_for_bank)
                                        <a href="{{ route('admin.sdk.delete', 'bank') }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this SDK?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        // Auto-hide success and error messages after 3 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $("#successMessage").fadeOut('slow');
                $("#errorMessage").fadeOut('slow');
            }, 3000);
        });
    </script>
    @endpush
@endsection