<?php
$result = [
    'web' => array(
        'modules' => array(),
        'components' => [
            'assetManager' => [
                'appendTimestamp' => true,
                'bundles' => [
                    'rocketfirm\engine\assets\AppAsset' => [
                        'packages' => ['main', 'vendor']
                    ],
                ],
            ],
            'request' => [
                'class' => 'mtemplate\mclasses\MBTRequest'
            ],
            'user' => [
                'loginUrl' => ['/users/default/login'],
            ],
            'urlManager' => [
                //'class' => '\rocketfirm\engine\rocket\RFUrlManager',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'suffix' => '/',
                'rules' => [
                    'content/<id>' => 'content/default/view',
                    [
                        'pattern' => 'sitemap',
                        'route' => 'pages/default/sitemap',
                        'suffix' => '.xml'
                    ],
                    [
                        'pattern' => 'sitemap-pt-post-<year>-<month>',
                        'route' => 'pages/default/sitemap-month',
                        'suffix' => '.xml'
                    ],
                    'sitemap' => 'menu/default/index',
                    'feed' => 'pages/default/yandex-rss',
                    '/' => 'basepage/default/index',
                    'search' => 'search/default/index',
                    'gallery/view/<id>' => 'gallery/default/view',
                    'noimage/<wh>' => 'pages/default/no-image',
                    [
                        'pattern' => '<category>/<sefname>',
                        'route' => 'pages/default/index',
                        'suffix' => '.html'
                    ],
                    [
                        'pattern' => '<sefname>/<page:\d+>',
                        'route' => 'pages/default/category',
                        'defaults' => ['page' => 1]
                    ],
                    '<sefname>' => 'pages/default/category',
                    '<module>/<action>' => '<module>/default/<action>',
                    '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
                ]
            ],
            'errorHandler' => [
                'errorAction' => 'basepage/default/error',
            ],
            /*'i18n' => [
                'translations' => [
                    '*' => [
                        'class' => 'yii\i18n\DbMessageSource',
                        'on missingTranslation' => [
                            'app\modules\translate\events\MissingTranslationHandler',
                            'handleMissingTranslation'
                        ],
                        'forceTranslation' => false
                    ],
                ],
            ],*/
        ],
        'params' => [
            'yiiEnd' => 'front'
        ],
    ),
];
return $result;
