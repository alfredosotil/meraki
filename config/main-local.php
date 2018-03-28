<?php
$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'l6FRyzoFjteovrmETiiemUe-IP4PdcKy',
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'writeCallback' => function($session) {
                return [
                    'user_id' => Yii::$app->user->id
                ];
            }
        // 'db' => 'mydb',  // the application component ID of the DB connection. Defaults to 'db'.
        // 'sessionTable' => 'my_session', // session table name. Defaults to 'session'.
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
