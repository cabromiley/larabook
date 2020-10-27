<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'storage' => [
        'driver' => 'local',
        'directory' => 'documentation',
    ],
    'routes' => [
        'alias' => 'documentation.',
        'prefix' => 'documentation',
        'middleware' => [],
    ],
    'cache' => [
        'enabled' => false,
        'key' => 'documentation_components',
    ]
];
