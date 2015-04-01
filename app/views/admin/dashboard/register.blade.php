@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-edit"></i>
    {{ Lang::get('backend::common.register') }}
</h3>
@stop

@section('content')
<div class="row">
    <div class="span12">
        {{ Former::horizontal_open(route('admin.register')) }}

        <fieldset>
            <legend>{{ Lang::get('backend::common.personal_information') }}</legend>
            {{ Former::xlarge_text('first_name', Lang::get('backend::common.first_name')) }}
            {{ Former::xlarge_text('last_name', Lang::get('backend::common.last_name')) }}
        </fieldset>

        <fieldset>
            <legend>{{ Lang::get('backend::common.email') }}</legend>
            {{ Former::xlarge_text('email', Lang::get('backend::common.email')) }}
        </fieldset>

        <fieldset>
            <legend>{{ Lang::get('backend::common.password') }}</legend>
            {{ Former::xlarge_password('password', Lang::get('backend::common.password')) }}
            {{ Former::xlarge_password('password_confirmation', Lang::get('backend::common.confirm_password')) }}
        </fieldset>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">{{ Lang::get('backend::common.register') }}</button>
        </div>
        {{ Former::close() }}
    </div>
</div>
@stop
