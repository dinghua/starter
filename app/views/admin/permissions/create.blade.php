@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::permissions.create_new_permissions_module') }}
@stop


@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        {{form($form)}}
    </div>
</div>
@stop
