<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => '/admin',
        ],
        'urlManager' => [
//            'class' => 'yii\web\urlManager',
//            'baseUrl' => 'http://theatre.dev/admin/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'urlFormat' => 'path',
//            'urlSuffix' => '/',
//            'useStrictParsing' => true,
            'rules' => [
//                'get-on-time/<id:\d+>' => 'admin/session/getOnTime'
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>/<time:>' => '<controller>/<action>',

            ]
        ],

    ],
    'params' => $params,
];
