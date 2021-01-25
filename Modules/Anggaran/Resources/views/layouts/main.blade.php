<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel='shortcut icon' type='image/x-icon' href={{ asset("/images/bps.ico")}} />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.nav')
    @include('anggaran::layouts.left')
    <div class="content-wrapper">
        <div class="content-header">
            @yield('header')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
</div>
<script src="{{ asset('/bower_components/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>
@yield('scripts')
</body>
</html>
