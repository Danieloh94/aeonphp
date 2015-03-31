<?php 

    return [
        [
            'path' => ['/', 'index'],
            'method' => ['get'],
            'action' => 'IndexAction',
            'params' => ['name, pass'],
            'middleware' => ['\App\Middleware\Logger']
        ]
    ];