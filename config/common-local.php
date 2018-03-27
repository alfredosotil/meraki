<?php

$config = [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=;dbname=meraki_prod',
            'username' => 'root',
            'password' => '',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
    ],
];

return $config;
