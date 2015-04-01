<?php

return array(

    'site_config' => array(
        'site_name'   => 'Backend',
        'title'       => 'Backend for Laravel 4',
        'description' => 'Laravel 4 Admin Panel'
    ),

    //menu 2 type are available single or dropdown and it must be a route
    'menu' => array(
        Lang::get('backend::common.dashboard') => array('type' => 'single', 'route' => 'admin.home', 'rule'=>'admin.view'),
        Lang::get('backend::common.users')     => array('type' => 'dropdown', 'links' => array(
            Lang::get('backend::common.manage_users') => array('route' => 'admin.users.index', 'rule'=> 'users.view'),
            Lang::get('backend::common.groups')       => array('route' => 'admin.groups.index', 'rule'=> 'groups.view'),
            Lang::get('backend::common.permissions')  => array('route' => 'admin.permissions.index', 'rule'=> 'permissions.view')
        )),
    ),

    'views' => array(

        'layout' => 'backend::layouts',

        'dashboard' => 'backend::dashboard.index',
        'login'     => 'backend::dashboard.login',
        'register'  => 'backend::dashboard.register',

        // Users views
        'users_index'      => 'backend::users.index',
        'users_show'       => 'backend::users.show',
        'users_edit'       => 'backend::users.edit',
        'users_create'     => 'backend::users.create',
        'users_permission' => 'backend::users.permission',

        //Groups Views
        'groups_index'      => 'backend::groups.index',
        'groups_create'     => 'backend::groups.create',
        'groups_edit'       => 'backend::groups.edit',
        'groups_permission' => 'backend::groups.permission',

        //Permissions Views
        'permissions_index'  => 'backend::permissions.index',
        'permissions_edit'   => 'backend::permissions.edit',
        'permissions_create' => 'backend::permissions.create',

        //Throttling Views
        'throttle_status' => 'backend::throttle.index',
    ),

    'validation' => array(
        'user'       => 'Ecdo\Backend\Services\Validators\Users\Validator',
        'permission' => 'Ecdo\Backend\Services\Validators\Permissions\Validator',
    ),
);
