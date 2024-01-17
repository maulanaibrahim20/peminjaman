<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gawe Ayu – Bootstrap  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets') }}/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Sibatik – Bootstrap Admin & Dashboard </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ url('/assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ url('/assets') }}/css/style.css" rel="stylesheet" />
    <link href="{{ url('/assets') }}/css/plugins.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ url('/assets') }}/css/icons.css" rel="stylesheet" />

</head>

<body class="login-img">

    <!-- BACKGROUND-IMAGE -->
    <div>

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ url('/assets') }}/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        @yield('content')
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ url('/assets') }}/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/assets') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS -->
    <script src="{{ url('/assets') }}/js/jquery.sparkline.min.js"></script>

    <!-- CHART-CIRCLE JS -->
    <script src="{{ url('/assets') }}/js/circle-progress.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ url('/assets') }}/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- INPUT MASK JS -->
    <script src="{{ url('/assets') }}/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- Color Theme js -->
    <script src="{{ url('/assets') }}/js/themeColors.js"></script>

    <!-- swither styles js -->
    <script src="{{ url('/assets') }}/js/swither-styles.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ url('/assets') }}/js/custom.js"></script>

    @include('sweetalert::alert')


</body>

</html>
