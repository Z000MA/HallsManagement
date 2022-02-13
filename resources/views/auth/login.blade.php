<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login Page - Apex responsive bootstrap 4 admin template</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="../../../app-assets/img/ico/favicon-32.png">
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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/toastr.css')}}">
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

    <!-- set app font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;400;700&display=swap" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h5, li, a, p, span{
            font-family: 'Tajawal' !important;
        }
    </style>
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/dashboard1.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->
  @else
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/layout-dark.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/css/plugins/switchery.css')}}">
  <!-- END APEX CSS-->
  <!-- google fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <!-- end google fonts -->
  <!-- set font -->
  <style>
        body, li, a, p, span{
            font-family: 'Rubik' !important;
        }
        h1, h2, h3, h4, h5, h5{
            font-family: 'Rubik' !important;
        }
    </style>
  @endif
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/ex-component-toastr.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/pages/authentication.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
<div class="wrapper">
    <div class="main-panel">
    <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
            <!--Login Page Starts-->
                <section id="login" class="auth-height">
                    <div class="row full-height-vh m-0">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body auth-img">
                                        <div class="row m-0">
                                            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                <img src="{{asset('app-assets/img/gallery/login.png')}}" alt="" class="img-fluid" width="300" height="230">
                                            </div>
                                            <div class="col-lg-6 col-12 px-4 py-3">
                                                <h4 class="mb-2 card-title">@Lang('login.header')</h4>
                                                <p>@Lang('login.subTitle')</p>
                                                <form method="POST" action="/login">
                                                    @csrf
                                                    <input type="email" class="form-control mb-3" name="email" required placeholder="@Lang('login.email')">
                                                    <input type="password" name="password" required class="form-control mb-2" placeholder="@lang('login.password')">
                                                    <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                        <div class="remember-me mb-2 mb-sm-0">
                                                            <div class="checkbox auth-checkbox">
                                                                <input type="checkbox" id="remember" name="remember">
                                                                <label for="remember"><span>Remember Me</span></label>
                                                            </div>
                                                        </div>
                                                        <a href="auth-forgot-password.html">@Lang('login.forgot')</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                        <button type="submit" class="btn btn-primary">@Lang('login.button')</button>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6 class="text-primary m-0">Or Login With</h6>
                                                        <div class="login-options">
                                                            <a class="btn btn-sm btn-social-icon btn-facebook mr-1"><span class="fa fa-facebook"></span></a>
                                                            <a class="btn btn-sm btn-social-icon btn-twitter mr-1"><span class="fa fa-twitter"></span></a>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Login Page Ends-->
            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/switchery.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/toastr.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<script src="{{asset('app-assets/js/notification-sidebar.js')}}"></script>
<script src="{{asset('app-assets/js/customizer.js')}}"></script>
<script src="{{asset('app-assets/js/scroll-top.js')}}"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script>
    $(document).ready(function() {
      @foreach($errors as $error)
        toastr.error('{{$error}}', 'authentication failed!', {
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        timeOut: 2000});
      @endforeach
    });
</script>
<script src="../../../assets/js/scripts.js"></script>
<!-- END: Custom CSS-->
</body>
</html>
