<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'name' => 'Format Pantau WKP',
    'basePath' => dirname(__DIR__),
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'admins' => ['admin'],
                        'modelMap' => [
                             'RegistrationForm' => 'backend\models\RegistrationForm',
                            ],
                         'controllerMap' => [
                            'assign' => 'backend\controllers\UserController'
                        ]
			],
            'gridview' =>  [
                        'class' => '\kartik\grid\Module'
                        // enter optional module parameters below - only if you need to  
                        // use your own export download action or custom translation 
                        // message source
                        // 'downloadAction' => 'gridview/export/download',
                        // 'i18n' => []
                    ],
			'admin' => [
			'class' => 'mdm\admin\Module',
			'layout' => 'top-menu',
        ],
		'gridview' => [
          'class' => '\kartik\grid\Module',
          // see settings on http://demos.krajee.com/grid#module
		],
		'datecontrol' => [
          'class' => '\kartik\datecontrol\Module',
          // see settings on http://demos.krajee.com/datecontrol#module
		],
      // If you use tree table
		'treemanager' =>  [
          'class' => '\kartik\tree\Module',
          // see settings on http://demos.krajee.com/tree-manager#module
      ],
		'noty' => [
			'class' => 'lo\modules\noty\Module',
		]
		
		
		],
    'components' => [
		'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
		],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                    '@dektrium/user/views/assign' => '@app/views/user',
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@app/mailer',
			'useFileTransport' => false,
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => 'deril.alwinda@gmail.com',
				'password' => 'chasingdream',
				'port' => '587',
				'encryption' => 'tls',
			],
		],
        /* 'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ], */
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
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=pabum',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'i18n' => [
            'translations' => [
                'rbac-admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@mdm/admin/messages'
                ]
            ]
        ]
		
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
