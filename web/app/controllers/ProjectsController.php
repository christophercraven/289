<?php
/**
 * Member projects panel controller
 * 
 * 
 */ 

use Phalcon\Mvc\Model\Query;
		
class ProjectsController extends ControllerBase
{
/**
 * Initialize page and set title
 * 
 * 
 */ 
    public function initialize()
    {
        $this->tag->setTitle('Your Projects');
        parent::initialize();
    }
/**
 * Retrieve projects view
 * 
 */ 	
    public function indexAction()
    {
/**
 * Get session info
 */
        $auth = $this->session->get('auth');
/**
 * Query the active user's apps
 */
       // $user = Users::findFirst($auth['id']);
	    $query = new Query("SELECT * FROM Apps WHERE creator_app_usr = :id:", $this->getDI());
		try {
			$apps = $query->execute(array(
				'id' => $auth['id'] 
			));
			$this->view->setVar("apps", $apps);
			$this->view->setVar("user", $auth['id']);
		} catch(Exception $e) {
			//$this->view->disable();
			$this->flash->error($e->getMessage());
		}

    }


}