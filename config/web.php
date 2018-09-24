<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/components/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    
    'language'=>'en-US',
    'sourceLanguage' => 'en-US',
    
    'charset' => 'utf-8',
    'name' => 'test.servicecallonline.ca',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'buisness' => [
            'class' => 'app\modules\buisness\Module',
        ],
    ],
    'components' => [
        
        'view' => require(__DIR__ . '/components/view.php'),
        'i18n' => require(__DIR__ . '/components/i18n.php'), 
        
        
//        'i18n' => [
//            'translations' => [
//                'app*' => [
//                    'class' => 'yii\i18n\DbMessageSource',
//                    'sourceLanguage' => 'en',
//                    'forceTranslation'=>true,
//                  
//                    //'basePath' => '@app/messages',
//                    //'sourceLanguage' => 'en-US',
//                    /* 'fileMap' => [
//                        'app' => 'app.php',
//                        'app/error' => 'error.php',
//                    ],*/
//                    'on missingTranslation' => [
//                        '\app\components\YandexTranslation',/* => [
//                            'apiKey' => 'trnsl.1.1.20180829T091450Z.552d72ffdc99179d.5520a5e45b0667b30c96fc1c00d023c02507f48f',
//                        ],*/
//                        'handleMissingTranslation'
//                    ],
//                ],
//         
//            ],
//            
//        ], 
        
        
        
        
       // 'sphinx'  => require(__DIR__ . '/components/sphinx.php'),
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123123123',
            'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => array(
			'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],
		),
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
      //  'db_up' => require __DIR__ . '/db_up.php',
        'urlManager' => array(
			'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
			'rules' => array(
				//'' => 'site/index',
				'login' => 'site/login',
				'logout' => 'site/logout',
                
                '<action:\w+>/<id:\d+>'=>'site/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                
                '<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                
                
                
                
			),
		),
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                        'yii\web\JqueryAsset' => [
                            'js' => [
                               '/libs/jquery/jquery.min.js' 
                            ]
                        ],
                        'yii\bootstrap\BootstrapAsset' => [
                            'css' => [
                                '/libs/bootstrap/css/bootstrap.min.css',
                            ]
                        ],
                        'yii\bootstrap\BootstrapPluginAsset' => [
                            'js' => [
                                '/libs/bootstrap/js/bootstrap.min.js',
                            ]
                        ]
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
