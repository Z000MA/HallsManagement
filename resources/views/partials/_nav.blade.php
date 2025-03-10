<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                            <input class="input" type="text" placeholder="Explore Apex..." tabindex="0" data-search="template-search">
                            <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="i18n-dropdown dropdown nav-item mr-2"><a class="nav-link d-flex align-items-center dropdown-toggle dropdown-language" id="dropdown-flag" href="javascript:;" data-toggle="dropdown"><img class="langimg selected-flag" src="../../../app-assets/img/flags/us.png" alt="flag"><span class="selected-language d-md-flex d-none">{{LaravelLocalization::getCurrentLocaleName()}}</span></a>
                            <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('en', null, [], true)}}" data-language="en">
                                    <img class="langimg mr-2" src="../../../app-assets/img/flags/us.png" alt="flag">
                                    <span class="font-small-3">English</span>
                                </a>
                                <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('ar', null, [], true)}}" data-language="ar">
                                    <img class="langimg mr-2" src="../../../app-assets/img/flags/es.png" alt="flag">
                                    <span class="font-small-3">Arabic</span>
                                </a>
                            </div>
                        </li>
                        @guest
                            @if(route::has('login'))
                        <li class="dropdown nav-item mr-1 d-none d-md-block">
                            <a href="{{route('login')}}" class="nav-link d-flex align-items-center">
                                <i class="ft-log-in mr-1"></i>
                                login
                            </a>
                        </li>
                            @endif
                        @else
                        <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2">
                                    <span class="text-right">{{auth()->user()->name}}</span>
                                    <span class="text-right text-muted font-small-3">Available</span>
                                </div>
                                <img class="avatar" src="{{asset('app-assets/img/portrait/small/avatar-s-1.png')}}" alt="avatar" height="35" width="35">
                            </a>
                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="app-chat.html">
                                    <div class="d-flex align-items-center"><i class="ft-message-square mr-2"></i><span>Chat</span></div>
                                </a><a class="dropdown-item" href="page-user-profile.html">
                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Edit Profile</span></div>
                                </a><a class="dropdown-item" href="app-email.html">
                                    <div class="d-flex align-items-center"><i class="ft-mail mr-2"></i><span>My Inbox</span></div>
                                </a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('logout')}}">
                                    <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div>
                                </a>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>