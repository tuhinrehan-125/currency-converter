<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('backend/images/favicon.ico') }}">

    <title>Currency Converter - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ URL::asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ URL::asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('body.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('body.footer')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ URL::asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ URL::asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ URL::asset('backend/js/template.js') }}"></script>
    <script src="{{ URL::asset('backend/js/pages/dashboard.js') }}"></script>


</body>

</html>