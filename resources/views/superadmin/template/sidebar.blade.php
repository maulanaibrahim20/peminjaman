<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-2.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="/assets/images/gaweayu1.png" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    @if (Auth::user()->role_id == 1)
                        <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/superadmin/dashboard') }}">
                        @elseif(Auth::user()->role_id == 2)
                            <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                                data-bs-toggle="slide" href="{{ url('/admin/dashboard') }}">
                            @elseif(Auth::user()->role_id == 3)
                                <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ url('/') }}">
                    @endif
                    <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>


                @can('superadmin')
                    <li class="sub-category">
                        <h3>Auth</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ in_array(Request::segment(2), ['data_client', 'data_owner']) ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fe fe-layers"></i>
                            <span class="side-menu__label">Buat Akun</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ in_array(Request::segment(3), ['admin']) ? 'display: block;' : 'display:none;' }}">
                            <li class="side-menu-label1">
                                <a href="javascript:void(0)">Buat Akun</a>
                            </li>
                            <li>
                                <a href="{{ url('/superadmin/create/admin') }}"
                                    class="slide-item {{ Request::segment(3) == 'admin' ? 'active' : '' }}"> Akun
                                    Admin</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('admin')
                    <li class="sub-category">
                        <h3>Katalog Makeup</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'katalog_makeup' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/owner/katalog_makeup') }}">
                            <i class="side-menu__icon fa fa-paint-brush"></i>
                            <span class="side-menu__label">Katalog Makeup</span>
                        </a>
                    </li>
                @endcan

                @can('mahasiswa')
                    <li class="sub-category">
                        <h3>Booking </h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(2) == 'booking' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/client/booking') }}">
                            <i class="side-menu__icon fa fa-book"></i>
                            <span class="side-menu__label">Booking</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>