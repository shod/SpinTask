<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'error' => [
        'type' => 2,
    ],
    'AutoupdateController' => [
        'type' => 2,
    ],
    'guest' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'login',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'logout',
            'error',
            'AutoupdateController',
        ],
    ],
    'superadmin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'admin',
            'guest',
        ],
    ],
];
