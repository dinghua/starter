<div class="navbar-header bg-dark">
    <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
        <i class="glyphicon glyphicon-cog"></i>
    </button>
    <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
        <i class="glyphicon glyphicon-align-justify"></i>
    </button>
    <!-- brand -->
    <a href="#/" class="navbar-brand text-lt">
        <span class="hidden-folded m-l-xs">{{ $backend['site_name'] }}</span>
    </a>
    <!-- / brand -->
</div>
<!-- / navbar header -->

<div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <!-- buttons -->
    <div class="nav navbar-nav hidden-xs">
        <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
        </a>

        <a ui-toggle-class="show">
            @yield('page_title')
        </a>
    </div>
    <!-- / buttons -->

    <ul class="nav navbar-nav hidden-sm">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                <span>新建</span> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{route('admin.users.create')}}">用户</a></li>
                <li>
                    <a href="{{route('admin.groups.create')}}">
                        用户组
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{route('admin.permissions.create')}}">
                        权限
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- nabar right -->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                        <img src="{{ Sentry::getUser()->headimgurl }}" alt="...">
                        <i class="on md b-white bottom"></i>
                      </span>
                <span class="hidden-sm hidden-md">{{ Sentry::getUser()->nickname }} </span> <b
                        class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
                <li>
                    <a href="{{ route('admin.logout') }}">注销</a>
                </li>
            </ul>
            <!-- / dropdown -->
        </li>
    </ul>
    <!-- / navbar right -->
</div>