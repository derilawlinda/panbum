<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'modules' => [
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
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
			'admin/*',
			'debug/*'
           
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'components' => [
		
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
		],
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=pabum',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]
    ],
];
