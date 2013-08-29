<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

/**
 * Default Administration name
 */
define('ADMIN_NAME', 'root');
/**
 *Default Administration password
 */
define('ADMIN_PASSWORD', 'root1234');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log', 'userLog'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('10.8.4.120','::1'),
            'newFileMode'=>0666,
            'newDirMode'=>0777,
		),

        'admin' => array(),

	),

    'aliases' => array(
        'yiiExtensions' => 'application.extensions',
    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        //component for logging user activity
        'userLog'=> array(
            'class' => 'UserLog',
        ),

        'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
        ),

        'bootstrap' => array(
            'class'=>'application.extensions.bootstrap.components.Bootstrap',
        ),

		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(

                'admin' => 'Site/login',

                'contact' => 'Site/contact',
                'services' => 'Site/services',
                'faq' => 'Site/faq',
                'sitemap' => 'Site/sitemap',

                'gii'=>'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

                '<url:[\w\-]+>' => 'Site/dynamicPageView',

                'admin/faqQuestions'=>'admin/FaqBody',

                //'admin/homePageBanners'=>'admin/HomePageBanners',
                //'admin/homePageBlocks'=>'admin/HomePageBlocks',
                //'admin/bannerButtons'=>'admin/BannerButtons',
                '<controller:\w+>/banner/<bannerId:\d+>/bannerButtons'=>'<controller>/BannerButtons',
                '<controller:\w+>/banner/<bannerId:\d+>/bannerButtons/<action:\w+>'=>'<controller>/BannerButtons/<action>',
                '<controller:\w+>/banner/<bannerId:\d+>/bannerButtons/<action:\w+>/id/<id:\d+>'=>'<controller>/BannerButtons/<action>',


                '<controller:\w+>/<action:\w+>'=>'<admin><controller>/<action>',


                //'<controller:\w+>/services'=>'<controller>/Services',
                //'<controller:\w+>/dynamicPages'=>'<controller>/DynamicPages',

                //'<controller:\w+>/faqCategories'=>'<controller>/FaqCategories',

                //'<controller:\w+>/contactUs'=>'<controller>/ContactUs',
                //'<controller:\w+>/contactUsPageText'=>'<controller>/ContactUsPageText',
                //'<controller:\w+>/inqury'=>'<controller>/Inqury',


                '<controller:\w+>/<action:\w+>'=>'<controller>/Default/<action>',
                '<controller:\w+>/login'=>'<controller>/Default/login',
                'admin/<controller:\w+>'=>'admin/<controller>/index',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
		),

		'db'=>array(
			'connectionString' => 'mysql:host=rabbit.devplatform1.com;dbname=galych_yiiag',
			'emulatePrepare' => true,
			'username' => 'galych',
			'password' => 'afm1qN',
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

    // Event when user change url.Using for UserLog Logging
    'onBeginRequest'=>array('userLog', 'onChangeUrl'),

    // application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    /*
     * adminEmail = Administrator email for Contact Us feedback
     * bannersShowInterval = Interval between change banners on home page in seconds
     *
     * */
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'galych@zfort.com',
        'bannersShowInterval'=> '5000',
    ),
);
