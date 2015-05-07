<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: ControllerBase.php
 * Description: 
 * All the other controllers are based on this one.
 */

use Phalcon\Flash;
use Phalcon\Session;
/**
 * Controller base template class
 * 
 * All controllers are based on this.
 */ 
class ControllerBase extends \Phalcon\Mvc\Controller
{
/**
 * Appends the site name to the title
 * 
 * 
 */ 
	protected function initialize()
	{
		$this->tag->appendTitle(' | Apps.BePlace');
	}
/**
 * Forwards parsed URI
 * 
 * @return HTTP response
 */ 
    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1],
                'params' => $params
    		)
    	);
    }

	/* public function notFoundAction()
	{
/**
 * Send a HTTP 404 response header
 * 
 * 
 * 
	$this->response->setStatusCode(404, "Not Found");
	} */
}