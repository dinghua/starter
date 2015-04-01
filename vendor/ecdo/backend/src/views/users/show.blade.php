@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-user"></i>
    {{ $user->first_name }} {{ $user->last_name }}  {{Lang::get('backend::common.profile')}}
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

        <div class="btn-toolbar">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary" rel="tooltip" title="{{Lang::get('backend::common.back')}}">
                <i class="icon-arrow-left"></i>
                {{Lang::get('backend::common.back')}}
            </a>
        </div>

        <table class="table table-striped">
            <tbody>
            <tr>
                <td><strong>{{Lang::get('backend::users.first_name')}}</strong></td>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.last_name')}}</strong></td>
                <td>{{ $user->last_name }}</td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.email')}}</strong></td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.groups')}}</strong></td>
                <td>
                    @foreach($user->groups as $group)
                    <span class="label">{{ $group->getName() }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.activate')}}</strong></td>
                <td>{{ ($user->activated) ? 'yes' : 'no' }}</td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.activate_date')}}</strong></td>
                <td>{{ $user->activated_at }}</td>
            </tr>
            <tr>
                <td><strong>{{Lang::get('backend::users.last_visit')}}</strong></td>
                <td>{{ is_null($user->last_login) ? 'Never Visited' : $user->last_login }}</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
@stop
