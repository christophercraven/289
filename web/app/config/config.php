<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: config.php
 * Description: 
 *
 * Configuration settings for common directories
 *
 */
return new \Phalcon\Config(array(
	'application' => array(
		'modelsDir'      => __DIR__ . '/../app/models/',
		'viewsDir'      => __DIR__ . '/../app/views/',
		'baseUri'        => '/289/',
	)
));

