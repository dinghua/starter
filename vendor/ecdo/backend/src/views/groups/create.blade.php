@extends(Config::get('backend::views.layout'))

@section('header')
    {{ Lang::get('backend::groups.new') }} "{{ $group->name }}" {{ Lang::get('backend::groups.group') }}
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            {{form($form)}}
        </div>
    </div>
@stop
