<div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" data-scroll-to-active="true">
            <!-- main menu header-->
            <!-- Sidebar Header starts-->
            <div class="sidebar-header">
                <div class="logo clearfix"><a class="logo-text float-left" href="index.html">
                        <div class="logo-img"><img src="../../../app-assets/img/logo.png" alt="Apex Logo" /></div><span class="text">{{config('app.name', 'Halls')}}</span>
                    </a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
            </div>
            <!-- Sidebar Header Ends-->
            <!-- / main menu header-->
            <!-- main menu content-->
            <div class="sidebar-content main-menu-content">
                <div class="nav-container">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="nav-item"><a href="{{route('home')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">@lang('dashboard.home')</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('halls.index')}}"><i class="ft-package"></i><span class="menu-title" data-i18n="halls">@lang('dashboard.hallsMng')</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('customers.index')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="customers">@lang('dashboard.customers')</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('reservations.index')}}"><i class="ft-calendar"></i><span class="menu-title" data-i18n="reservations">@lang('dashboard.reservations')</span></a>
                        </li>
                        <li class=" nav-item"><a href="app-calendar.html"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="orders">@lang('dashboard.orders')</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('services.index')}}"><i class="ft-menu"></i><span class="menu-title" data-i18n="services">@lang('dashboard.services')</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('payments.index')}}"><i class="ft-dollar-sign"></i><span class="menu-title" data-i18n="payments">@lang('dashboard.payments')</span></a>
                        </li>
                        <li class=" nav-item"><a href="app-calendar.html"><i class="ft-trending-up"></i><span class="menu-title" data-i18n="reports">@lang('dashboard.reports')</span></a>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-shield"></i><span class="menu-title" data-i18n="Components">@lang('dashboard.adminstration')</span></a>
                            <ul class="menu-content">
                                <li><a href="{{route('users.index')}}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">@lang('dashboard.usersMng')</span></a>
                                </li>
                                <li><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">@lang('dashboard.permissions')</span></a>
                                </li>
                                <li><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">@lang('dashboard.roles')</span></a>
                                </li>
                                <li><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">@lang('dashboard.settings')</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-documentation" target="_blank"><i class="ft-book"></i><span class="menu-title" data-i18n="Documentation">@lang('dashboard.documentation')</span></a>
                        </li>
                        <li class=" nav-item"><a href="https://pixinvent.ticksy.com/" target="_blank"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="Support">@lang('dashboard.support')</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- main menu content-->
            <div class="sidebar-background"></div>
            <!-- main menu footer-->
            <!-- include includes/menu-footer-->
            <!-- main menu footer-->
            <!-- / main menu-->
        </div>