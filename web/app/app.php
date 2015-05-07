<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: app.php
 * Description: 
 * This is a router for the application
 */
 
/**
 * Route to main index
 */
$app->get('/', function() use ($app) {
	echo $app->render('index/index');
});



/**
 * Not found handler
 */
$app->notFound(function() use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
	echo $app->render('errors/404');
});