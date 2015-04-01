@extends(Config::get('backend::views.layout'))

@section('header')
    {{ $user->first_name }} {{ Lang::get('backend::groups.permissions') }}
@stop


@section('content')
    {{Former::horizontal_open( route('admin.users.permissions', array($user->id)), 'PUT' )}}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ Lang::get('backend::permissions.override_groups_permissions') }}
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#generic"
                                      data-toggle="tab">{{ Lang::get('backend::permissions.generic_permissions') }}</a>
                </li>
                <li><a href="#module" data-toggle="tab">{{ Lang::get('backend::permissions.modules_permissions') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="generic">
                    {{ Former::select('rules[superuser]', Lang::get('backend::users.super_user'))
                    ->options(array('0' => Lang::get('backend::users.no'),'1' => Lang::get('backend::users.yes')))
                    ->value($user->isSuperUser() ? 1 : 0)
                    ->class('form-control')
                    }}
                    @foreach( $genericPerm as $perm)
                        @foreach( $perm['permissions'] as $input )
                            {{ Former::select($input['name'],$input['text'])
                            ->options(array('0' =>  Lang::get('backend::permissions.inherit'),'1' =>  Lang::get('backend::permissions.allow'),'-1' => Lang::get('backend::permissions.deny')))
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
                                ->options(array('0' => Lang::get('backend::permissions.inherit'),'1' => Lang::get('backend::permissions.allow'),'-1' => Lang::get('backend::permissions.deny')))
                                ->value($input['value'])
                                ->class('form-control')->id($input['id'])
                                }}
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="panel-footer">
                <button type="submit"
                        class="btn btn-primary btn-sm">{{ Lang::get('backend::permissions.save_changes') }}</button>
                <a href="{{route('admin.users.index')}}" class="btn btn-default btn-sm">{{ Lang::get('backend::permissions.cancel') }}</a>
            </div>
        </div>
    </div>
    {{ Former::close() }}
@stop

