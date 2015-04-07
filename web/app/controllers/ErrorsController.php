<?php
class ErrorsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Oops!');
        parent::initialize();
    		$eventsManager = new Phalcon\Events\Manager();
            //Listen all the database events
        $eventsManager->attach('db', function($event, $connection) {
            if ($event->getType() == 'afterQuery') {
                echo $connection->getSQLStatement();
            }
        });
    }
	// Not found
    public function show404Action()
    {
    }
	// Not authorized
    public function show401Action()
    {
    }
	// Server error
    public function show500Action()
    {
    }
}