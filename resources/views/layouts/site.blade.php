<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>{{config('app.name', 'Halls Manager')}}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/img/ico/favicon.ico')}}">
        <link rel="shortcut icon" type="image/png" href="{{asset('app-assets/img/ico/favicon-32.png')}}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/feather/style.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/perfect-scrollbar.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/prism.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/switchery.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/chartist.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/swiper.min.css')}}">
        @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/themes/layout-dark.css">
        <link rel="stylesheet" href="../../../app-assets/css-rtl/plugins/switchery.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/custom-rtl.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700&display=swap" rel="stylesheet">
        <style>
            body, h1, h2, h3, h4, h5, h6, p, span, label, a, span {
                font-family: "Tajawal" !important;
            }
        </style>
        <!-- END APEX CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" href="{{asset('app-assets/css/pages/ex-component-swiper.css')}}">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/menu/horizontal-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/pages/dashboard1.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/style.css')}}">
        @else
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/layout-dark.css">
        <link rel="stylesheet" href="../../../app-assets/css/plugins/switchery.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <!-- END APEX CSS-->
        <!-- BEGIN Page Level CSS-->
        
        <link rel="stylesheet" href="{{asset('app-assets/css/pages/ex-component-swiper.css')}}">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/horizontal-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard1.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        @endif
        <link rel="stylesheet" href="{{asset('app-assets/css/pages/ex-component-swiper.css')}}">
        <!-- END APEX CSS-->
        <!-- BEGIN Page Level CSS-->
        
        <!-- END Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <style>
            .cir {
                margin-left:50px;
                border-radius:50%;
                height:150px;
                width:150px;
                background-color:green;
                text-align:center;
                horizontal-align:middle;
                vertical-align:middle;
                display:table-cell;
            }
            .cir span {
                display:inline-block;
                vertical-align:middle;
            }
        </style>
        <!-- END: Custom CSS-->
    </head>
    <body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  navbar-sticky" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
            <div class="container-fluid navbar-wrapper">
                <div class="navbar-header d-flex mb-md-2">
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
                    <div class="navbar-brand-center">
                        <div class="navbar-header">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div class="logo">
                                        <a class="logo-text" href="index.html">
                                            <span class="text">Halls</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </nav>
        <div class="wrapper">
             <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-shadow menu-border navbar-brand-center" role="navigation" data-menu="menu-wrapper">
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content center-layout" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="navigation-main nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="Home.aspx"><i class="ft-home"></i><span>Home</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="NewAdmission.aspx"><i class="ft-edit"></i><span>Order now</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="javascript:;"><i class="ft-info"></i><span>About us</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link d-flex align-items-center" href="javascript:;"><i class="ft-phone"></i><span>Contact us</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
        <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="http://www.dashtechit.com" id="pixinventLink" target="_blank">Dash tech</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
    <!-- Navbar (Header) Ends-->
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/switchery.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/swiper.min.js"></script>
    <script src="{{asset('app-assets/vendors/js/chartist.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/toastr.min.js')}}"></script>
    <script src="../../../app-assets/vendors/js/select2.full.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('app-assets/js/notification-sidebar.js')}}"></script>
    <script src="{{asset('app-assets/js/customizer.js')}}"></script>
    <script src="{{asset('app-assets/js/scroll-top.js')}}"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('app-assets/js/ex-component-swiper.js')}}"></script>
    <script src="{{asset('app-assets/js/dashboard1.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- END: Custom CSS-->
    <script type="text/javascript">
        $(document).ready(function() {
            @foreach($errors as $error)
                toastr.error('{{$error}}', 'Error!!', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 2000});
            @endforeach
            @if(session()->has('success'))
                toastr.success('{{session('success')}}', 'SUCCESS!!', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 2000});
            @endif
            @if(session()->has('error'))
                toastr.error('{{session('error')}}', 'ERROR!!', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 2000});
            @endif
            $('#customers').select2({
                dropdownAutoWitdh: true,
                width: '100%'
            });
            $(".btn-print").click(function () { //invoice-template
                window.print();
            });
        });
    </script>
    </body>
</html>