<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: services.php
 * Description: 
 * Initializes configuration of application services
 * 
 * Sets up view settings for compiled files, their extensions and paths, 
 * generates URLs, and assigns database configuration
 */
use Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\DI\FactoryDefault,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\View\Engine\Volt;

$di = new FactoryDefault();

/**
 * Sets the view component
 * 
 * @return html
 */
$di['view'] = function() use ($config) {
	$view = new View();

	$view->setViewsDir($config->application->viewsDir);

	$view->registerEngines(array(
		'.volt' => function($view, $di) use ($config) {
			$volt = new Volt($view, $di);
			$volt->setOptions(
				array(
					'compiledPath'      => __DIR__ . '/../cache/volt/',
					'compiledExtension' => '.php',
					'compiledSeparator' => '_',
					//'compileAlways'     => true
				)
			);
			return $volt;
		}
	));

	return $view;
};

/**
 * The URL component is used to generate all kind of urls in the application
 *
 * @return URL string
 */
$di['url'] = function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
};

/**
 * Database connection is created based in the parameters defined in the configuration file
 *
 * @return object
 */
$di['db'] = function() use ($config) {
	return new DbAdapter(array(
		"host" => $config->database->host,
		"username" => $config->database->username,
		"password" => $config->database->password,
		"dbname" => $config->database->dbname
	));
};
