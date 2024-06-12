<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ url('/') }}">
                <img src="{{ asset('backendAssets') }}/images/brand/logo_white.png" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('backendAssets') }}/images/brand/logo.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">Dashboard</span></a>
                </li>
                <li>
                    <a class="side-menu__item has-link" href="{{ url('/') }}" target="_blank"><i
                            class="side-menu__icon fe fe-zap"></i><span class="side-menu__label">Landing
                            Page</span><span
                            class="badge bg-green br-5 side-badge blink-text pb-1">Home Page</span></a>
                </li>
                <li class="sub-category">
                    <h3>Admin</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-users"></i><span
                            class="side-menu__label">Authentication</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side21">
                                        <ul class="sidemenu-list">
                                            @if (Auth::user()->role == "2")
                                            <li><a href="{{ route('manage_admin') }}" class="slide-item"> Admin Manage</a></li>
                                            <li><a href="{{ route('admin.profile_admin') }}" class="slide-item"> Manage Profile</a></li>
                                            @else
                                            <li><a href="{{ route('admin.profile_admin') }}" class="slide-item"> Manage Profile</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->role == "2")
                <li class="sub-category">
                    <h3>Data Manage</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-user"></i>
                        <span class="side-menu__label">Student Info</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side21">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"></li>
                                            <li><a href="{{ route('manage_student_info') }}" class="slide-item">Manage Info</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                @endif
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
