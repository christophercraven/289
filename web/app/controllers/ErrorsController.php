<?php
/**
 * Controller for error pages
 * 
 * 
 */ 
class ErrorsController extends ControllerBase
{
/**
 * Initialize pages and set title
 * 
 * 
 */
    public function initialize()
    {
        $this->tag->setTitle('Oops!');
        parent::initialize();
    		$eventsManager = new Phalcon\Events\Manager();
/**
 * Listen to all the database events
 * 
 * 
 */
        $eventsManager->attach('db', function($event, $connection) {
            if ($event->getType() == 'afterQuery') {
                echo $connection->getSQLStatement();
            }
        });
    }
/**
 * Not found 404 pages action
 * 
 * 
 */ 
    public function show404Action()
    {
    }
/**
 * Not authorized 401 action
 * 
 * 
 */ 
    public function show401Action()
    {
    }
/**
 *  Server error 500 action
 * 
 * 
 */
    public function show500Action()
    {
    }
}