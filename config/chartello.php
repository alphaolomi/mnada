<?php

return [
    'path' => env('CHARTELLO_PATH', 'analytics'),

    'middleware' => [
        'web',
        App\Http\Middleware\ProtectChartello::class,
        Chartello\Http\Middleware\HandleInertiaRequests::class,
    ],

    'autocompletion' => [
        'enabled' => true,
    ],
];
