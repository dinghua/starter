@extends(Config::get('backend::views.layout_page'))

@section('content')
    <div class="app app-header-fixed  ">
        <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController"
             ng-init="app.settings.container = false;">
            <a href="" class="navbar-brand block m-t">{{Config::get('backend::site_config.site_name')}}</a>

            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <strong>{{Lang::get('backend::common.sign_in')}}</strong>
                </div>
                <form name="form" action="{{ URL::route('admin.login') }}" class="form-validation" method="POST">
                    <div class="text-danger wrapper text-center" ng-show="authError">
                        @if ( Session::has('login_error') )
                            <strong>{{ Session::get('login_error') }}</strong>
                        @endif
                    </div>
                    <div class="list-group list-group-sm">
                        <div class="list-group-item">
                            <input name="login_attribute" type="email"
                                   placeholder="{{Lang::get('backend::common.email')}}"
                                   class="form-control no-border"
                                   required>
                        </div>
                        <div class="list-group-item">
                            <input name="password" type="password"
                                   placeholder="{{Lang::get('backend::common.password')}}"
                                   class="form-control no-border"
                                   required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"
                            >{{Lang::get('backend::common.sign_in')}}
                    </button>
                    <div class="text-center m-t m-b"><a
                                ui-sref="access.forgotpwd">{{Lang::get('backend::common.forget_password')}}</a></div>
                    <div class="line line-dashed"></div>
                    <p class="text-center">
                        <small>{{Lang::get('backend::common.don_account')}}</small>
                    </p>
                    <a href="{{route('admin.register')}}"
                       class="btn btn-lg btn-default btn-block">{{Lang::get('backend::common.register')}}</a>
                </form>
            </div>
            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                    <small class="text-muted"><br> {{Config::get('backend::site_config.copyright')}} © {{date('Y')}}
                    </small>
                </p>
            </div>
        </div>
    </div>
@stop