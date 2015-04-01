<?php
/*
|--------------------------------------------------------------------------
| Cpanel Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin', array(
    'as'     => 'admin.home',
    'uses'   => 'Ecdo\Backend\Controllers\CpanelController@index',
    'before' => 'auth.backend:admin.view'
));

Route::group(array('prefix' => 'admin', 'before' => 'auth.backend'), function ()
{
    Route::resource('users', 'Ecdo\Backend\Controllers\UsersController');
    Route::resource('groups', 'Ecdo\Backend\Controllers\GroupsController', array('except' => array('show')));
    Route::resource('permissions', 'Ecdo\Backend\Controllers\PermissionsController', array('except' => array('show')));
});

/*
|--------------------------------------------------------------------------
| Cpanel Extra Users Routes
|--------------------------------------------------------------------------
|
|
*/
Route::put('admin/users/{users}/activate', array(
    'as'     => 'admin.users.activate',
    'uses'   => 'Ecdo\Backend\Controllers\UsersController@putStatus',
    'before' => 'auth.backend:users.update'
));

Route::put('admin/users/{users}/deactivate', array(
    'as'     => 'admin.users.deactivate',
    'uses'   => 'Ecdo\Backend\Controllers\UsersController@putStatus',
    'before' => 'auth.backend:users.update'
));

/*
|--------------------------------------------------------------------------
| Cpanel Users Permissions Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin/users/{users}/permissions', array(
    'as'     => 'admin.users.permissions',
    'uses'   => 'Ecdo\Backend\Controllers\UsersPermissionsController@index',
    'before' => 'auth.backend:users.update'
));

Route::put('admin/users/{users}/permissions', array(
    'uses'   => 'Ecdo\Backend\Controllers\UsersPermissionsController@update',
    'before' => 'auth.backend:users.update'
));


/*
|--------------------------------------------------------------------------
| Cpanel Users Throttling Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin/users/{user}/throttling', array(
    'as'     => 'admin.users.throttling',
    'uses'   => 'Ecdo\Backend\Controllers\UsersThrottlingController@getStatus',
    'before' => 'auth.backend:users.view'
));

Route::put('admin/users/{user}/throttling/{action}', array(
    'as'     => 'admin.users.throttling.update',
    'uses'   => 'Ecdo\Backend\Controllers\UsersThrottlingController@putStatus',
    'before' => 'auth.backend:users.update'
));

/*
|--------------------------------------------------------------------------
| Cpanel Groups Permissions Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin/groups/{groups}/permissions', array(
    'as'     => 'admin.groups.permissions',
    'uses'   => 'Ecdo\Backend\Controllers\GroupsPermissionsController@index',
    'before' => 'auth.backend:groups.update'
));

Route::put('admin/groups/{groups}/permissions', array(
    'uses'   => 'Ecdo\Backend\Controllers\GroupsPermissionsController@update',
    'before' => 'auth.backend:groups.update'
));


/*
|--------------------------------------------------------------------------
| Cpanel Login/Logout/Register Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin/login', array(
    'as'   => 'admin.login',
    'uses' => 'Ecdo\Backend\Controllers\CpanelController@getLogin'
));

Route::post('admin/login', 'Ecdo\Backend\Controllers\CpanelController@postLogin');

Route::get('admin/logout', array(
    'as'   => 'admin.logout',
    'uses' => 'Ecdo\Backend\Controllers\CpanelController@getLogout'
));

Route::get('admin/register', array(
    'as'   => 'admin.register',
    'uses' => 'Ecdo\Backend\Controllers\CpanelController@getRegister'
));

Route::post('admin/register', 'Ecdo\Backend\Controllers\CpanelController@postRegister');


/*
|--------------------------------------------------------------------------
| Admin auth filter
|--------------------------------------------------------------------------
| You need to give your routes a name before using this filter.
| I assume you are using resource. so the route for the UsersController index method
| will be admin.users.index then the filter will look for permission on users.view
| You can provide your own rule by passing a argument to the filter
|
*/
Route::filter('auth.backend', function ($route, $request, $userRule = NULL)
{
    if (!Sentry::check())
    {
        Session::put('url.intended', URL::full());

        return Redirect::route('admin.login');
    }

    // no special route name passed, use the current name route
    if (is_null($userRule))
    {
        list($prefix, $module, $rule) = explode('.', Route::currentRouteName());
        switch ($rule)
        {
            case 'index':
            case 'show':
                $userRule = $module . '.view';
                break;
            case 'create':
            case 'store':
                $userRule = $module . '.create';
                break;
            case 'edit':
            case 'update':
                $userRule = $module . '.update';
                break;
            case 'destroy':
                $userRule = $module . '.delete';
                break;
            default:
                $userRule = Route::currentRouteName();
                break;
        }
    }
    // no access to the request page and request page not the root admin page
    if (!Sentry::hasAccess($userRule) and $userRule !== 'admin.view')
    {
        return Redirect::to('admin')->with('error', Lang::get('backend::permissions.access_denied'));
    } // no access to the request page and request page is the root admin page
    else if (!Sentry::hasAccess($userRule) and $userRule === 'admin.view')
    {
        //can't see the admin home page go back to home site page
        return Redirect::to('/')->with('error', Lang::get('backend::permissions.access_denied'));
    }

});
