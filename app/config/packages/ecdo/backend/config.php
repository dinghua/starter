<?php

return array(

    'site_config' => array(
        'site_name'   => '后台管理系统',
        'title'       => '后台管理系统',
        'description' => '后台管理系统',
        'copyright'   => '赤兔网络'
    ),

    //menu 2 type are available single or dropdown and it must be a route
    'menu'        => array(
        Lang::get('backend::common.dashboard') => array( 'type' => 'single', 'route' => 'admin.home', 'rule' => 'admin.view', 'icon'=>'icon-speedometer' ),
        Lang::get('backend::common.users')     => array( 'type' => 'dropdown','icon'=>'icon-user', 'links' => array(
            Lang::get('backend::common.manage_users') => array( 'route' => 'admin.users.index', 'rule' => 'users.view'),
            Lang::get('backend::common.groups')       => array( 'route' => 'admin.groups.index', 'rule' => 'groups.view' ),
            Lang::get('backend::common.permissions')  => array( 'route' => 'admin.permissions.index', 'rule' => 'permissions.view' )
        ) ),
    ),

    'views'       => array(

        'layout'             => 'layouts.backend',
        'layout_page'        => 'layouts.page',

        'dashboard'          => 'admin.dashboard.index',
        'login'              => 'admin.login',
        'register'           => 'backend::dashboard.register',

        // Users views
        'users_index'        => 'admin.users.index',
        'users_show'         => 'admin.users.show',
        'users_edit'         => 'admin.users.edit',
        'users_create'       => 'admin.users.create',
        'users_permission'   => 'admin.users.permission',

        //Groups Views
        'groups_index'       => 'admin.groups.index',
        'groups_create'      => 'admin.groups.create',
        'groups_edit'        => 'admin.groups.edit',
        'groups_permission'  => 'admin.groups.permission',

        //Permissions Views
        'permissions_index'  => 'admin.permissions.index',
        'permissions_edit'   => 'admin.permissions.edit',
        'permissions_create' => 'admin.permissions.create',

        //Throttling Views
        'throttle_status'    => 'backend::throttle.index',
    ),

    'validation'  => array(
        'user'       => 'Ecdo\Backend\Services\Validators\Users\Validator',
        'permission' => 'Ecdo\Backend\Services\Validators\Permissions\Validator',
    ),
);
