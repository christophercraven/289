<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: ProjectsController.php
 * Description: 
 * Member projects dashboard page controller
 * 
 * 
 */ 

use Phalcon\Mvc\Model\Query;
/**
 * Class for member projects dashboard page
 *
 */
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
/**
 * Allows editing the active app profile
 * 
 * First checks if authorized, then populates form with chosen app.
 */
    public function editAction()
    {
        $param = $this->request->get();
        $param = explode("/", $param["_url"]);
		$app = Apps::findFirst($param[3]);
		
/**
 * Get session info
 */
        $auth = $this->session->get('auth');
/**
 * Query the active user
 */
        $user = Users::findFirst($auth['id']);
        if ($user == false || $app->creator_app_usr != $auth['id']) {
            return $this->response->redirect('errors/show401');
        } 
        if (!$this->request->isPost()) {
			$this->view->setVar('app', $app);
            $this->tag->setDefault('name', $app->name_app);
            $this->tag->setDefault('tagline', $app->tagline_app);
            $this->tag->setDefault('desc', $app->desc_app);			
            $this->tag->setDefault('icon', $app->icon_app);
        } 
    }
/**
 * Allows editing the active app profile
 * 
 * First checks if authorized, then commits changes to database.
 */
    public function saveAction()
    {

		
/**
 * Get session info
 */
        $auth = $this->session->get('auth');
/**
 * Query the active user
 */
 
        $user = Users::findFirst($auth['id']);
		$id = $this->request->getPost('id', array('string', 'striptags'));
        $app = Apps::findFirst( $id );
        if ($user == false || $app->creator_app_usr != $auth['id']) {
			return $this->response->redirect('errors/show401');
        } 

		$name = $this->request->getPost('name', array('string', 'striptags'));
		$tagline = $this->request->getPost('tagline', array('string', 'striptags'));
		$desc = $this->request->getPost('desc', array('string', 'striptags'));			
		$icon = $this->request->getPost('icon', array('string', 'striptags'));
		
		$app->name_app = $name;
		$app->tagline_app = $tagline;
		$app->desc_app = $desc;			
		$app->icon_app = $icon;
		try {
			$success = $app->update();
			if ( $success ) {
			
				$this->flash->success('Your app was updated successfully');
 
			} else {
				$errorMessage = "Sorry, the following problems occurred: <ul>";
				foreach ($app->getMessages() as $message) {
					$errorMessage .= "<li>". $message->getMessage(). "</li>";
				}
				$errorMessage .= "</ul>";
				$this->flash->error( $errorMessage );
				
			}
		} catch(Exception $e) {
											  
				$this->flash->notice( "Sorry, the following problems occurred: " );
				$this->flash->error(  $e->getMessage() );
		}

    }

}