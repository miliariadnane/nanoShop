<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SB Admin 2 - Login</title>
        <!-- Custom fonts for this template-->
        <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-gradient-primary">
        @yield('content')
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    </body>
</html>