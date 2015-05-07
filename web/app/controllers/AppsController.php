<?php    
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: AppsController.php
 * Description: 
 * Controller for Apps page
 * 
 * This returns a list of apps found in the database and displays a view of the list.
 */ 
 
/**
 * Include logger settings
 * 
 * 
 */ 
class AppsController extends ControllerBase

{

/**
 * Initialize and set title
 * 
 * 
 */ 
	public function initialize()
	{
		$this->tag->setTitle('Apps');
		parent::initialize();
	}
/**
 * Automatically forwards to apps index
 * 
 * 
 */
	public function indexAction()
	{
/**
 * Setting variable for the view component
 * 
 * 
 */
        $this->view->apps = Apps::find();
	}
/**
 * Registers new app data
 * 
 * 
 */
	public function registerAction()
	{
		/**
		 * Prepares the database table
		 */	
		$app = new Apps();
		
		/**
		 * Store and check for errors
		 */
		$success = $app->save($this->request->getPost(), array('first_usr', 'email_usr', 'pw_usr'));
		if ($success) {
			echo "New app added!";
		} else {
			echo "Sorry, the following problems occurred: <ul>";
			foreach ($user->getMessages() as $message) {
				echo "<li>", $message->getMessage(), "</li>";
			}
			echo "</ul>";
		}
		//$this->view->disable();
	}
}