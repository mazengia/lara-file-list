<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
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
        ],
        'sftp' => [
            'driver' => 'sftp',
            'host' => env('10.1.12.110'),
            'username' => env('mtesfa'),
            'password' => env('Pass1234'),
            'privateKey' => '-----BEGIN RSA PRIVATE KEY-----
MIIG4gIBAAKCAYEAxXDGR43F1xLoaJBC3hLC5RECX89Ost5rVTBsefj5vnoms8V2
RoUGWIZrzK3v8u+ALcfdcAIRFrFd4XM4KeDUBaRQ6a8hc8qFowF7SMATfVnVjInW
',
//            'privateKey' => base_path() . '/ssh/myPrivateKey',
            'ROOT' => env('C:/xampp/htdocs/110_bk')

            // Optional SFTP Settings...
            // 'port' => env('SFTP_PORT', 22),
            // 'root' => env('SFTP_ROOT', ''),
            // 'timeout' => 30,
        ],

//        'ftp_destination' => [
//            'driver' => 'sftp',
//            'host' => env('10.1.70.109'),
//            'username' => env('mtesfa'),
//            'password' => env('Pass1234'),
//            'ROOT' => env('C:/Users/user/Desktop/books')
//        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
