<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'bsVersion' => '4.x', // this will set globally `bsVersion` to Bootstrap 4.x for all Krajee Extensions
    'hail812/yii2-adminlte3' => [
        'pluginMap' => [
            'icheck-bootstrap' => [
                'css' => 'icheck-bootstrap/icheck-bootstrap.min.css',
            ],
            'overlayScrollbars' => [
                'css' => 'overlayScrollbars/css/OverlayScrollbars.min.css',
                'js' => 'overlayScrollbars/js/jquery.overlayScrollbars.min.js',
            ],
            'pace' => [
                // 'css' => 'pace-progress/themes/purple/pace-theme-center-simple.css',
                'css' => 'pace-progress/themes/purple/pace-theme-minimal.css',
                // 'css' => 'pace-progress/themes/pink/pace-theme-center-simple.css',
                // 'css' => 'pace-progress/themes/green/pace-theme-corner-indicator.css',
                'js' => 'pace-progress/pace.min.js'
            ],
            'popper' => [
                'js' => 'popper/umd/popper.min.js'
            ],
            'sweetalert2' => [
                'css' => 'sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
                'js' => 'sweetalert2/sweetalert2.min.js'
            ],
            'toastr' => [
                'css' => ['toastr/toastr.min.css'],
                'js' => ['toastr/toastr.min.js']
            ],
            'chart.js' => [
                'css' => 'chart.js/Chart.min.css',
                'js' => 'chart.js/Chart.min.js'
            ],
            'daterangepicker' => [
                'css' => 'daterangepicker/daterangepicker.css',
                'js' => 'daterangepicker/daterangepicker.js'
            ]
        ]
    ],
    'conLive' => [
        'user' => 'kppnpkuc_uin_psiko',
        'pass' => 'kelasXITI2',
        'db' => 'kppnpkuc_uin_psiko',
        'host' => 'localhost'
    ],
    'conDev' => [
        'user' => 'root',
        'pass' => '',
        'db' => 'uin-psiko',
        'host' => 'localhost'
    ]
];
