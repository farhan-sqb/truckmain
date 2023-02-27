<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Fontfaces CSS-->
    <link href="{{ asset('user_assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('user_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('user_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ asset('user_assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user_assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- DATA TABLES css-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Main CSS-->
    <link href="{{ asset('user_assets/css/theme.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('user_assets/css/custom.css') }}" rel="stylesheet" media="all">


    <!-- Jquery JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- tiny mce --}}
    <script src="https://cdn.tiny.cloud/1/rl665q5jo2glj8u3k6o5wzxudr4mr2ewgwzyz167mdkthbz1/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <!-- Title Page-->
    <title>@yield('title')</title>

</head>


<body class="animsition">

    <div class="page-wrapper">

        @include('userpages.userlayouts.header')

        @include('userpages.userlayouts.sidemenu')


        <div class="page-container">
            @include('userpages.userlayouts.headerdesktop')
            @yield('content')
        </div>


    </div>


    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!-- Vendor JS       -->
    <script src="{{ asset('user_assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/select2/select2.min.js') }}"></script>

    <!-- Data table js-->
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <!-- Main JS-->
    <script src="{{ asset('user_assets/js/main.js') }}"></script>
    <script src="{{ asset('user_assets/js/custom.js') }}"></script>

</body>

</html>
