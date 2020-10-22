<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/modules/animations-extended.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/css/custom.css') }}">
    <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css">

</head>

<body>
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
</body>

</html>
