<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    @yield('meta')
    <title>{{ $backend['title'] }}</title>
    <meta name="description" content="{{ $backend['description'] }}">
    <meta name="viewport" content="width=device-width">
    @include('partials.styles')
    @yield('styles')
</head>
<body>
@yield('content')
@include('partials.scripts')
@yield('scripts')
</body>
</html>