<?php
// First load configuration settings
require "../app/library/Config.php";
$config = new \Phalcon\Config($settings);

try {
	// Register an autoloader
	$loader = new \Phalcon\Loader();
	$loader->registerDirs(array(
		'../app/controllers/',
		'../app/library/',
		'../app/models/'
	))->register();
	
	// Instantiate the Dependency Injector
	$di = new Phalcon\DI\FactoryDefault();
	
	 
	// Register the events manager
	
	$di->set('dispatcher', function() use ($di) {
		$eventsManager = new Phalcon\Events\Manager();
		/**
		 * Check if the user is allowed to access certain action using the SecurityPlugin
		 */
		$eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);
		/**
		 * Handle exceptions and not-found exceptions using NotFoundPlugin
		 */
		$eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);
		$dispatcher = new Phalcon\Mvc\Dispatcher();
		$dispatcher->setEventsManager($eventsManager);
		return $dispatcher;
	});
	
	// Setup the database service
	$di->set('db', function() use ($config) {

		return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
			"host" => $config->database->host,
			"username" => $config->database->username,
			"password" => $config->database->password,
			"dbname" => $config->database->dbname
		));
	});
	
	//Register volt as a service
	$di->set('voltService', function($view, $di) {

		$volt = new Phalcon\Mvc\View\Engine\Volt($view, $di);

		$volt->setOptions(array(
			"compileAlways" => true,
			"compiledPath" => "../app/views/compiled/",
			"compiledExtension" => ".comp"
		));

		return $volt;
	});
	//Setup the view component
	$di->set('view', function(){
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir('../app/views/');
		$view->registerEngines(array(
			//".phtml" => 'Phalcon\Mvc\View\Engine\Volt'
			".phtml" => 'voltService'
		));
		return $view;
	});
	
	//Setup a base URI 
	$di->set('url', function() use ($config) {
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUri($config->baseUri);
		return $url;
	});

	
	//Start the session when requested
	$di->set('session', function() {
		$session = new \Phalcon\Session\Adapter\Files();
		$session->start();
		return $session;
	});

	
	//Register the flash service with custom CSS classes
	$di->set('flash', function(){
		return new Phalcon\Flash\Session(array(
			'error'   => 'alert alert-danger',
			'success' => 'alert alert-success',
			'notice'  => 'alert alert-info',
		));
	}); 
    
    //Set encryption work factor  
    $di->set('security', function(){
        $security = new Phalcon\Security();
        //Set the password hashing factor to 10 rounds
        $security->setWorkFactor(10);
        return $security;
        }, true);
        
	//Register a user menu component
	$di->set('elements', function(){
		return new Elements();
	});
	
	//Handle the request
	$application = new \Phalcon\Mvc\Application($di);
	echo $application->handle()->getContent();
	
} catch(\Phalcon\Exception $e) {
	$errorMessage = "<p class=\"alert\">Phalcon Exception: </p>". $e->getMessage();
	include 'error.php';    
    $logger = new \Phalcon\Logger\Adapter\File('../app/logs/'.date('Ymd').'.log', array(
        'mode' => 'a+'
    ));
    $logger->error(get_class($e). '['.$e->getCode().']: '. $e->getMessage());
    $logger->info($e->getFile().'['.$e->getLine().']');
    $logger->debug("Trace: \n".$e->getTraceAsString()."\n");
    $logger->close();
}