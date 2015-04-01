@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-group"></i>
    {{ Lang::get('backend::groups.add_new_group') }}
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
    <div class="span12 margin-top-20">
        {{ Former::horizontal_open(route('admin.groups.store')) }}

        {{ Former::xlarge_text('name', Lang::get('backend::groups.name'))->required() }}

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">{{ Lang::get('backend::groups.save_changes') }}</button>
            <a href="{{route('admin.groups.index')}}" class="btn">{{ Lang::get('backend::groups.cancel') }}</a>
        </div>

        {{ Former::close() }}
    </div>
</div>
@stop
