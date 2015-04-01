@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-group"></i>
    {{$group->name}} {{ Lang::get('backend::groups.group') }} {{ Lang::get('backend::groups.permissions') }}
</h3>
@stop

@section('help')
<p class="lead">Permission Inheritance</p>
<p>
    Just as permissions are defined for groups and individual users, the permission inheritance model depends on a
    user's group.
    An Administrator can assign different permissions to a user that is assigned to a group, and if that group has
    different access permissions, the user's access is always determined by the group access.
</p>

<p class="text-warning">
    Permission Inheritance only works for users permissions.
</p>

<p class="text-info">
    For more info visit <a href="http://docs.cartalyst.com/sentry-2/permissions" target="_blank">Sentry website</a>
</p>
@stop

@section('content')
<div class="row">
    <div class="span12 margin-top-20">
        {{ Former::horizontal_open(route('admin.groups.permissions', array($group->id)))->method('PUT') }}

        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#generic" data-toggle="tab">{{ Lang::get('backend::permissions.generic_permissions') }}</a></li>
            <li><a href="#module" data-toggle="tab">{{ Lang::get('backend::permissions.modules_permissions') }}</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="generic">
                @foreach( $genericPerm as $perm)
                <legend>{{ Lang::get('backend::permissions.generic_permissions') }}</legend>
                @foreach( $perm['permissions'] as $input )
                {{ Former::select($input['name'],$input['text'])
                ->options(array('0' => Lang::get('backend::permissions.deny'), '1' => Lang::get('backend::permissions.allow')))
                ->value($input['value'])
                ->class('select2')->id($input['id'])
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
                <legend>{{ $perm['name'] }} {{ Lang::get('backend::permissions.module') }}</legend>
                @foreach( $perm['permissions'] as $input )
                {{ Former::select($input['name'],$input['text'])
                ->options(array('0' => Lang::get('backend::permissions.deny'), '1' => Lang::get('backend::permissions.allow')))
                ->value($input['value'])
                ->class('select2')->id($input['id'])
                }}
                @endforeach
                @endforeach
                @endif
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">{{ Lang::get('backend::permissions.save_changes') }}</button>
            <a href="{{route('admin.groups.index')}}" class="btn">{{ Lang::get('backend::permissions.cancel') }}</a>
        </div>

        {{ Former::close() }}
    </div>
</div>
@stop
