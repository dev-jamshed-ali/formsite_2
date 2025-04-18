@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">EULA Management</h1>

    <form action="{{ route('admin.general_setting.eula_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="admin_type">Select Admin Type *</label>
                    <select name="admin_type" class="form-control" required>
                        <option value="">Select Admin Type</option>
                        @foreach(config('constants.admin_types') as $type => $id)
                            <option value="{{ $id }}">{{ ucfirst(str_replace('_', ' ', $type)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="pdf_file">Upload EULA PDF</label>
                       <input type="file" name="pdf_file" class="form-control" accept="application/pdf" required>
                    <small class="text-muted">Upload new PDF file (Max: 10MB)</small>
                </div>

                <button type="submit" class="btn btn-success mb-4">
                    <i class="fas fa-upload"></i> Upload EULA
                </button>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Display current EULAs -->
                <div class="mt-4">
                    <h4>Current EULA Files</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Type</th>
                                <th>File</th>
                            </tr>
                            <tr>
                                <td>Consumer EULA</td>
                                <td>
                                    @if($general_setting->eula_for_consumer)
                                        <a href="{{ asset('public/uploads/'.$general_setting->eula_for_consumer) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Institution EULA</td>
                                <td>
                                    @if($general_setting->eula_for_financial)
                                        <a href="{{ asset('public/uploads/'.$general_setting->eula_for_financial) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Merchant EULA</td>
                                <td>
                                    @if($general_setting->eula_for_merchant)
                                        <a href="{{ asset('public/uploads/'.$general_setting->eula_for_merchant) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Display admin EULA status -->
                <div class="mt-4">
                    <h4>Admin EULA Status</h4>
                    <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Admin Name</th>
                                            <th>Type</th>
                                            <th>EULA Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>
                                                    @if($admin->role_id == config('constants.admin_types.consumer'))
                                                        Consumer
                                                    @elseif($admin->role_id == config('constants.admin_types.financial_institution'))
                                                        Financial Institution
                                                    @elseif($admin->role_id == config('constants.admin_types.merchant'))
                                                        Merchant
                                                    @else
                                                        Unknown
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $admin->is_eula_checked ? 'success' : 'warning' }} text-white">
                                                        {{ $admin->is_eula_checked ? 'Agreed' : 'Not Agreed' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No admin records found</td>
                                            </tr>
                                        @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection