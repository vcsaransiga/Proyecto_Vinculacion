<?php

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public/profile_photos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/profile_photos'), // Ajuste aquí
            'url' => env('APP_URL') . '/storage/profile_photos', // Ajuste aquí
            'visibility' => 'public',
        ],
        'public/projects' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projects'), // Ajuste aquí
            'url' => env('APP_URL') . '/storage/projects', // Ajuste aquí
            'visibility' => 'public',
        ],
        
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
