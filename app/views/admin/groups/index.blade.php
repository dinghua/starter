@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::groups.groups') }}
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-toolbar">
                <a href="{{ URL::route('admin.groups.create') }}" class="btn m-b-xs btn-sm btn-primary btn-addon">
                    <i class="icon-plus"></i>
                    {{ Lang::get('backend::groups.new_group') }}
                </a>
            </div>
        </div>

        @if (count($groups) == 0)
            <div class="alert alert-info">
                {{ Lang::get('backend::groups.no_group') }}
            </div>
        @else
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ Lang::get('backend::groups.name') }}</th>
                    <th class="span4"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a href="{{ route('admin.groups.edit', array($group->id)) }}"
                               class="btn btn-primary btn-xs" rel="tooltip" title="{{ Lang::get('backend::groups.edit_group') }}">
                                <i class="icon-edit"></i>
                                {{ Lang::get('backend::groups.edit_group') }}
                            </a>

                            <a href="{{ route('admin.groups.permissions', array($group->id)) }}"
                               class="btn btn-info btn-xs" rel="tooltip"
                               title="{{ Lang::get('backend::groups.edit_group_permissions') }}">
                                {{ Lang::get('backend::groups.permissions') }} <i class="icon-arrow-right"></i>
                            </a>

                            <a href="{{ route('admin.groups.destroy', array($group->id)) }}"
                               class="btn btn-danger btn-xs" rel="tooltip"
                               title="{{ Lang::get('backend::groups.delete_group') }}" data-method="delete"
                               data-modal-header="{{ Lang::get('backend::common.please_confirm') }}"
                               data-modal-ok="{{ Lang::get('backend::common.ok') }}"
                               data-modal-cancel="{{ Lang::get('backend::common.cancel') }}"
                               data-modal-sure="{{ Lang::get('backend::common.are_you_sure') }}"
                               data-modal-text="{{ Lang::get('backend::groups.delete_this_group') }}">
                                <i class="icon-remove"></i>
                                {{ Lang::get('backend::groups.delete_group') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop
