@php
$general_setting = DB::table('general_settings')->where('id', 1)->first();
@endphp
@php
$admin = App\Models\Admin\Admin::where('id', session('id'))->first();
$url = Request::path();
$conName = explode('/', $url);
if (!isset($conName[3])) {
$conName[3] = '';
}
if (!isset($conName[2])) {
$conName[2] = '';
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    @include('admin.includes.styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('public/files/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/responisve.css') }}">
    <link rel="stylesheet" href="{{ asset('public/files/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/files/css/multi-step-css.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @include('admin.includes.scripts')

</head>

<body id="page-top">

{{-- model for the consumer  --}}


@if(session('role_id') == config('constants.admin_types.consumer') || session('role_id') == config('constants.admin_types.financial_institution') || session('role_id') == config('constants.admin_types.merchant')) 
@php
    $eula = \App\Models\Admin\Admin::where('id', session('id'))
            ->where('role_id', session('role_id'))
            ->where('is_eula_checked', false)
            ->first();
            
    $general_setting = DB::table('general_settings')->where('id', 1)->first();
    $pdf_file = session('role_id') == config('constants.admin_types.consumer') ? $general_setting->eula_for_consumer : ($general_setting->eula_for_financial_institution ?? $general_setting->eula_for_merchant);
@endphp

@if($eula)
<div class="modal fade" id="eulaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eulaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eulaModalLabel">End User License Agreement</h5>
            </div>
            <div class="modal-body">
                <div id="pdf-container" style="width: 100%; height: 500px; overflow: auto;">
                    <object id="pdf-viewer" data="{{ asset('public/uploads/'.$pdf_file) }}" type="application/pdf" width="100%" height="500px">
                        <p>Unable to display PDF file. <a href="{{ asset('public/uploads/'.$pdf_file) }}" target="_blank">Click here to download the PDF!</a></p>
                    </object>
                </div>
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i> Please read the entire document carefully before agreeing to the terms.
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.eula.agree') }}" method="POST">
                    @csrf
                    <input type="hidden" name="eula_id" value="{{ $eula->id }}">
                    <button type="submit" id="agree-eula-button" class="btn btn-primary" disabled>I Agree</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var eulaModal = new bootstrap.Modal(document.getElementById('eulaModal'));
    eulaModal.show();

    const pdfContainer = document.getElementById('pdf-container');
    const agreeButton = document.getElementById('agree-eula-button');
    const pdfViewer = document.getElementById('pdf-viewer');

    // Function to check if user has scrolled to bottom
    function isScrolledToBottom(element) {
        // Adding a small buffer (1px) to account for floating point calculations
        return Math.abs(element.scrollHeight - element.scrollTop - element.clientHeight) < 1;
    }

    // Check scroll position
    function checkScroll() {
        if (isScrolledToBottom(pdfContainer)) {
            agreeButton.disabled = false;
        }
    }

    // Add scroll event listener
    pdfContainer.addEventListener('scroll', checkScroll);

    // Handle case where content is shorter than container
    pdfViewer.addEventListener('load', function() {
        setTimeout(() => {
            if (pdfContainer.scrollHeight <= pdfContainer.clientHeight) {
                agreeButton.disabled = false;
            }
        }, 1000); // Small delay to ensure PDF is fully loaded
    });
});
</script>
@endif
@endif

    <!-- Page Wrapper -->

    <div class="dashboard">
        <!-- Main Content -->
        <div class="left">
            <div class="dashboard-logo d-flex justify-content-between align-items-center">
                <a href=""><img src="{{ asset('public/files/img/logo.svg') }}" alt="logo" /></a>
                <i class="ri-close-large-line d-none" id="cross-icon"></i>
            </div>
            <div class="dashboard-menu mt-4">
                <ul>
                    @if (!empty($admin->role->role_name))
                    <li>
                        <a href="{{ route('admin.dashboard')}}" class="dashboard-active">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/Graph 1.png') }}" alt="graph1" />
                            </div>
                            DashBoard
                        </a>
                    </li>
                    @if ($admin->role->role_name == 'Consumer')

                    <li>
                        <a href="{{ route('admin.consumer.this_is_me') }}"
                            class="@if ($conName[2] == 'this-is-me') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Consumer Form
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Merchant')
                    <li>
                        <a href="{{ route('admin.merchant.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Update My Info
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Bank')
                    <li>
                        <a href="{{ route('admin.bank.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Update My Info
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Govt')
                    <li>
                        <a href="{{ route('admin.govt.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Update My Info
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Healthcare')
                    <li>
                        <a href="{{ route('admin.healthcare.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Update My Info
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Education')
                    <li>
                        <a href="{{ route('admin.education.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Update My Info
                        </a>
                    </li>
                    @endif
                    @if ($admin->role->role_name == 'Consumer' && $admin->form_completion == 1 )
                    <li>
                        <a href="{{ route('admin.tracker.update_my_info') }}"
                            class="@if ($conName[2] == 'update-my-info') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-magic"></i>
                            </div>
                            Become A Trekker
                        </a>
                    </li>
                    @endif
                    @php $arr_one = array(); @endphp
                    @if (session('role_id') != config('constants.super_admin_id'))
                    @php
                    $row = [];
                    $access_data = DB::table('role_permissions')
                    ->join('role_pages', 'role_permissions.role_page_id', 'role_pages.id')
                    ->where('role_id', session('role_id'))
                    ->get();
                    @endphp
                    @foreach ($access_data as $row)
                    @php
                    if ($row->access_status == 1):
                    $arr_one[] = $row->page_title;
                    endif;
                    @endphp
                    @endforeach
                    @endif

                    @php if( in_array('General Settings', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.general_setting.logo') }}"
                            class="@if($conName[1] == 'setting' && $conName[2] == 'general') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-tools "></i>
                            </div>
                            General Settings
                        </a>

                    </li>
                    @endif

                    @php if( in_array('Page Settings', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.page_home.edit') }}" class="@if($conName[1] == 'page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-th-large"></i>
                            </div>
                            Page Settings
                        </a>

                    </li>
                    @endif

                    @php if( in_array('Dynamic Pages', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.dynamic_page.index') }}"
                            class="@if($conName[1] == 'dynamic-page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            Dynamic Pages
                        </a>
                    </li>
                    @endif


                    @php if( in_array('Admin User Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.role.index') }}"
                            class="@if($conName[1] == 'role' || $conName[1] == 'admin-user') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            Admin User Section
                        </a>

                    </li>
                    @endif
                        @php if( in_array('Admin User Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp

                            <li>

                                <a href="{{ route('admin.general_setting.eula') }}" 

                                    class="@if($conName[1] == 'setting' && $conName[2] == 'general' && $conName[3] == 'eula') active @endif">

                                    <div class="icon-div">

                                        <i class="fas fa-file-signature"></i>

                                    </div>

                                    EULA Management

                                </a>

                            </li>



                            @endif
                            @php if( in_array('Admin User Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
    
                                <li>
    
                                    <a href="{{ route('admin.documents.index') }}" 
    
                                        class="@if($conName[1] == 'documents') active @endif">
    
                                        <div class="icon-div">
    
                                            <i class="fas fa-file-alt"></i>
    
                                        </div>
    
                                        Document 
                                    </a>
    
                            </li>



                            @endif




                            @php if( in_array('Admin User Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
    
    <li>

        <a href="{{ route('admin.sdk.index') }}" 

            class="@if($conName[1] == 'sdk') active @endif">

            <div class="icon-div">

                <i class="fas fa-file-alt"></i>

            </div>

            Upload Sdk 
        </a>

</li>



@endif




@php if (session('role_id')==config('constants.admin_types.merchant') || session('role_id')==config('constants.admin_types.financial_institution')): @endphp
                                <li>
                                    <a href="{{ route('admin.sdk.view') }}" 
                                        class="@if($conName[1] == 'my-documents') active @endif">
                                        <div class="icon-div">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        Sdk
                                    </a>
                                </li>
                            @endif

                           @php if ($admin->role->role_name != 'Admin'): @endphp
                                <li>
                                    <a href="{{ route('admin.my_documents') }}" 
                                        class="@if($conName[1] == 'my-documents') active @endif">
                                        <div class="icon-div">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        My Documents
                                    </a>
                                </li>
                            @endif







                    @php if( in_array('Dynamic Pages', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.plan.index') }}"
                            class="@if($conName[1] == 'dynamic-page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            Plans
                        </a>

                    </li>
                    @endif
                    {{-- @php if( in_array('Dynamic Pages', $arr_one) || session('role_id')==1 ): @endphp
                    <li>
                        <a href="{{ route('admin.house.index') }}"
                            class="@if($conName[1] == 'dynamic-page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            Housing Rules
                        </a>
                    </li>
                    @endif --}}
                    {{-- @php if( in_array('Dynamic Pages', $arr_one) || session('role_id')==1 ): @endphp
                    <li>
                        <a href="{{ route('admin.gender.index') }}"
                            class="@if($conName[1] == 'dynamic-page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            Gender Rules
                        </a>
                    </li>
                    @endif --}}
                    {{-- @php if( in_array('Dynamic Pages', $arr_one) || session('role_id')==1 ): @endphp
                    <li>
                        <a href="{{ route('admin.income.index') }}"
                            class="@if($conName[1] == 'dynamic-page') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            Income Range
                        </a>
                    </li>
                    @endif --}}
                      @php if( in_array('Footer Columns', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.contact.index') }}" class="@if($conName[1] == 'contact') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-envelope"></i>
                            </div>
                            Contact Forms
                        </a>
                    </li>
                    @endif 
                    @php if( in_array('Footer Columns', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.websitedocuments.index') }}" class="@if($conName[1] == 'websitedocuments') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-envelope"></i>
                            </div>
                             Website Docx
                        </a>
                    </li>
                    @endif 
                     @php if( in_array('Footer Columns', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.footer.index') }}" class="@if($conName[1] == 'footer') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-columns"></i>
                            </div>
                            Footer Columns
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Sliders', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp

                    <li>
                        <a href="{{ route('admin.slider.index') }}" class="@if($conName[1] == 'slider') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            Sliders
                        </a>

                    </li>
                    @endif

                    @php if( in_array('Blog Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>

                        <a href="{{ route('admin.category.index') }}"
                            class="@if($conName[1] == 'category' || $conName[1] == 'blog' || $conName[1] == 'comment') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            Blog Section
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Menu Manage', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.menu.index') }}" class="@if($conName[1] == 'menu') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-cog"></i>
                            </div>
                            Menu Manage
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Project', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.project.index') }}"
                            class="@if($conName[1] == 'project') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            Project
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Career Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.job.index') }}"
                            class="@if($conName[1] == 'job' || $conName[1] == 'job-application') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            Career Section
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Photo Gallery', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.photo.index') }}"
                            class="@if($conName[1] == 'photo-gallery') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-photo-video"></i>
                            </div>
                            Photo Gallery
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Video Gallery', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.video.index') }}"
                            class="@if($conName[1] == 'video-gallery') active @endif">
                            <div class="icon-div">
                                <i class="fab fa-youtube"></i>
                            </div>
                            Video Gallery
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Product Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.product.index') }}"
                            class="@if($conName[1] == 'product' || $conName[1] == 'shipping' || $conName[1] == 'coupon') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            Product Section
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Order Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.order.index') }}" class="@if($conName[1] == 'order') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            Order Section
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Service', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.service.index') }}"
                            class="@if($conName[1] == 'service') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-handshake"></i>
                            </div>
                            Service
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Why Choose Us', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.why_choose.index') }}"
                            class="@if($conName[1] == 'why-choose') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            Why Choose Us
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Testimonial', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.testimonial.index') }}"
                            class="@if($conName[1] == 'testimonial') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            Testimonial
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Team Member', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.team_member.index') }}"
                            class="@if($conName[1] == 'team-member') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-users"></i>
                            </div>
                            Team Member
                        </a>
                    </li>
                    @endif
                    @php if( in_array('FAQ', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.faq.index') }}" class="@if($conName[1] == 'faq') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-comments"></i>
                            </div>
                            FAQ
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Email Template', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.email_template.index') }}"
                            class="@if($conName[1] == 'email-template') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-inbox"></i>
                            </div>
                            Email Template
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Subscriber Section', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.subscriber.index') }}"
                            class="@if($conName[1] == 'subscriber') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-envelope"></i>
                            </div>
                            Subscriber Section
                        </a>
                    </li>
                    @endif
                    @php if( in_array('Social Media', $arr_one) || session('role_id')==config('constants.super_admin_id') ): @endphp
                    <li>
                        <a href="{{ route('admin.social_media.index') }}"
                            class="@if($conName[1] == 'subscriber') active @endif">
                            <div class="icon-div">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            Social Media
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('admin.knowledge')}}" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/Knoweledge.png') }}" alt="graph1" />
                            </div>
                            Knowledge Hub
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.socialjustice')}}" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/social.png') }}" alt="graph1" />
                            </div>
                            Social Justice Score
                        </a>
                    </li>
                    <li>
                        <a href="" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/transaction.png') }}" alt="graph1" />
                            </div>
                            Transactions To Date
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.settings')}}" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/setting.png') }}" alt="graph1" />
                            </div>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/profile.png') }}" alt="graph1" />
                            </div>
                            Profile Update
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout') }}" class="">
                            <div class="icon-div">
                                <img src="{{ asset('public/files/img/signout.png') }}" alt="graph1" />
                            </div>
                            Sign Out
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
            <div class="get-pro">
                <div class="content">
                    <div class="getpro-logo">
                        <img src="{{ asset('public/files/img/Logo.png') }}" alt="logo" />
                    </div>
                    <h3>Ginicoe Portal</h3>
                    <p>Get access to all features</p>
                    <a href="" class="get-pro-btn">Get Pro</a>
                </div>
            </div>
        </div>
        <div class="right">
            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid px-4">
                    <i class="ri-bar-chart-horizontal-line d-none" id="bars"></i>
                    <a class="navbar-brand" href="#"><img src="{{ asset('public/files/img/logo.svg') }}" alt="main-logo"
                            class="d-none" /></a>

                    <label class="hamburger d-block d-lg-none" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <input type="checkbox" />
                        <svg viewBox="0 0 32 32">
                            <path class="line line-top-bottom"
                                d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                            </path>
                            <path class="line" d="M7 16 27 16"></path>
                        </svg>
                    </label>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Cards</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Trekker</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">OutBoundAssistance</a>
                            </li>
                            <li class="nav-item ms-0 ms-lg-4">
                                <a class="nav-link navbar-btn custom-btn" href="{{ url('/') }}">Home</a>
                            </li>
                        </ul>

                        <a href="#"
                            class="nav-item dropdown no-arrow profile-info justify-content-start justify-content-lg-center my-3 my-lg-0"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <div class="profile">
                                <img src="{{ asset('public/uploads/' . session('photo')) }}" alt="" />
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0">{{ session('name') }}</h5>
                                <p class="mb-0">Managing Director</p>
                            </div>
                        </a>
                        <div id="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            @if (session('id') == 1)
                            <a class="dropdown-item" href="{{ route('admin.profile_change') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Change Profile
                            </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('admin.password_change') }}">
                                <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i> Change Password
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.photo_change') }}">
                                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i> Change Photo
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="dashboard-main">
                <div class="dashboard-header  d-flex flex-row justify-content-between align-items-center">
                    <div class="ms-4">
                        <h3>
                            @php
                            // Determine the current route and set the title accordingly
                            $currentRoute = Request::path();
                            switch ($currentRoute) {
                            case 'admin/settings':
                            echo 'Settings';
                            break;
                            case 'admin.consumer.this-is-me':
                            echo 'Consumer Profile';
                            break;
                            case 'admin.merchant.update-my-info':
                            echo 'Update My Info - Merchant';
                            break;
                            case 'admin.bank.update-my-info':
                            echo 'Update My Info - Bank';
                            break;
                            case 'admin.govt.update-my-info':
                            echo 'Update My Info - Govt';
                            break;
                            case 'admin.healthcare.update-my-info':
                            echo 'Update My Info - Healthcare';
                            break;
                            case 'admin.education.update-my-info':
                            echo 'Update My Info - Education';
                            break;
                            // Add more cases as needed
                            default:
                            echo 'Dashboard';
                            }
                            @endphp
                        </h3>
                        <p>Welcome to {{ session('name') }} Dashboard!</p>
                    </div>
                    <div class="guid-btn">
                        {{$admin->guid}}
                    </div>
                </div>
                <div class="dashboard-stepper-main mt-3">
                    <div class="stepper-main">
                        @if ($conName[2] == 'this-is-me')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>User Profile Information</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_one') class="active" @endif>My
                                        Pedigree Info</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_two') class="active" @endif >Find
                                        Me Here</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_three') class="active" @endif
                                        >
                                        Gender Identity</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_four') class="active" @endif
                                        >
                                        Ethnicity Information</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_five') class="active" @endif
                                        >My
                                        Neighborhood is</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_six') class="active" @endif
                                        >
                                        Employment Information</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_seven') class="active" @endif>
                                        Protect Charge Cards</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_eight') class="active" @endif>
                                        Face Recognition</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_sixteen') class="active" @endif
                                        onclick="switchFieldset('fieldset_sixteen',this)" id="travel_info_bar">
                                        Special Licenses</li>
                                    <li @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->
                                        fieldset_id == 'fieldset_seventeen') class="active" @endif>
                                        Opt-In Consent</li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'setting' && $conName[2] == 'general')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>General Setting</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->

                                <ul id="progressbar2">
                                    <li><a class="collapse-item @if($conName[3] == 'video') active @endif"
                                            href="{{ route('admin.general_setting.video') }}">Video</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'favicon') active @endif"
                                            href="{{ route('admin.general_setting.favicon') }}">Favicon</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'loginbg') active @endif"
                                            href="{{ route('admin.general_setting.loginbg') }}">SignIn Background</a>
                                    </li>
                                    <li><a class="collapse-item @if($conName[3] == 'topbar') active @endif"
                                            href="{{ route('admin.general_setting.topbar') }}">Top Bar</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'banner') active @endif"
                                            href="{{ route('admin.general_setting.banner') }}">Banner</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'footer') active @endif"
                                            href="{{ route('admin.general_setting.footer') }}">Footer</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'sidebar') active @endif"
                                            href="{{ route('admin.general_setting.sidebar') }}">Sidebar</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'color') active @endif"
                                            href="{{ route('admin.general_setting.color') }}">Color</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'preloader') active @endif"
                                            href="{{ route('admin.general_setting.preloader') }}">Preloader</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'stickyheader') active @endif"
                                            href="{{ route('admin.general_setting.stickyheader') }}">Sticky Header</a>
                                    </li>
                                    <li><a class="collapse-item @if($conName[3] == 'googleanalytic') active @endif"
                                            href="{{ route('admin.general_setting.googleanalytic') }}">Google
                                            Analytic</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'googlerecaptcha') active @endif"
                                            href="{{ route('admin.general_setting.googlerecaptcha') }}">Google
                                            Recaptcha</a></li>
                                    <li><a class="collapse-item @if($conName[3] == 'tawklivechat') active @endif"
                                            href="{{ route('admin.general_setting.tawklivechat') }}">Tawk Live Chat</a>
                                    </li>
                                    <li><a class="collapse-item @if($conName[3] == 'cookieconsent') active @endif"
                                            href="{{ route('admin.general_setting.cookieconsent') }}">Cookie Consent</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'page')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Page Setting</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->

                                <ul id="progressbar2">
                                    <li><a class="collapse-item @if($conName[2] == 'home') active @endif"
                                            href="{{ route('admin.page_home.edit') }}">Home</a>
                                    <li><a class="collapse-item @if($conName[2] == 'about') active @endif"
                                            href="{{ route('admin.page_about.edit') }}">About</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'service') active @endif"
                                            href="{{ route('admin.page_service.edit') }}">Service</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'shop') active @endif"
                                            href="{{ route('admin.page_shop.edit') }}">Shop</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'blog') active @endif"
                                            href="{{ route('admin.page_blog.edit') }}">Blog</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'project') active @endif"
                                            href="{{ route('admin.page_project.edit') }}">Project</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'faq') active @endif"
                                            href="{{ route('admin.page_faq.edit') }}">FAQ</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'team') active @endif"
                                            href="{{ route('admin.page_team.edit') }}">Team Member</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'photo-gallery') active @endif"
                                            href="{{ route('admin.page_photo_gallery.edit') }}">Photo Gallery</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'video-gallery') active @endif"
                                            href="{{ route('admin.page_video_gallery.edit') }}">Video Gallery</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'contact') active @endif"
                                            href="{{ route('admin.page_contact.edit') }}">Contact</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'career') active @endif"
                                            href="{{ route('admin.page_career.edit') }}">Career</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'term') active @endif"
                                            href="{{ route('admin.page_term.edit') }}">Term</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'privacy') active @endif"
                                            href="{{ route('admin.page_privacy.edit') }}">Privacy</a></li>
                                    <li><a class="collapse-item @if($conName[2] == 'other') active @endif"
                                            href="{{ route('admin.page_other.edit') }}">Other</a></li>

                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'role' || $conName[1] == 'admin-user')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Admin User Section</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar2">
                                    <li><a class="collapse-item" href="{{ route('admin.role.index') }}">Roles</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.role.user') }}">Users</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'product' || $conName[1] == 'shipping' || $conName[1] == 'coupon')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Product Section</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar2">
                                    <li><a class="collapse-item" href="{{ route('admin.product.index') }}">Product</a>
                                    </li>
                                    <li><a class="collapse-item" href="{{ route('admin.shipping.index') }}">Shipping</a>
                                    </li>
                                    <li><a class="collapse-item" href="{{ route('admin.coupon.index') }}">coupon</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'subscriber')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Subscriber Section</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar2">
                                    <li><a class="collapse-item" href="{{ route('admin.subscriber.index') }}">All
                                            Subscribers</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.subscriber.send_email') }}">Send
                                            Email to Subscribers</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'job' || $conName[1] == 'job-application')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Career Section</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar2">
                                    <li><a class="collapse-item" href="{{ route('admin.job.index') }}">Jobs</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.job.view_application') }}">Job
                                            Applications</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if ($conName[1] == 'category' || $conName[1] == 'blog' || $conName[1] == 'comment')
                        <div class="stepper-left">
                            <div class="stepper-left-header">
                                <h3>Blog Section</h3>
                            </div>
                            <div class="py-4 px-3">
                                <!-- progressbar -->
                                <ul id="progressbar2">
                                    <li><a class="collapse-item"
                                            href="{{ route('admin.category.index') }}">Categories</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.blog.index') }}">Blogs</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.comment.approved') }}">Approved
                                            Comments</a></li>
                                    <li><a class="collapse-item" href="{{ route('admin.comment.pending') }}">Pending
                                            Comments</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="stepper-right p-3" id="main-dashboard">
                            <!-- multistep form -->
                            @yield('admin_content')
                            <div class="modal fade" id="chart_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Make Chart</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="form-group">
                                                    <label for="">Label Values</label>
                                                    <input type="text" id="label_values" name="label_values"
                                                        class="form-control" autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Data Values</label>
                                                    <input type="text" id="data_values" name="data_values"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success btn-sm float-right"
                                                        onclick="updateChart()">Make Chart</button>

                                                </div>

                                                <canvas id="myChart"
                                                    style="display: none;background-color:white"></canvas>


                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="downloadChart()">Download Jpg</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <footer>
                    <div class="container-fluid my-5">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <a href=""><img src="{{ asset('public/uploads/' . $general_setting->logo) }}"
                                            alt="footer-logo" class="footer-logo mb-4" /></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg mb-3 mb-lg-0">
                                    <h3 class="footer-heading1 mb-3">Contact</h3>
                                    <a href="" class="footer-heading2 mb-2">support@ginicoe.com</a>
                                    <a href="" class="footer-heading2 mb-2">Chat</a>
                                </div>
                                <div class="col-12 col-md-6 col-lg mb-3 mb-lg-0">
                                    <h3 class="footer-heading1 mb-3">Company</h3>
                                    <ul>
                                        <li><a href="" class="footer-heading2">About Us</a></li>
                                        <li><a href="" class="footer-heading2">Our Story</a></li>
                                        <li>
                                            <a href="" class="footer-heading2">Careers (we're Hiring)</a>
                                        </li>
                                        <li><a href="" class="footer-heading2">Press</a></li>
                                        <li><a href="" class="footer-heading2">Referrals</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg mb-3 mb-lg-0">
                                    <h3 class="footer-heading1 mb-3">Support</h3>
                                    <ul>
                                        <li><a href="" class="footer-heading2">Reviews</a></li>
                                        <li><a href="" class="footer-heading2">Site map</a></li>
                                        <li>
                                            <a href="" class="footer-heading2">Customer support: (347)
                                                464-9144</a>
                                        </li>
                                        <li>
                                            <a href="" class="footer-heading2">7am - 6pm ET, Monday-Friday</a>
                                        </li>
                                        <li>
                                            <a href="" class="footer-heading2">8am - 5pm ET, Saturday</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-6 col-lg mb-3 mb-lg-0">
                                    <h3 class="footer-heading1 mb-3">legal</h3>
                                    <ul>
                                        <li><a href="" class="footer-heading2">Privacy</a></li>
                                        <li><a href="" class="footer-heading2">Terms</a></li>
                                        <li><a href="" class="footer-heading2">Compliance</a></li>
                                        <li>
                                            <a href="" class="footer-heading2">Outer change Service Fees</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg mb-3 mb-lg-0">
                                    <h3 class="footer-heading1 mb-3">Learn More</h3>
                                    <ul>
                                        <li>
                                            <a href="" class="footer-heading2">How to improve SoJOR</a>
                                        </li>
                                        <li><a href="" class="footer-heading2">Affiliates</a></li>
                                    </ul>
                                    <p>
                                        All Social Justice Score ratings are subject to ID
                                        verfication. Consumers must be at least 18 years old with
                                        a credit or debit card.
                                    </p>
                                </div>
                            </div>
                            <div class="row social-row">
                                <div
                                    class="col-md-7 mb-4 mb-lg-0 d-flex justify-content-between justify-content-md-start align-items-md-start flex-row flex-md-column">
                                    <h3 class="footer-heading1 mb-2">Follow Us On</h3>
                                    <div class="social-icons">
                                        <a href=""><img src="{{ asset('public/files/img/fb.png') }}"
                                                alt="facebook" /></a>
                                        {{-- <a href=""><img src="{{ asset('public/files/img/x.png') }}"
                                                alt="facebook" /></a> --}}
                                        <a href=""><img src="{{ asset('public/files/img/instagram.png') }}"
                                                alt="facebook" /></a>
                                    </div>
                                </div>
                                <div
                                    class="col-md-5 d-flex justify-content-between justify-content-md-start align-items-md-start flex-row flex-md-column">
                                    <h3 class="footer-heading1 mb-2">Download on the</h3>
                                    <div class="d-flex">
                                        <a href=""><img src="{{ asset('public/files/img/app-store.png') }}"
                                                alt="app-store" /></a>
                                        <a href=""><img src="{{ asset('public/files/img/play-store.png') }}"
                                                alt="play-store" /></a>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                                <a href="" class="footer-heading2">2024 © Ginicoe Corporation</a>
                                <a href="" class="footer-heading2">Terms & Conditions</a>
                                <a href="" class="footer-heading2">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="{{ asset('public/files/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    <script src="{{ asset('public/files/js/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/files/js/multi-step-script.js') }}"></script>
    <script src="{{ asset('public/files/js/script.js') }}"></script>
    @include('admin.includes.scripts-footer')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select the progress bar list
        const progressBar = document.getElementById('progressbar');
        // Get all list items within the progress bar
            const listItems = progressBar.getElementsByTagName('li');

            // Iterate over each list item
            for (let i = listItems.length - 1; i >= 0; i--) {
                const listItem = listItems[i];
                // Check if the current list item has the active class
                if (listItem.classList.contains('active')) {
                    // If it does, mark all the preceding list items as active
                    for (let j = 0; j <= i; j++) {
                        listItems[j].classList.add('active');
                    }
                    // Break the loop as we only need to do this once
                    break;
            }
        }
    });
    </script>
    <script>
    // initial chart data and options
    const data = {
        labels: [],
        datasets: [{
            label: 'chart',
            data: [],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };



    // create chart instance
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: data,
    });

    // update chart data and options
    function updateChart() {
        $('#myChart').show();
        let label_values = document.getElementById('label_values').value;
        label_values = label_values.split(',');
        chart.data.labels = label_values;

        let data_values = document.getElementById('data_values').value;
        data_values = data_values.split(',');
        chart.data.datasets[0].data = data_values;
        if (label_values.length == data_values.length)
            chart.update();
        else
            toastr.error('Lenght of Labels and values are not same')

    }

    function downloadChart() {
        const hiddenCanvas = document.createElement('canvas');
        hiddenCanvas.width = chart.width;
        hiddenCanvas.height = chart.height;
        const hiddenContext = hiddenCanvas.getContext('2d');
        hiddenContext.drawImage(chart.canvas, 0, 0, chart.width, chart.height);
        const url = hiddenCanvas.toDataURL('image/jpeg', 0.8);
        const link = document.createElement('a');
        link.download = 'chart.jpg';
        link.href = url;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    </script>

</body>

</html>