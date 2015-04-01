@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::common.new_edit') }} {{ Lang::get('backend::users.users') }}
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ Lang::get('backend::users.items_mark_required') }}
        </div>
        <div class="panel-body">
            {{ form($form) }}
        </div>
    </div>
@stop
