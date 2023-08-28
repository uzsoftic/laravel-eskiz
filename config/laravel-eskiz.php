<?php

return [
    // APP CONFIG
    'status' => true,
    'title' => "Eskiz SMS",

    // ROUTE CONFIG
    'middleware' => 'web',
    'route_prefix' => '/eskiz-sms/',

    'admin_middleware' => 'admin',
    'admin_route_prefix' => '/admin/eskiz-sms/panel',

    // API
    'protocol' => 'https://',
    'host' => 'notify.eskiz.uz',
];
