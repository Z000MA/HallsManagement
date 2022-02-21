<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Halls system - Print Reservation</title>
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
                <section id="login" class="auth-height container">
                    <div class="card">
                        <div class="card-content p-3">
                            <div id="invoice-template" class="card-body pb-0">
                            <!-- Invoice Company Details starts -->
                                <div id="invoice-company-details" class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="media">
                                            <img src="../../../app-assets/img/logos/logo-color-big.png" alt="company logo" width="80" height="80">
                                            <div class="media-body ml-4">
                                                <ul class="m-0 list-unstyled">
                                                    <li class="text-bold-800">Dash Creative Studio</li>
                                                    <li>4025 Oak Avenue, Melbourne,</li>
                                                    <li>Florida 32940, USA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 text-right">
                                        <h2 class="primary text-uppercase">Reservation Invoice</h2>
                                        <p class="pb-3"># Reservation ID: {{$reservation->id}}</p>
                                        <ul class="px-0 list-unstyled">
                                            <li>Balance Due</li>
                                            <li class="font-medium-2 text-bold-700">{{$reservation->total}} SDG</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Invoice Company Details ends -->
                                <!-- Invoice Customer Details starts -->
                                <div id="invoice-customer-details" class="row">
                                    <div class="col-12 text-left">
                                        <p class="text-muted mb-1">Bill To</p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <ul class="m-0 list-unstyled">
                                            <li class="text-bold-800">Mr. {{$reservation->customer->name}}</li>
                                            <li>{{$reservation->customer->email}}</li>
                                            <li>{{$reservation->customer->phone}}</li>
                                            <li>Khartoum - Sudan</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-12 text-right">
                                        <p><span class="text-muted">Reservation Date :</span> {{date('d/m/Y', strtotime($reservation->date))}}</p>
                                        <p><span class="text-muted">Terms :</span> Due on Receipt</p>
                                        <p><span class="text-muted">Invoice Date :</span> {{date('d/m/Y', strtotime($reservation->created_at))}}</p>
                                    </div>
                                </div>
                                <!-- Invoice Customer Details ends -->
                                <!-- Invoice Items Details starts -->
                                <div id="invoice-items-details">
                                    <div class="row">
                                        <div class="table-responsive col-12">
                                            <table class="table mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item &amp; Description</th>
                                                        <th class="text-right">price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($reservation->services as $service)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <p>{{$service->service->name}}</p>
                                                            <p class="text-muted">{{$service->service->description}}</p>
                                                        </td>
                                                        <td class="text-right">{{$service->price}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mt-md-0">
                                        <div class="col-md-6 col-12 text-left">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="text-bold-700 mb-2 ml-4">Total due</p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Sub Total</td>
                                                                    <td class="text-right">{{$reservation->sub_total}} SDG</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>discount</td>
                                                                    <td class="text-right">{{$reservation->discount}} SDG</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-800">Total</td>
                                                                    <td class="text-bold-800 text-right"> {{$reservation->sub_total - $reservation->discount}} SDG</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Invoice Items Details ends -->
                                        <!-- Invoice Footer starts -->
                                        <div id="invoice-footer">
                                            <div class="row mt-2 mt-sm-0">
                                                <div class="col-md-6 col-12 d-flex align-items-center">
                                                    <div class="terms-conditions mb-2">
                                                        <h6>Terms &amp; Condition</h6>
                                                        <p>You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="signature text-center">
                                                        <p>Authorized person</p>
                                                        <img src="../../../app-assets/img/pages/signature-scan.png" alt="signature" width="250">
                                                        <h6 class="mt-4">Amanda Orton</h6>
                                                        <p class="text-muted">Managing Director</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center text-sm-right">
                                                    <button type="button" class="btn btn-primary btn-print mt-2 mt-md-1"><i class="ft-printer mr-1"></i>Print Invoice</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Invoice Footer ends -->
                                    </div>
                                </div>
                            </div>
                </section>
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
        $(".btn-print").click(function () { //invoice-template
                window.print();
        });
    });
</script>
<script src="../../../assets/js/scripts.js"></script>
<!-- END: Custom CSS-->
</body>
</html>
