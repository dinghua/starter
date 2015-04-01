@if ( Session::has('errors') )
    <div class="row">
        <div class="span12 margin-10-top">
            <div class="alert alert-error ">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Lang::get('backend::common.form_validation_failed') }} </strong> {{ Lang::get('backend::common.change_things_try_again') }}
            </div>
        </div>
    </div>
@endif

@if ( Session::has('success') )
    <div class="row">
        <div class="span12">
            <div class="alert alert-success margin-10-top">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif

@if ( Session::has('warning') )
    <div class="row">
        <div class="span12">
            <div class="alert alert-warning margin-10-top">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('warning') }}
            </div>
        </div>
    </div>
@endif

@if ( Session::has('error') )
    <div class="row">
        <div class="span12">
            <div class="alert alert-error margin-10-top">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('error') }}
            </div>
        </div>
    </div>
@endif

@if ( Session::has('info') )
    <div class="row">
        <div class="span12">
            <div class="alert alert-info margin-10-top">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('info') }}
            </div>
        </div>
    </div>
@endif
