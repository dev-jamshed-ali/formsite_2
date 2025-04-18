@extends('admin.admin_layouts')
@section('admin_content')

<div class="container py-4">
    <!-- Upload Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h4 class="m-0 font-weight-bold text-primary">Upload Document</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.websitedocuments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="document_name" class="form-label text-muted">Document Name</label>
                    <input type="text" class="form-control form-control-lg" name="document_name" required>
                </div>
                <div class="form-group mb-4">
                    <label for="document_file" class="form-label text-muted">PDF File</label>
                    <input type="file" class="form-control form-control-lg" name="document_file" accept=".pdf" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg px-4">Upload Document</button>
            </form>
        </div>
    </div>

    <!-- Documents List -->
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="m-0 font-weight-bold text-primary">Uploaded Documents</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0">Name</th>
                            <th class="border-0">Upload Date</th>
                            <th class="border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                        <tr>
                            <td class="align-middle">{{ $document->name }}</td>
                            <td class="align-middle">{{ $document->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ asset('public/uploads/' . $document->pdf_url) }}" class="btn btn-outline-info btn-sm me-2" target="_blank">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-sm me-2" data-toggle="modal" data-target="#editModal{{ $document->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <a href="{{ route('admin.websitedocuments.delete', $document->id) }}" class="btn btn-outline-danger btn-sm" 
                                   onclick="return confirm('Are you sure you want to delete this document?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $document->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title text-primary">Edit Document</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <form action="{{ route('admin.websitedocuments.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="document_name" class="form-label text-muted">Document Name</label>
                                                <input type="text" class="form-control form-control-lg" name="document_name" value="{{ $document->name }}" required>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="document_file" class="form-label text-muted">Current File</label>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-file-pdf text-danger me-2"></i>
                                                    <a href="{{ asset('public/uploads/' . $document->pdf_url) }}" target="_blank" class="text-decoration-none">
                                                        {{ $document->pdf_url }}
                                                    </a>
                                                </div>

                                                <label for="document_file" class="form-label text-muted mt-3">Upload New PDF File (Optional)</label>
                                                <input type="file" class="form-control form-control-lg" name="document_file" accept=".pdf">
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-light btn-lg me-2" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary btn-lg px-4">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection