<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Light start</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/vendors/iconfonts/font-awesome/css/font-awesome.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/admin/images/favicon.png') }}"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="{{ asset('/frontend/plugin-frameworks/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('/frontend/fonts/ionicons.css') }}" rel="stylesheet ">
    <link href="{{ asset('/frontend/common/styles.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-scroller" id="app">
    <router-view></router-view>
</div>

<script src="{{asset('js/app.js')}}"></script>


<!-- plugins:js -->
<script src="{{ asset('/admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('/admin/js/off-canvas.js')}}"></script>
<script src="{{asset('/admin/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('/admin/js/dashboard.js')}}"></script>
<!-- End custom js for this page-->
<script src="{{asset('/frontend/plugin-frameworks/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('/frontend/plugin-frameworks/tether.min.js')}}"></script>

<script src="{{asset('/frontend/plugin-frameworks/bootstrap.js')}}"></script>

<script src="{{asset('/frontend/common/scripts.js')}}"></script>
</body>

</html>
