@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-ban-circle"></i>
    {{ Lang::get('backend::permissions.permissions') }}
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
    <div class="span12">
        <h4>{{ Lang::get('backend::permissions.generic_permissions') }}</h4>

        <p class="well">
            @foreach ($roles['inputs'] as $role => $value)
            {{ Lang::get('backend::permissions.'. strtolower($role)) }}
            @endforeach
        </p>

    </div>
</div>

<div class="row">
    <div class="span12">
        <h4>{{ Lang::get('backend::permissions.modules_permissions') }}</h4>

        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.permissions.create') }}" class="btn btn-primary" rel="tooltip"
               title="{{ Lang::get('backend::permissions.create_new_permission') }}">
                <i class="icon-plus"></i>
                {{ Lang::get('backend::permissions.new_permission') }}
            </a>
        </div>

        @if($permissions->isEmpty())
        <div class="alert alert-info">
            {{ Lang::get('backend::permissions.no_found') }}
        </div>
        @else
        <table class="table">
            <thead>
            <tr>
                <th>{{ Lang::get('backend::permissions.module') }}</th>
                <th>{{ Lang::get('backend::permissions.roles') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions->all() as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>
                    <ul class="inline">
                        @foreach ($permission->permissions as $role)
                        <li>{{ $role }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('admin.permissions.edit', array($permission->id)) }}"
                       class="btn" rel="tooltip" title="{{ Lang::get('backend::permissions.edit_permission') }}">
                        <i class="icon-edit"></i>
                    </a>
                    <a href="{{ route('admin.permissions.destroy', array($permission->id)) }}"
                       class="btn btn-danger" rel="tooltip"
                       title="{{ Lang::get('backend::permissions.delete_permission') }}" data-method="delete"
                       data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                       data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                       data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                       data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                       data-modal-text="{{ Lang::get('backend::permissions.delete_this_permission') }}">

                        <i class="icon-remove"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif

    </div>
</div>
@stop
