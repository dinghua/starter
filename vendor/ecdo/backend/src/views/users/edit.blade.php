@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-user"></i>
    {{ Lang::get('backend::users.edit_user') }} &quot;{{ $user->first_name }} {{ $user->last_name }}&quot;
</h3>
@stop

@section('help')
<p class="lead">Users </p>
<p>
    From here you can create, edit or delete users. Also you can assign custom permissions to a single user.
</p>
@stop

@section('content')
<div class="row">
    <div class="span12">

        {{Former::horizontal_open( route('admin.users.update', array($user->id)), 'PUT' )}}

        <div class="btn-toolbar">
            <a href="{{ route('admin.users.destroy', array($user->id)) }}"
               class="btn btn-danger" rel="tooltip" title="{{ Lang::get('backend::users.delete_user') }}"
               data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
               data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
               data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
               data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
               data-modal-text="{{ Lang::get('backend::users.delete_this_user') }}" data-method="delete">
                <i class="icon-trash"></i>
                {{ Lang::get('backend::users.delete') }}
            </a>
        </div>

        <legend>
            <small>{{ Lang::get('backend::users.items_mark_required') }}</small>
        </legend>
        {{ Former::xlarge_text('first_name', Lang::get('backend::users.first_name'), $user->first_name)->required() }}
        {{ Former::xlarge_text('last_name', Lang::get('backend::users.last_name'), $user->last_name)->required() }}
        {{ Former::xlarge_text('email',Lang::get('backend::users.email'), $user->email)->required() }}

        <legend>{{ Lang::get('backend::users.groups') }}</legend>
        <div class="control-group">
            <label for="groups[]" class="control-label">{{ Lang::get('backend::users.groups') }}</label>

            <div class="controls">
                <select id="groups" name="groups[]" class="select2" multiple="true">
                    @foreach($groups as $group)
                    @if( in_array( $group->id, Input::old('groups', array())) or in_array($group->id, $userGroupsId) )
                    <option selected="selected" value="{{ $group->id }}">{{ $group->name }}</option>
                    @else
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <legend>{{ Lang::get('backend::users.password') }}
            <small>{{ Lang::get('backend::users.leave_blank_keep_same_password') }}</small>
        </legend>
        {{ Former::xlarge_password('password', Lang::get('backend::users.password')) }}
        {{ Former::xlarge_password('password_confirmation', Lang::get('backend::users.confirm_password')) }}

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">{{ Lang::get('backend::users.save_changes') }}</button>
            <a href="{{route('admin.users.index')}}" class="btn">{{ Lang::get('backend::users.cancel') }}</a>
        </div>

        {{Former::close()}}

    </div>
</div>
@stop
