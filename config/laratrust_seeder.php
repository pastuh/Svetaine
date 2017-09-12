<?php

return [
    'role_structure' => [
        'superadministrator' => [
            /* Leidimas kurti ir redaguoti userius */
            'users' => 'c,r,u,d',
            /* Leidimas kurti ir redaguoti leidimus, teises */
            'acl' => 'c,r,u,d',
            /* Leidimas redaguoti profili */
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'editor' => [
            'profile' => 'r,u'
        ],
        'author' => [
            'profile' => 'r,u'
        ],
        'contributor' => [
            'profile' => 'r,u'
        ],
        'supporter' => [
            'profile' => 'r,u'
        ],
        'member' => [
            'profile' => 'r,u'
        ],
        'lurker' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];