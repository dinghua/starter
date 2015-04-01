@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::permissions.permissions') }}
@stop


@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ Lang::get('backend::permissions.generic_permissions') }}
        </div>
        <div class="panel-body">
            <p class="well">
                @foreach ($roles['inputs'] as $role => $value)
                    {{ Lang::get('backend::permissions.'. strtolower($role)) }}
                @endforeach
            </p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::route('admin.permissions.create') }}" class="btn m-b-xs btn-sm btn-primary btn-addon">
                <i class="icon-plus"></i>
                {{ Lang::get('backend::permissions.new_permission') }}</a>
        </div>
        <div class="panel-body">
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
                                   class="btn btn-default btn-xs" rel="tooltip"
                                   title="{{ Lang::get('backend::permissions.edit_permission') }}">
                                    {{ Lang::get('backend::permissions.edit_permission') }}
                                </a>
                                <a href="{{ route('admin.permissions.destroy', array($permission->id)) }}"
                                   class="btn btn-danger btn-xs" rel="tooltip"
                                   title="{{ Lang::get('backend::permissions.delete_permission') }}"
                                   data-method="delete"
                                   data-modal-header="{{ Lang::get('backend::common.please_confirm') }}"
                                   data-modal-ok="{{ Lang::get('backend::common.ok') }}"
                                   data-modal-cancel="{{ Lang::get('backend::common.cancel') }}"
                                   data-modal-sure="{{ Lang::get('backend::common.are_you_sure') }}"
                                   data-modal-text="{{ Lang::get('backend::permissions.delete_this_permission') }}">
                                    {{ Lang::get('backend::permissions.delete_permission') }}
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
