@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('public/uploads/'.$g_setting->banner_service_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $why_choose_detail->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.services') }}">Customers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $why_choose_detail->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-section">
                        <div class="featured-photo">
                            {{-- <img src="{{ asset('public/uploads/'.$service_detail->photo) }}"> --}}
                        </div>
                        <div class="text">
                            <h2>{{ $why_choose_detail->name }}</h2>
                            {!!  $why_choose_detail->page_content !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <h3>All Services</h3>
                            <div class="type-2">
                                <ul>
                                    @foreach($service_items as $row)
                                    <li>
                                        <img src="{{ asset('public/uploads/'.$row->photo) }}">
                                        <a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
