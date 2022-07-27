<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url("assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{url("assets/vendors/iconfonts/ionicons/dist/css/ionicons.css")}}">
    <link rel="stylesheet" href="{{url("assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" href="{{url("assets/vendors/css/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{url("assets/vendors/css/vendor.bundle.addons.css")}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url("assets/css/shared/style.css")}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url("assets/css/demo_1/style.css")}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{url("assets/images/favicon.ico")}}" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        
        @include('admin.partials._navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.partials._sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                        <ul class="quick-links ml-auto">
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li><a href="#">Watchlist</a></li>
                        </ul>
                        </div>
                    </div>
                </div>

                <main class="py-4 col-12">
                    @include('layouts.flash-message')
                    @yield('content')
                    @yield('extra-script')
                </main>

            </div>
            <!-- Page Title Header Ends-->
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            @include('admin.partials._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url("assets/vendors/js/vendor.bundle.base.js")}}"></script>
    <script src="{{url("assets/vendors/js/vendor.bundle.addons.js")}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{url("assets/js/shared/off-canvas.js")}}"></script>
    <script src="{{url("assets/js/shared/misc.js")}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{url("assets/js/demo_1/dashboard.js")}}"></script>
    <!-- End custom js for this page-->
    <script src="{{url("assets/js/shared/jquery.cookie.js")}}" type="text/javascript"></script>
</body>
</html>