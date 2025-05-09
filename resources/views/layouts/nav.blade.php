@php
    $menus = DB::table('menus')->get();
    $menu_arr = [];
@endphp

@foreach ($menus as $row)
    @php
        $menu_arr[$row->menu_name] = $row->menu_status;
        $why_choose_items = DB::table('why_choose_items')->get();
    @endphp
    
@endforeach

<!-- Start Navbar Area -->
<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="" class="logo">
            <img src="{{ asset('public/uploads/' . (isset($g_setting) ? $g_setting->logo : '' )) }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('public/uploads/' . (isset($g_setting) ? $g_setting->logo : '' )) }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">


                        @if (($menu_arr['Home'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
                            </li>
                        @endif

                        @if (($menu_arr['About'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.about') }}" class="nav-link ">About</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle">Customers</a>
                            <ul class="dropdown-menu">
                                @foreach ($why_choose_items as $row)
                                    <li class="nav-item">
                                        <a href="{{ url('why-choose/' . $row->slug) }}"
                                            class="nav-link">{{ $row->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        {{-- @dd($menu_arr['Services']) --}}
                        @if (($menu_arr['Services'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.services') }}" class="nav-link ">Services</a>
                            </li>
                        @endif

                        @if (($menu_arr['Shop'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.shop') }}" class="nav-link ">Shop</a>
                            </li>
                        @endif

                        @if (($menu_arr['Blog'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.blogs') }}" class="nav-link ">Blog</a>
                            </li>
                        @endif


                        @php
                            $dynamic_pages = DB::table('dynamic_pages')->get();
                           
                        @endphp

                        {{-- @dd(($menu_arr['Career']] ?? '') --}}
                        @if (isset($menu_arr) && 
                           ( $menu_arr['Career'] ?? '') == 'Hide' &&
                               ( $menu_arr['Project'] ?? '') == 'Hide' &&
                                ($menu_arr['Photo Gallery'] ?? '') == 'Hide' &&
                                ($menu_arr['Video Gallery'] ?? '') == 'Hide' &&
                               ( $menu_arr['FAQ'] ?? '') == 'Hide' &&
                                ($menu_arr['Team Members'] ?? '') == 'Hide' &&
                                !$dynamic_pages)
                        @else
                           
                            @foreach ($dynamic_pages as $row)
                              @if(!in_array($row->dynamic_page_slug,['api-terms-of-use','children-online-privacy-policy','online-tracking-and-advertisement','trekker-volunteer','donate']))
                                <li class="nav-item">
                                    <a href="{{ url('page/' . $row->dynamic_page_slug) }}"
                                        class="nav-link">{{ $row->dynamic_page_name }}</a>
                                </li>
                                @endif
                            @endforeach

                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle">Donate</a>
                                <ul class="dropdown-menu">
                                    @foreach ($dynamic_pages as $row)
                                    @if(in_array($row->dynamic_page_slug,[
                                        // 'trekker-volunteer',
                                        'donate']))
                                      <li class="nav-item">
                                          <a href="{{ url('page/' . $row->dynamic_page_slug) }}"
                                              class="nav-link">{{ $row->dynamic_page_name }}</a>
                                      </li>
                                      @endif
                                  @endforeach
                                </ul>
                            </li>
                         
                            {{-- <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle">Pages</a>
                            <ul class="dropdown-menu">

                                @if ($menu_arr['Career'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.career') }}" class="nav-link">Career</a>
                                </li>
                                @endif

                                @if ($menu_arr['Project'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.projects') }}" class="nav-link">Projects</a>
                                </li>
                                @endif

                                @if ($menu_arr['Photo Gallery'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.photo_gallery') }}" class="nav-link">Photo Gallery</a>
                                </li>
                                @endif

                                @if ($menu_arr['Video Gallery'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.video_gallery') }}" class="nav-link">Video Gallery</a>
                                </li>
                                @endif

                                @if ($menu_arr['FAQ'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.faq') }}" class="nav-link">FAQ</a>
                                </li>
                                @endif

                                @if ($menu_arr['Team Members'] == 'Show')
                                <li class="nav-item">
                                    <a href="{{ route('front.team_members') }}" class="nav-link">Team Members</a>
                                </li>
                                @endif


                                @foreach ($dynamic_pages as $row)
                                    <li class="nav-item">
                                        <a href="{{ url('page/'.$row->dynamic_page_slug) }}" class="nav-link">{{ $row->dynamic_page_name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li> --}}
                        @endif

                        @if (( $menu_arr['Career'] ?? '') == 'Show')
                        <li class="nav-item">
                            <a href="{{ route('front.career') }}" class="nav-link">Career</a>
                        </li>
                    @endif
                        @if (( $menu_arr['Contact'] ?? '') == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.contact') }}" class="nav-link ">Contact</a>
                            </li>
                        @endif
                       <!-- <li class="nav-item col-md-2" style="width:10px;">
                            <div style="width:10px;" id="google_translate11"></div>
                        </li> -->
                        <!-- @if (( $menu_arr['Career'] ?? '') == 'Show')
                        <li class="nav-item">
                            <a href="{{ route('front.document') }}" class="nav-link">Documents</a>
                        </li>
                    @endif -->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
