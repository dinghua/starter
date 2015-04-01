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
    <title>{{ $backend['title'] }}</title>
    <meta name="description" content="{{ $backend['description'] }}">
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('packages/ecdo/backend/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('packages/ecdo/backend/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('packages/ecdo/backend/select2-3.3.1/select2.css') }}
    {{ HTML::style('packages/ecdo/backend/css/todc-bootstrap.css') }}
    {{ HTML::style('packages/ecdo/backend/css/theme.css') }}
    @yield('style')

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<!-- #wrap -->
<div id="wrap">
    <!-- #top -->
    <div id="top">
        <!-- .navbar -->
        <div class="navbar navbar-inverse navbar-static-top">

            <div class="navbar-inner">
                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>


                    <!-- .topnav -->
                    @if (Sentry::check())
                    <div class="btn-toolbar topnav">

                        <div class="btn-group">
                            <a class="btn btn-inverse btn-mini" data-placement="bottom"
                               data-original-title="{{ $backend['site_name'] }} {{ Lang::get('backend::common.homepage') }}"
                               rel="tooltip"
                               href="{{URL::to('/')}}"><i class="icon-home"></i>
                            </a>
                        </div>

                        <div class="btn-group">
                            <a href="#helpModal" class="btn btn-inverse btn-mini" rel="tooltip" data-placement="bottom"
                               data-original-title="{{ Lang::get('backend::common.help') }}" data-toggle="modal">
                                <i class="icon-question-sign"></i>
                            </a>
                        </div>

                        <div class="btn-group">
                            <a class="btn btn-inverse btn-mini" data-placement="bottom"
                               data-original-title="{{ Lang::get('backend::common.logout') }}"
                               rel="tooltip"
                               href="{{ route('admin.logout') }}"><i class="icon-off"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.topnav -->

                    <div class="nav-collapse collapse">
                        <!-- .nav -->
                        <ul class="nav">
                            @foreach (Config::get('backend::menu') as $title => $args)
                            @if ($args['type'] === 'single')

                            @if( Sentry::hasAccess($args['rule']))
                            <li>{{ HTML::linkRoute($args['route'], $title) }}</li>
                            @endif

                            @else
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    {{ $title }} <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($args['links'] as $title => $value)

                                    @if( Sentry::hasAccess($value['rule']))
                                    <li>{{ HTML::linkRoute($value['route'], $title) }}</li>
                                    @endif

                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <!-- /.nav -->
                    </div>
                    @endif

                </div>
            </div>
            <!-- /.navbar -->
        </div>
    </div>
    <!-- /#top -->

    <!-- .head -->
    <header class="head">
        <!-- ."main-bar -->
        <div class="main-bar">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        @yield('header')
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.main-bar -->
    </header>
    <!-- /.head -->

    <!-- #content -->
    <div id="content">
        <div class="container">
            @include('backend::partials.alert')
            @yield('content')
        </div>
        <!-- /.outer -->
    </div>
    <!-- /#content -->

    <!-- #push do not remove -->
    <div id="push"></div>
    <!-- /#push -->
</div>
<!-- /#wrap -->

<div class="clearfix"></div>
<div id="footer">
    <p>2013 &copy; {{ $backend['site_name'] }} By <a href="http://www.lapland.name" target="_blank">cooper</a></p>
</div>

<!-- #helpModal -->
<div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="helpModalLabel"><i class="icon-external-link"></i> {{ Lang::get('backend::common.help') }}</h3>
    </div>

    <div class="modal-body">
        @section('help')
        <p>{{ Lang::get('backend::common.no_help') }}</p>
        @show
    </div>

    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">{{ Lang::get('backend::common.close') }}</button>
    </div>
</div>
<!-- /#helpModal -->

{{ HTML::script('packages/ecdo/backend/js/vendor/jquery.1.10.0.min.js') }}
{{ HTML::script('packages/ecdo/backend/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('packages/ecdo/backend/select2-3.3.1/select2.min.js') }}
{{ HTML::script('packages/ecdo/backend/js/vendor/bootbox.min.js') }}
{{ HTML::script('packages/ecdo/backend/js/admin.js') }}
@yield('script')
</body>
</html>
