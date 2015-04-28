<?php

/**
 * Route to main index
 */
$app->get('/', function () use ($app) {
	echo $app->render('index/index');
});

/**
 * Route to thanks page
 */
$app->get('/thanks', function () use ($app) {
	echo $app->render('index/thanks');
});

/**
 * Route to cancel result page
 */
$app->get('/cancel', function () use ($app) {
	echo $app->render('index/cancel');
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
	echo $app->render('errors/404');
});