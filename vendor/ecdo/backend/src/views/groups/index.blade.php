@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-group"></i>
    {{ Lang::get('backend::groups.groups') }}
</h3>
@stop

@section('help')
<p class="lead">{{ Lang::get('backend::groups.groups') }}</p>
<p>
    Users can be placed into groups to manage permissions.
</p>
<p class="text-info">
    For more info visit <a href="http://docs.cartalyst.com/sentry-2/permissions" target="_blank">Sentry website</a>
</p>
@stop

@section('content')
<div class="row">
    <div class="span12">

        <div class="btn-toolbar">
            <a href="{{ URL::route('admin.groups.create') }}" class="btn btn-primary" rel="tooltip"
               title="{{ Lang::get('backend::groups.create_new_group') }}">
                <i class="icon-plus"></i>
                 {{ Lang::get('backend::groups.new_group') }}
            </a>
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
                       class="btn" rel="tooltip" title="{{ Lang::get('backend::groups.edit_group') }}">
                        <i class="icon-edit"></i>
                    </a>

                    <a href="{{ route('admin.groups.permissions', array($group->id)) }}"
                       class="btn" rel="tooltip" title="{{ Lang::get('backend::groups.edit_group_permissions') }}">
                         {{ Lang::get('backend::groups.permissions') }} <i class="icon-arrow-right"></i>
                    </a>

                    <a href="{{ route('admin.groups.destroy', array($group->id)) }}"
                       class="btn btn-danger" rel="tooltip" title="{{ Lang::get('backend::groups.delete_group') }}" data-method="delete"
                       data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                       data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                       data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                       data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                       data-modal-text="{{ Lang::get('backend::groups.delete_this_group') }}">

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
