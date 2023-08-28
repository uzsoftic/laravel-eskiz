<?php

return [
    // APP CONFIG
    'status' => true,
    'title' => "Eskiz SMS",

    // ROUTE CONFIG
    'middleware' => 'web',
    'route_prefix' => '/eskizsms/',

    'admin_middleware' => 'admin',
    'admin_route_prefix' => '/admin/eskizsms/',

    // API
    'protocol' => 'https://',
    'host' => 'notify.eskiz.uz',
];
