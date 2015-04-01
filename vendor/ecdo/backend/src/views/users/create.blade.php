@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-user"></i>
    {{ Lang::get('backend::users.new_user') }}
</h3>
@stop

@section('help')
<p class="lead">Users</p>
<p>
    From here you can create, edit or delete users. Also you can assign custom permissions to a single user.
</p>
@stop

@section('content')
<div class="row">
    <div class="span12">
        {{Former::horizontal_open( route('admin.users.store') )}}

        <legend><small>{{ Lang::get('backend::users.items_mark_required') }}</small></legend>

        {{ Former::xlarge_text('first_name', Lang::get('backend::users.first_name'))->requireds() }}
        {{ Former::xlarge_text('last_name', Lang::get('backend::users.last_name'))->requireds() }}
        {{ Former::xlarge_text('email', Lang::get('backend::users.email'))->requireds() }}

        <legend>{{ Lang::get('backend::users.password') }}</legend>
        {{ Former::xlarge_password('password', Lang::get('backend::users.password'))->requireds() }}
        {{ Former::xlarge_password('password_confirmation', Lang::get('backend::users.confirm_password'))->requireds() }}

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">{{ Lang::get('backend::users.save_changes') }}</button>
            <a href="{{route('admin.users.index')}}" class="btn">{{ Lang::get('backend::users.cancel') }}</a>
        </div>

        {{Former::close()}}
    </div>
</div>
@stop
