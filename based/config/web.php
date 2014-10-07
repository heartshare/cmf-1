<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'pbrCfBk0ZjXzuV6c2VSRg0aEBoTk7XkC',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'sourceLanguage' => 'ru-RU',
                    'class' => 'yii\i18n\DbMessageSource',
                    'messageTable' => '{{%i18n_message}}',
                    'sourceMessageTable' => '{{%i18n_source}}',
                    'enableCaching' => YII_DEBUG ? false : true,
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
        ],
        /*
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        */
        'cache' => [
            'class' => '\yii\caching\MemCache',
            'servers' => [
                [
                    'host' => 'localhost',
                    'port' => 11211,
                    'weight' => 1,
                    'persistent' => true,
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, // @runtime/mail/
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error', 'warning'],
                    'message' => [
                        'to' => [
                            'webmaster@d7.home',
                        ],
                        [
                            'from' => 'logging@d7.home',
                        ],
                        'subject' => 'Logging',
                    ],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => require(__DIR__ . '/params.php'),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => [
            '127.0.0.1',
            '::1',
            '192.168.100.1',
        ],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => [
            '127.0.0.1',
            '::1',
            '192.168.100.1',
        ],
    ];
}

return $config;
