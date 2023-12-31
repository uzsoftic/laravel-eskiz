<?php

return [
    // APP CONFIG
    'status' => true,
    'title' => "Eskiz SMS",

    // ROUTE CONFIG
    'middleware' => 'web',
    'route_prefix' => '/eskizsms/',

    'admin_middleware' => 'web',
    'admin_route_prefix' => '/admin/eskizsms/',

    // API
    'protocol' => 'https://',
    'host' => 'notify.eskiz.uz',
    'callback_url' => 'eskizsms.callback',
    'default_sender' => '4546',
];
