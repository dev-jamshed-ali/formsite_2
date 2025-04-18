@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Document Management</h1>

    <form action="{{ route('admin.documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="document_name">Document Name *</label>
                    <input type="text" name="document_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role_id">Select User Role *</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_path">Upload Document</label>
                    <input type="file" name="file_path" class="form-control" accept="application/pdf" required>
                    <small class="text-muted">Upload PDF file (Max: 10MB)</small>
                </div>

                <button type="submit" class="btn btn-success mb-4">
                    <i class="fas fa-upload"></i> Upload Document
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

                <div class="mt-4">
                    <h4>Current Documents</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Document Name</th>
                                <th>Role</th>
                                <th>File</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            @forelse($documents as $document)
                                <tr>
                                    <td>{{ $document->document_name }}</td>
                                    <td>
                                        @if($document->role)
                                            {{ $document->role->role_name }}
                                        @else
                                            Role Not Found
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('public/uploads/' . $document->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf"></i> View PDF
                                        </a>
                                    </td>
                                    <td>{{ $document->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.documents.edit', $document->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ url('admin/documents/delete/'.$document->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No documents uploaded yet</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection