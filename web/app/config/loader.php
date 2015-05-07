<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: loader.php
 * Description: 
 * This automatically loads all model classes for database access 
 */

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs(
	array(
		$config->application->modelsDir
	)
)->register();