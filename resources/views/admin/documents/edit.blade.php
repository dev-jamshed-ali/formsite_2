@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Document</h1>

    <form action="{{ route('admin.documents.update', $document->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="document_name">Document Name *</label>
                    <input type="text" name="document_name" class="form-control" value="{{ $document->document_name }}" required>
                </div>

                <div class="form-group">
                    <label for="role_id">Select User Role *</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $document->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->role_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="file_path">Upload New Document (Optional)</label>
                    <input type="file" name="file_path" class="form-control" accept="application/pdf">
                    <small class="text-muted">Upload PDF file (Max: 10MB). Leave empty to keep the current file.</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update Document
                </button>
            </div>
        </div>
    </form>
@endsection