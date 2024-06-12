<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="One Sky Communications Limited">
    <meta name="author" content="One Sky Communications Limited">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backendAssets') }}/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Student Info for Registration</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('backendAssets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('backendAssets') }}/css/style.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('backendAssets') }}/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('backendAssets') }}/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('backendAssets') }}/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ asset('backendAssets') }}/switcher/demo.css" rel="stylesheet">

    <!-- tostr alert css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    form .error_text {
        color: red;
    }

</style>

<body class="app ltr landing-page horizontal">
    @include('sweetalert::alert')
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('backendAssets') }}/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="{{ route('/') }}">
                            <img src="{{ asset('backendAssets') }}/images/brand/logo_white.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('backendAssets') }}/images/brand/logo.png" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="{{ route('/') }}">
                                        <img alt="" class="logo-2" src="{{ asset('backendAssets') }}/images/brand/logo.png">
                                        <img src="{{ asset('backendAssets') }}/images/brand/logo_white.png" class="logo-3" alt="logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/APP-SIDEBAR-->
                </div>
            </div>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container mb-5">
                        <!-- ROW-10 OPEN -->
                        <div class="bg-image-landing section pb-5">
                            <div class="container">
                                <div class="">
                                    <div class="card card-shadow reveal">
                                        <h4 class="text-center fw-semibold mt-7">OSCL</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-0 px-2">Submit Your Information for <span class="text-primary">Registration</span></h2>
                                        <div class="card-body p-5 pb-6 text-dark">
                                            <div class="statistics-info p-4">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-9">
                                                        <div class="">
                                                            <form method="POST" action="{{ route('student_info') }}" class="form-horizontal reveal revealrotate m-t-20" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <input class="form-control" name="name" type="text" placeholder="Full Name*" required>
                                                                    </div>
                                                                    @if ($errors->has('name'))
                                                                    <strong class="error_text">{{ $errors->first('name') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <input class="form-control" name="polytechnic_name" type="text" placeholder="Polytechnic Name*" required>
                                                                    </div>
                                                                    @if ($errors->has('polytechnic_name'))
                                                                    <strong class="error_text">{{ $errors->first('polytechnic_name') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <input class="form-control" type="text" name="number" placeholder="Whatsapp No.*" required>
                                                                    </div>
                                                                    @if ($errors->has('number'))
                                                                    <strong class="error_text">{{ $errors->first('number') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <input class="form-control" type="text" name="blood_group" placeholder="Blood Group*" required>
                                                                    </div>
                                                                    @if ($errors->has('blood_group'))
                                                                    <strong class="error_text">{{ $errors->first('blood_group') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <input class="form-control" type="email" name="email" placeholder="Email*" required>
                                                                    </div>
                                                                    @if ($errors->has('email'))
                                                                    <strong class="error_text">{{ $errors->first('email') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-xs-12">
                                                                        <label>Image*</label>
                                                                        <input type="file" class="dropify" name="document" accept=".jpg, .png, image/jpeg, image/png, .pdf">
                                                                    </div>
                                                                    @if ($errors->has('document'))
                                                                    <strong class="error_text">{{ $errors->first('document') }}</strong>
                                                                    @endif
                                                                </div>
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-dark"><i class="fe fe-send me-2"></i>Submit
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-10 CLOSED -->
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        <div class="demo-footer">
            <div class="container">
                <footer class="main-footer px-0 text-center">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            Copyright © <span id="year"></span> <a href="https://onesky.com.bd">One Sky
                                Communications Limited</a> All rights reserved.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('backendAssets') }}/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('backendAssets') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- COUNTERS JS-->
    <script src="{{ asset('backendAssets') }}/plugins/counters/counterup.min.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/counters/waypoints.min.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/counters/counters-1.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('backendAssets') }}/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/company-slider/slider.js"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('backendAssets') }}/plugins/rating/jquery-rate-picker.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/rating/rating-picker.js"></script>

    <!-- Star Rating-1 Js-->
    <script src="{{ asset('backendAssets') }}/plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/ratings-2/star-rating.js"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('backendAssets') }}/plugins/fileuploads/js/fileupload.js"></script>
    <script src="{{ asset('backendAssets') }}/plugins/fileuploads/js/file-upload.js"></script>

    <!-- Sticky js -->
    <script src="{{ asset('backendAssets') }}/js/sticky.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('backendAssets') }}/js/landing.js"></script>

    <!-- tostr alert js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))
    <script>
        toastr.options = {
            "progressBar": true
            , "closeButton": true
        , }
        toastr.success("{{ Session::get('message') }}")

    </script>
    @else
    @endif

</body>

</html>
