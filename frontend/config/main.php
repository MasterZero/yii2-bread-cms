<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'page' => [
            'class' => 'frontend\modules\page\Module',
            'name' => 'Страницы',
            //'defaultRoute' => 'page',
            // ... другие настройки модуля ...
        ],

        'news' => [
            'class' => 'frontend\modules\news\Module',
            'name' => 'Новости',
        ],

        'container' => [
            'class' => 'frontend\modules\container\Module',
            'name' => 'Контейнер',
        ],

        'set' => [
            'class' => 'frontend\modules\set\Module',
            'name' => 'Настройки',
        ],
        'seo' => [
            'class' => 'frontend\modules\seo\Module',
            'name' => 'SEO',
        ],
        'gallery' => [
            'class' => 'frontend\modules\gallery\Module',
            'name' => 'Галерея',
        ],
    ],
    'components' => [


    
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/page/<url>' => '/page/page/view',
                '/news/<url>' => '/news/news/view',
                '/news' => '/news/news/list',
                '/gallery/<url>' => '/gallery/gallery/view',
                '/gallery' => '/gallery/gallery/list',
            ],
        ],
    ],
    'params' => $params,
];
