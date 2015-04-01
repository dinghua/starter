@extends(Config::get('backend::views.layout'))

@section('header')
    [{{$group->name}}] {{ Lang::get('backend::groups.group') }} {{ Lang::get('backend::groups.permissions') }}
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel panel-body">
            {{ Former::horizontal_open(route('admin.groups.permissions', array($group->id)))->method('PUT') }}

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#generic"
                                      data-toggle="tab">{{ Lang::get('backend::permissions.generic_permissions') }}</a>
                </li>
                <li><a href="#module" data-toggle="tab">{{ Lang::get('backend::permissions.modules_permissions') }}</a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="generic">
                    @foreach( $genericPerm as $perm)
                        @foreach( $perm['permissions'] as $input )
                            {{ Former::select($input['name'],$input['text'])
                            ->options(array('0' => Lang::get('backend::permissions.deny'), '1' => Lang::get('backend::permissions.allow')))
                            ->value($input['value'])
                            ->class('form-control')->id($input['id'])
                            }}
                        @endforeach
                    @endforeach
                </div>

                <div class="tab-pane" id="module">
                    @if (count($modulePerm) < 1)
                        <div class="alert alert-info">
                            {{ Lang::get('backend::permissions.no_found') }}
                        </div>
                    @else
                        @foreach( $modulePerm as $perm)
                            <h4 class="m-t-lg">{{ $perm['name'] }} {{ Lang::get('backend::permissions.module') }}</h4>
                            @foreach( $perm['permissions'] as $input )
                                {{ Former::select($input['name'],$input['text'])
                                ->options(array('0' => Lang::get('backend::permissions.deny'), '1' => Lang::get('backend::permissions.allow')))
                                ->value($input['value'])
                                ->class('form-control')->id($input['id'])
                                }}
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit"
                    class="btn btn-primary btn-sm">{{ Lang::get('backend::permissions.save_changes') }}</button>
            <a href="{{route('admin.groups.index')}}"
               class="btn btn-default btn-sm">{{ Lang::get('backend::permissions.cancel') }}</a>
            {{ Former::close() }}
        </div>
    </div>
@stop
