<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [

        'super_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'sub_categories' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'roles'=>'c,r,u,d',
            'settings'=>'c,r,u,d',
//            'donations' => 'c,r,u,d',
//            'consultation_requests' => 'c,r,u,d',
//            'serviceItem' => 'c,r,u,d',
//            'advertisement' => 'c,r,u,d',
//            'advertisementItem' => 'c,r,u,d',
            'blood_donations' => 'c,r,u,d',
            'classifications' => 'c,r,u,d',
            'trusted_requests' => 'c,r,u,d',
            'WhoAreWe' => 'c,r,u,d',
            'contact_us' => 'c,r,u,d',
            'team_works' => 'c,r,u,d',
            'visitor_messages' => 'c,r,u,d',
            'dashboard' => 'c,r,u,d',
            'UserDetails' => 'c,r,u,d',
            'print' => 'c,r,u,d',
            'health_status' => 'c,r,u,d',

        ],

        'admin' => [
            'UserDetails' => 'c,r,u,d',
            'blood_donations' => 'c,r,u,d',
            'health_status' => 'c,r,u,d',

        ],

        'user' => [
            'UserDetails' => 'c,r,u,d',
            'blood_donations' => 'c,r,u,d',
            'health_status' => 'c,r,u,d',

        ],

    ],
//    'permission_structure'=>[
//
//    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
