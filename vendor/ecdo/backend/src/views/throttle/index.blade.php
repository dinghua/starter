@extends(Config::get('backend::views.layout'))

@section('header')
<h3>
    <i class="icon-key"></i>
    {{ $user->first_name }}&nbsp; {{ $user->last_name }} Throttling Status
</h3>
@stop

@section('help')
<p class="lead">Users Throttling</p>
<p>
    From here you can Ban, unban, suspend or unsuspend a single user.
</p>
@stop

@section('content')
<div class="row">
    <div class="span12">



                @if ($throttle->isBanned())
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{ asset('packages/ecdo/backend/img/not-ok-icon.png') }}" alt=""/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Banned</h4>
                            <p>
                                <a href="{{ route('admin.users.throttling.update',array($user->id,'unban')) }}"
                                   class="btn btn-primary" rel="tooltip" title="UnBan User"
                                   data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                                   data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                                   data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                                   data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                                   data-method="put" data-modal-text="Unban this user?">
                                    <i class="icon-check"></i>
                                    Unban User
                                </a>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{ asset('packages/ecdo/backend/img/ok-icon.png') }}" alt=""/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Not Banned</h4>
                            <p>
                                <a href="{{ route('admin.users.throttling.update',array($user->id,'ban')) }}"
                                   class="btn btn-danger" rel="tooltip" title="Ban User"
                                   data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                                   data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                                   data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                                   data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                                   data-method="put" data-modal-text="Ban this user?">
                                    <i class="icon-ban-circle"></i>
                                    Ban User
                                </a>
                            </p>
                        </div>
                    </div>
                @endif

                @if ($throttle->isSuspended())
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{ asset('packages/ecdo/backend/img/not-ok-icon.png') }}" alt=""/>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Suspended</h4>
                        <p>
                            <a href="{{ route('admin.users.throttling.update',array($user->id,'unsuspend')) }}"
                               class="btn btn-primary" rel="tooltip" title="UnBan User"
                                data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                                data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                                data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                                data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                               data-method="put" data-modal-text="Unsuspend this user?">
                                <i class="icon-check"></i>
                                Unsuspend User
                            </a>
                        </p>
                    </div>
                </div>
                @else
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{ asset('packages/ecdo/backend/img/ok-icon.png') }}" alt=""/>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Not Suspended</h4>
                        <p>
                            <a href="{{ route('admin.users.throttling.update',array($user->id,'suspend')) }}"
                               class="btn btn-danger" rel="tooltip" title="Ban User"
                                data-modal-header = "{{ Lang::get('backend::common.please_confirm') }}"
                                data-modal-ok = "{{ Lang::get('backend::common.ok') }}"
                                data-modal-cancel = "{{ Lang::get('backend::common.cancel') }}"
                                data-modal-sure = "{{ Lang::get('backend::common.are_you_sure') }}"
                               data-method="put" data-modal-text="Suspend this user?">
                                <i class="icon-ban-circle"></i>
                                Suspend User
                            </a>
                        </p>
                    </div>
                </div>
                @endif


    </div>
</div>

@stop
