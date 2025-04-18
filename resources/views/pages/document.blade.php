@extends('layouts.app')

@section('content')
<div class="container pb-5">
    <h1 class="text-center mb-4">Document Library</h1>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($documents as $document)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-pdf text-danger me-2"></i>
                        {{ $document->name }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="pdf-preview mb-3">
                        <embed src="{{ asset('public/uploads/' . $document->pdf_url) }}" type="application/pdf" width="100%" height="300px" class="rounded">
                    </div>
                    <p class="card-text">Brief description of the document goes here.</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-outline-primary" onclick="window.open('{{ asset('public/uploads/' . $document->pdf_url) }}', '_blank')">
                            <i class="fas fa-eye me-1"></i> View
                        </button>
                        <a href="{{ asset('public/uploads/' . $document->pdf_url) }}" download class="btn btn-primary">
                            <i class="fas fa-download me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
