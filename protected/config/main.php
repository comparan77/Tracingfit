<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('yiibooster',"/var/www/booster/");
// Yii::import("yiibooster.Test");
// echo Yii::getPathOfAlias('yiibooster');
// $o = new Test;
// echo $o->hi();

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tracingfit',
	'theme'=>'classic',
	// preloading 'log' component
	'preload'=>array(
			'log',
			'booster',
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Azwsxed3#',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'booster'=>array(
			'class'=>'yiibooster.components.Booster',
		),
		"authManager"=>array(
			"class"=>"CDbAuthManager",
			"connectionID"=>"db",
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
	    	
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//),
		
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=usrtestdrive.db.9730666.hostedresource.com;dbname=usrtestdrive',
			'emulatePrepare' => true,
			'username' => 'usrtestdrive',
			'password' => 'Pv!%@#7L',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
	'language'=>'es',
	'sourceLanguage'=>'es',
	'charset'=>'utf-8',
);
