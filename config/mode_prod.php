<?php
return [
    'yiiDebug' => true,
    'yiiEnv' => 'test',
    'web' => [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=srv-db-plesk13.ps.kz:3306;dbname=kunbalak_test',
                'username' => 'kunba_wfwdave',
                'password' => 'my5Tu0!2',
                'enableSchemaCache' => false,
                'schemaCacheDuration' => 86400
            ],
            'cache' => [
                'class' => 'yii\caching\DummyCache',
            ],
        ],
    ],
    'console' => [
        'components' => [
            'db' => [
                'class' => '\yii\db\Connection',
                'dsn' => 'mysql:host=srv-db-plesk13.ps.kz:3306;dbname=kunbalak_test',
                'username' => 'kunba_wfwdave',
                'password' => 'my5Tu0!2',
                'enableSchemaCache' => false,
                'schemaCacheDuration' => 86400
            ],
        ],
    ]
];
