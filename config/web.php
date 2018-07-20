<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'en-EN',
    'charset' => 'utf-8',
    'name' => 'OLG.BY',
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
        'sphinx'  => require(__DIR__ . '/components/sphinx.php'),
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
         /* 'defaultRoles' => [
                'main',
                'admin',
                'simple',
                'order',
                'editor',
                'article',
                'billing',
                'card',
                'crm',
                ],*/
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
