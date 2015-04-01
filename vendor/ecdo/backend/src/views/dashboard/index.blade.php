@extends(Config::get('backend::views.layout'))

@section('header')
    <h3>
        <i class="icon-dashboard"></i>
        {{ Lang::get('backend::common.dashboard') }}
    </h3>
@stop