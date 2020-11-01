<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'title' => 'Larabook',
    'component_layout' => 'larabook::layouts.component',
    'storage' => [
        'driver' => 'local',
        'directory' => 'documentation',
    ],
    'routes' => [
        'alias' => 'documentation.',
        'prefix' => 'documentation',
        'middleware' => ['web'],
    ],
    'cache' => [
        'enabled' => false,
        'key' => 'documentation_components',
    ],
    'session' => [
        'component_props_key' => 'larabook::current_component'
    ]
];
