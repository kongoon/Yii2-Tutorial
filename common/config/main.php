<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'paypal' => [
            'class' => 'kongoon\yii2\paypal\Paypal',
            'clientId' => 'Ae6YKLlrkOnGIDoWUfXprcsy6XFLtJ_b0uZa3dGsP68LXLgs6JUH9OHDA0q3BxQVXxfeO-cK8gbK1si-',
            'clientSecret' => 'EIKd85rnAgQBcjThn2VjwnVJezbp9busKhhmfILAgZnY7aKyjrLExsYGh3nmIU2QGep7-RASW7fYxcr8',
            'isProduction' => false,
            // This is config file for the PayPal system
            'config' => [
                'http.ConnectionTimeOut' => 30,
                'http.Retry' => 1,
                'mode' => 'sandbox', // development (sandbox) or production (live) mode
                'log.LogEnabled' => YII_DEBUG ? 1 : 0,
                //'log.FileName'           => '@runtime/logs/paypal.log',
                'log.LogLevel' => 'FINE',
            ]
        ],
    ],
];
