<?php
/**
 * Created by PhpStorm.
 * User: shovon
 * Date: 8/3/18
 * Time: 10:27 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/sparkx.png">
    <title>SparkX Fashion Wear</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--
        => Add extra css or JS if needed
    --}}
    @yield('headerContent')
    {{--
        => Add extra css or JS if needed
    --}}
</head>

<body class="fix-header fix-sidebar card-no-border">

{{--INCLUDING PRELOADER--}}

@include('inc.preloader')

{{--
        => full body content here
        => main wrapper
--}}

@yield('content')

{{--
    => full body content ends here
--}}




<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/assets/node_modules/jquery/jquery.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="/assets/node_modules/bootstrap/js/popper.min.js"></script>
<script src="/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/js/sidebarmenu.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="/assets/node_modules/raphael/raphael-min.js"></script>
<script src="/assets/node_modules/morrisjs/morris.min.js"></script>
<!--c3 JavaScript -->
<script src="/assets/node_modules/d3/d3.min.js"></script>
<script src="/assets/node_modules/c3-master/c3.min.js"></script>
<!-- Popup message jquery -->
<script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="/js/dashboard1.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="/assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Plugin JavaScript -->
<script src="/assets/node_modules/moment/moment.js"></script>
<script src="/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
<script src="/assets/node_modules/daterangepicker/daterangepicker.js"></script>
<script src="/assets/node_modules/moment/moment.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--HTML5 table to image conversion -->
<script src="/js/html2canvas.js"></script>
{{--
    => Add extra  JS if needed
--}}
@yield('footerContent')
{{----}}
</body>
</html>
