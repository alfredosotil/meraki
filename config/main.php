<?php
$config = [
    'id' => 'main',
    'defaultRoute' => 'site/index',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'controllerMap' => [
                'cms' => 'yii2mod\cms\controllers\ManageController',
                'comments' => 'yii2mod\comments\controllers\ManageController',
            ],
            'modules' => [
                'rbac' => [
                    'class' => 'yii2mod\rbac\Module',
                ],
                'settings-storage' => [
                    'class' => 'yii2mod\settings\Module',
                ],
            ],
        ],
        'cms' => [
            'class' => 'yii2mod\cms\Module',
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
    ],
    'components' => [
        'settings' => [
            'class' => 'yii2mod\settings\components\Settings',
        ],
        'request' => [
            'cookieValidationKey' => 'fYPq2eLM',
        ],
        'user' => [
            'identityClass' => 'app\models\UserModel',
            'enableAutoLogin' => true,
            'on afterLogin' => function ($event) {
                $event->identity->updateLastLogin();
            },
        ],
        'cart' => [
            'class' => 'yii2mod\cart\Cart',
            // you can change default storage class as following:
            'storageClass' => [
                'class' => 'yii2mod\cart\storage\DatabaseStorage',
                // you can also override some properties 
                'deleteIfEmpty' => true
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
//            'suffix' => '.html',
            'rules' => [
                'gii' => 'gii',
                'gii/<controller:\w+>' => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                ['class' => 'yii2mod\cms\components\PageUrlRule'],
            ],
        ],
    ],
];

return $config;
