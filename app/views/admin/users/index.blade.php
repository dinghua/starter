@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::users.users') }}
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-toolbar">
                <a href="{{ route('admin.users.create') }}" class="btn m-b-xs btn-sm btn-primary btn-addon">
                    <i class="icon-plus"></i>
                    {{ Lang::get('backend::users.new_user') }}
                </a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>{{ Lang::get('backend::users.name') }}</th>
                <th>{{ Lang::get('backend::users.email') }}</th>
                <th>{{ Lang::get('backend::users.groups') }}</th>
                <th>{{ Lang::get('backend::users.active') }}</th>
                <th>{{ Lang::get('backend::users.joined') }}</th>
                <th>{{ Lang::get('backend::users.last_visit') }}</th>
                <th>{{ Lang::get('backend::users.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ HTML::linkRoute('admin.users.show',$user->first_name.' '.$user->last_name, array($user->id)) }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->groups as $group)
                            <span class="label label-default">{{ $group->getName() }}</span>
                        @endforeach
                    </td>
                    <td>{{ ($user->activated) ? Lang::get('backend::users.yes') : Lang::get('backend::users.no') }}</td>
                    <td>{{ $user->activated_at }}</td>
                    <td>{{ is_null($user->last_login) ? 'Never Visited' : $user->last_login }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
                                {{ Lang::get('backend::users.action') }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.users.edit', array($user->id)) }}">
                                        {{ Lang::get('backend::users.edit_user') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.permissions', array($user->id)) }}">
                                        {{ Lang::get('backend::users.permissions') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.destroy', array($user->id)) }}"
                                       data-method="delete"
                                       data-modal-header="{{ Lang::get('backend::common.please_confirm') }}"
                                       data-modal-ok="{{ Lang::get('backend::common.ok') }}"
                                       data-modal-cancel="{{ Lang::get('backend::common.cancel') }}"
                                       data-modal-sure="{{ Lang::get('backend::common.are_you_sure') }}"
                                       data-modal-text="{{ Lang::get('backend::users.delete_this_user') }}">
                                       {{ Lang::get('backend::users.delete_user') }}
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    @if ($user->isActivated())
                                        <a href="{{ route('admin.users.deactivate', array($user->id)) }}"
                                           data-method="put"
                                           data-modal-header="{{ Lang::get('backend::common.please_confirm') }}"
                                           data-modal-ok="{{ Lang::get('backend::common.ok') }}"
                                           data-modal-cancel="{{ Lang::get('backend::common.cancel') }}"
                                           data-modal-sure="{{ Lang::get('backend::common.are_you_sure') }}"
                                           data-modal-text="{{ Lang::get('backend::users.deactivate_this_user') }}">
                                           {{ Lang::get('backend::users.deactivate') }}
                                        </a>
                                    @else
                                        <a href="{{ route('admin.users.activate', array($user->id)) }}"
                                           data-method="put"
                                           data-modal-header="{{ Lang::get('backend::common.please_confirm') }}"
                                           data-modal-ok="{{ Lang::get('backend::common.ok') }}"
                                           data-modal-cancel="{{ Lang::get('backend::common.cancel') }}"
                                           data-modal-sure="{{ Lang::get('backend::common.are_you_sure') }}"
                                           data-modal-text="{{ Lang::get('backend::users.activate_this_user') }}">
                                           {{ Lang::get('backend::users.activate') }}
                                        </a>
                                    @endif
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('admin.users.throttling', array($user->id)) }}">
                                        {{ Lang::get('backend::users.throttling') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
