<!-- nav -->
<nav ui-nav class="navi clearfix">
    <ul class="nav">
        @foreach (Config::get('backend::menu') as $title => $args)
            @if ($args['type'] === 'single')
                @if( Sentry::hasAccess($args['rule']))
                    <li>
                        <a href="{{route($args['route'])}}">
                            @if(isset($args['icon']))
                            <i class="{{$args['icon']}}"></i>
                            @endif
                            <span>{{ $title }}</span>
                        </a>
                    </li>
                @endif
            @else
                <li class="dropdown">
                    <a href class="auto">
                          <span class="pull-right text-muted">
                            <i class="fa fa-fw fa-angle-right text"1></i>
                            <i class="fa fa-fw fa-angle-down text-active"></i>
                          </span>
                        @if(isset($args['icon']))
                            <i class="{{$args['icon']}}"></i>
                        @endif
                        <span class="font-bold">{{ $title }}</span>
                    </a>
                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>{{ $title }}</span>
                            </a>
                        </li>
                        @foreach ($args['links'] as $title => $value)
                            @if( Sentry::hasAccess($value['rule']))
                                <li>
                                    <a href="{{route($value['route'])}}">
                                        <span>{{ $title }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
<!-- nav -->