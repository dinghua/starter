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
<div class="app app-header-fixed">
    <!-- header -->
    <header id="header" class="app-header navbar" role="menu">
        @include('partials.navbar')
    </header>
    <!-- / header -->

    <!-- aside -->
    <aside id="aside" class="app-aside hidden-xs bg-dark">
        <div class="aside-wrap">
            <div class="navi-wrap">
                <!-- nav -->
                @include('partials.nav')
                <!-- / nav -->
            </div>
        </div>
    </aside>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body">
            <div class="hbox hbox-auto-xs hbox-auto-sm">
                <!-- main -->
                <div class="col">
                    <!-- main header -->
                    <div class="bg-light lter b-b wrapper-md">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <h1 class="m-n font-thin h3 text-black">@yield('header')</h1>
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->
                    <div class="wrapper-md">
                        @include('partials.notify')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / content -->

    <!-- footer -->
    @include('partials.footer')
    <!-- / footer -->
</div>
@include('partials.scripts')
@yield('scripts')
</body>
</html>