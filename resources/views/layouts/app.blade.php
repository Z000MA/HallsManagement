<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale())}}">
<!-- BEGIN : Head-->
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
    
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/select2.min.css">
    <link rel="stylesheet" href="../../../app-assets/css/pages/page-invoice.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/layout-dark.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css-rtl/plugins/switchery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/dashboard1.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/style.css')}}">
    @else
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/layout-dark.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/plugins/switchery.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    
    <link rel="stylesheet" href="{{asset('app-assets/css/pages/ex-component-swiper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard1.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/ex-component-toastr.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

    @include('partials._nav')
    <!-- Navbar (Header) Ends-->
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        @include('partials._dashboard')
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
            <!-- END : End Main Content-->
            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="http://dashtechit.com" id="pixinventLink" target="_blank">Dash tech</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="sidenav-overlay"></div>
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
<!-- END : Body-->

</html>