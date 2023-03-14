<?php

view()->composer('cms::backend.includes.main_menu', function($view){

    //dashboard
    app()->make('CMS')->asideMenu([
        'header'     => __('cms::base.rout_start.dashboard'),
        'label'      => __('cms::base.rout_start.dashboard'),
        'link'       => route('cms::dashboard'),
        'icon_class' => 'icon-screen-desktop',
        'ordering'   => 0
    ]);

    //users
    $items = [];
    foreach(config('custom.users_type') as $key => $user)
    {
        $items[] = [
            'label'  => __('cms::base.rout_start.users.types.'.$user),
            'link'   => route('cms::users', ['type' => strtolower($user)]),
        ];
    }

    app()->make('CMS')->asideMenu([
        'header'     => __('cms::base.rout_start.users.label'),
        'label'      => __('cms::base.rout_start.users.label'),
        'link'       => '',
        'icon_class' => 'icon-user',
        'ordering'   => 1,
        'items'      => $items
    ]);

    //agencies
    $agencies = [];
    foreach(config('custom.agencies_type') as $key => $agenci)
    {
        $agencies[] = [
            'label'  => __('cms::base.rout_start.agencies.agencies_types.'.$agenci),
            'link'   => route('cms::agencies', ['agencies_type' => strtolower($agenci)]),
        ];
    }

    app()->make('CMS')->asideMenu([
        'header'     => __('cms::base.rout_start.agencies.label'),
        'label'      => __('cms::base.rout_start.agencies.label'),
        'link'       => '',
        'icon_class' => 'icon-list',
        'ordering'   => 1,
        'items'      => $agencies
    ]);

    //categories
    app()->make('CMS')->asideMenu([
        'header'     => __('cms::base.rout_start.categories.label'),
        'label'      => __('cms::base.rout_start.categories.label'),
        'link'       => route('cms::categories'),
        'icon_class' => 'icon-list',
        'ordering'   => 1,
    ]);

    //units
    app()->make('CMS')->asideMenu([
        'header'     => __('cms::base.rout_start.units.label'),
        'label'      => __('cms::base.rout_start.units.label'),
        'link'       => route('cms::units'),
        'icon_class' => 'icon-list',
        'ordering'   => 1,
    ]);
});
