<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/menu.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'name' => 'Bread CMS',
    'modules' => [
        'page' => [
            'class' => 'backend\modules\page\Module',
            'name' => 'Страницы',
            //'defaultRoute' => 'page',
            // ... другие настройки модуля ...
        ],

        'news' => [
            'class' => 'backend\modules\news\Module',
            'name' => 'Новости',
        ],

        'container' => [
            'class' => 'backend\modules\container\Module',
            'name' => 'Контейнер',
        ],

        'set' => [
            'class' => 'backend\modules\set\Module',
            'name' => 'Настройки',
        ],
        'seo' => [
            'class' => 'backend\modules\seo\Module',
            'name' => 'SEO',
        ],
        'gallery' => [
            'class' => 'backend\modules\gallery\Module',
            'name' => 'Галерея',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        /*'errorHandler' => [
        ],*/
        'errorHandler' => [
            'maxSourceLines' => 20,
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
