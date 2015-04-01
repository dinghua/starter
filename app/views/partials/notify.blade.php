@if ( Session::has('errors') )
    <div class="alert alert-danger alert-dismissable"  role="alert" type="danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div>
            <strong>{{ Lang::get('backend::common.form_validation_failed') }} </strong> {{ Lang::get('backend::common.change_things_try_again') }}
        </div>
    </div>
@endif

@if ( Session::has('success') )
    <div class="alert alert-success alert-dismissable"  role="alert" type="danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div>
            <span> {{ Session::get('success') }} </span>
        </div>
    </div>
@endif

@if ( Session::has('warning') )
    <div class="alert alert-warning alert-dismissable"  role="alert" type="danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div>
            <span> {{ Session::get('warning') }} </span>
        </div>
    </div>
@endif

@if ( Session::has('error') )
    <div class="alert alert-warning alert-dismissable"  role="alert" type="danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div>
            <span> {{ Session::get('error') }} </span>
        </div>
    </div>
@endif

@if ( Session::has('info') )
    <div class="alert alert-info alert-dismissable"  role="alert" type="danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div>
            <span> {{ Session::get('info') }} </span>
        </div>
    </div>
@endif