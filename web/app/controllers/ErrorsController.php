<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: ErrorsController.php
 * Description: 
 * Controller for error pages
 */
 
/**
 * Controller class for error pages
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
 * Check for database events and echo errors if any
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