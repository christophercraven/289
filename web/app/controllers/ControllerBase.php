<?php
use Phalcon\Flash;
use Phalcon\Session;

class ControllerBase extends \Phalcon\Mvc\Controller
{
	// sets the title tag in the html head section
	protected function initialize()
	{
		$this->tag->appendTitle(' | Apps.BePlace');
	}
	// forwards
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
	// Send a HTTP 404 response header
	$this->response->setStatusCode(404, "Not Found");
	} */
}