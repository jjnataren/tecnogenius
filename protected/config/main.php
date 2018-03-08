<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Nukleus',
	'theme'=>'bootstrap',
	'language'=>'es',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		
		'application.models.*',
		'application.components.*',
		'application.extensions.yiichat.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
				
		
	),
		'aliases' => array(
				//If you used composer your path should be
				//	'xupload' => 'ext.vendor.asgaroth.xupload',
				//If you manually installed it
				'xupload' => 'ext.xupload'
		),

	'modules'=>array(
		// uncomment theme following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'natax621',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			
				'generatorPaths'=>array(
						'bootstrap.gii',
				),
		),
	 'user'=>array(
          
        ),
			
			
			
	),

		
		'controllerMap'=>array(
				'YiiFeedWidget' => 'ext.yii-feed-widget.YiiFeedWidgetController'
		),
		
	// application components
	'components'=>array(
	
	'googleAnalytics' => array(
			'class' =>'ext.TPGoogleAnalytics.components.TPGoogleAnalytics',
			'account' => 'UA-52872306-1',
			'autoRender' => true,
			'autoPageview'=>true
	),
			
	
			'facebook'=>array(
					'class' => 'ext.yii-facebook-opengraph.SFacebook',
					'appId'=>'710409045715323', // needed for JS SDK, Social Plugins and PHP SDK
					'secret'=>'f462d0ccc5e45cabd64ae80ac8e55acb', // needed for the PHP SDK
					//'fileUpload'=>false, // needed to support API POST requests which send files
					//'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
					//'locale'=>'en_US', // override locale setting (defaults to en_US)
					//'jsSdk'=>true, // don't include JS SDK
					//'async'=>true, // load JS SDK asynchronously
					//'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
					//'status'=>true, // JS SDK - check login status
					'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
					//'oauth'=>true,  // JS SDK - enable OAuth 2.0
					//'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
					//'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
					//'html5'=>true,  // use html5 Social Plugins instead of XFBML
					'ogTags'=>array(  // set default OG tags
							'og:title'=>'Nukleus',
							'og:description'=>'Cursos Java',
							//'og:image'=>'URL_TO_WEBSITE_LOGO',
					),
			),
			
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
			//'loginUrl' => array('/user/user/login'),
			//'class' => 'User',
			//'class' => 'WebUser',
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
		),
		
		'User'=>array(
				'class' => 'WebUser',
		),
		
		'widgetFactory' => array(
				'widgets' => array(
						
						'CJuiDatePicker' => array(
								'themeUrl' => 'css/jqueryui',
								'theme' => 'overcast',
						),
				),),
				
			
		
	'bootstrap'=>array(
					'class'=>'bootstrap.components.Bootstrap',
	),
		// uncomment the following to enable URLs in path-format
		
			'urlManager'=>array(
					'urlFormat'=>'path',
					'showScriptName'=>false,
					'caseSensitive'=>true,
					'rules'=>array(
							''=>'site/index',
							'/cursos/<tech>/<id>/<name>'=>array('course/detail', 'urlSuffix'=>'.html', ),
							'/cursos/<id>/<tech>'=>array('site/courseIndex', 'urlSuffix'=>'.html', ),
							'/cursos/top-cursos'=>array('site/topCourses', 'urlSuffix'=>'.html', ),//'site/topCourses',
							'/tutoriales/top-tutoriales'=>array('site/topTuto', 'urlSuffix'=>'.html', ),//'site/topCourses',
							'/tutoriales/<id>/<tech>'=>array('site/tutoIndex', 'urlSuffix'=>'.html', ),
							'/tutoriales/<tech>/<id>/<name>'=>array('tutorial/detail', 'urlSuffix'=>'.html', ),
							'/metodologia'=>array('site/topMethodology','urlSuffix'=>'.html', ),
							'/busqueda'=>array('site/search' ),
							'/contacto'=>array('site/contact', 'urlSuffix'=>'.html', ),
							//'/cursos'=>'site/courseIndex',
							//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
							//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
					),
			),
			
			
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
	
		
	
		'db'=>array(
			'connectionString' => 'mysql:host=127.6.210.130;dbname=nukleus',
			'emulatePrepare' => true,
			'username' => 'adminHmPQMjd',
			'password' => 'iEM1tBM3kVCk',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),		
		/*'db'=>array(
				'connectionString' => 'mysql:host=mysql.hostinger.es;dbname=u786040783_mento',
				'emulatePrepare' => true,
				'username' => 'u786040783_natax',
				'password' => 'natax621',
				'charset' => 'utf8',
				'tablePrefix' => 'tbl_',
		),*/
		
		'phpThumb'=>array(
				'class'=>'ext.EPhpThumb.EPhpThumb',
				'options'=>array()
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
				
		//		array(
			//		'class'=>'CWebLogRoute',
		//		),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
			//administrator email
			'adminEmail'=>'informes@tecnogenius.mx',
			//rssfeed url
			'rssNews'=>'http://www.20minutos.com.mx/rss/tecnologia/',
			//face book page
			'fbpage'=>'https://www.facebook.com/Tecnogenius/',
			//twiter account
			'twpage'=>'',
			//phone, could be with an ext 
			'line'=>array('main'=>'(0155) 55330565',  'office2'=>'(0155) 55330566'),
			//mobile phone
			'mobile'=>'(04455) 23589790',
			//Address
			'company_address'=>'',
			//Address google maps
			//Latitude
			'maps_latitude'=>'19.4253796',
			//Longitude
			'maps_longitude'=>'-99.1661029',
			
	),
);