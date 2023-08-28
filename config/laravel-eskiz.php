<?php

return [
    // APP CONFIG
    'status' => true,
    'title' => "Eskiz SMS",

    // ROUTE CONFIG
    'admin_middleware' => 'auth',
    'admin_route' => '/admin/eskiz-sms/panel',

    // API
    'protocol' => 'https://',
    'host' => 'notify.eskiz.uz',
];
