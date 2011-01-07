<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'BugTracker by gnysek',
	'language'=>'pl',
	'defaultController'=>'Bugi',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.extensions.yiidebugtb.*',
	),

	'modules' => array(
		'user'=>array(
//			'tableUsers' => 'tbl_users',
//			'tableProfiles' => 'tbl_profiles',
//			'tableProfileFields' => 'tbl_profiles_fields'
		),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'magia',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
//			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
		),
		'cache' => array(
			'class'=>'CDbCache',
		),
		'db' => array(
			'class'=>'system.db.CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=ytracker',
			'schemaCachingDuration' => 3600,
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					//'class'=>'CWebLogRoute',
					'class' => 'XWebDebugRouter',
					'config' => 'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
					'levels' => 'error, warning, trace, profile, info',
					'allowedIPs' => array('127.0.0.1'),
				),*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);