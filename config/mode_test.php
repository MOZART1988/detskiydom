<?php
return [
    'yiiDebug' => true,
    'yiiEnv' => 'test',
    'web' => [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=db_backapp',
                'username' => 'db_backapp',
                'password' => 'RU7bXJehIafUCwx7',
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
                'dsn' => 'mysql:host=localhost;dbname=db_backapp',
                'username' => 'db_backapp',
                'password' => 'RU7bXJehIafUCwx7',
                'enableSchemaCache' => false,
                'schemaCacheDuration' => 86400
            ],
        ],
    ]
];
