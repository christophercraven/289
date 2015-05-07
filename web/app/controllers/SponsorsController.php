<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: SponsorsController.php
 * Description: 
 * 
 * Controller for sponsor information on member dashboard page
 */ 
 
/**
 * Sponsors controller class for member dashboard
 * 
 * 
 */ 
class SponsorsController extends ControllerBase
{
/**
 * Initialize page and set title 
 * 
 * 
 */ 
    public function initialize()
    {
        $this->tag->setTitle('Sponsors');
        parent::initialize();
    }
/**
 * Pulls list of current sponsors from database and returns view
 * 
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
		$apps = Apps::find(array(
			"conditions" => "creator_app_usr = ?1",
			"bind" => array( 1 => $auth['id'] )
		));
		
		foreach ($apps as $app) {
			$sponsor = iterator_to_array(Sponsors::find(array( 
				"id_spo" => $app->sponsor_app_spo
			)));
			
			$sponsors = array_unique(array_merge($sponsor), SORT_REGULAR);
		}
		
		//$sponsors = Sponsors::find();
        //$logos = Images::find();
		//$this->view->disable();
		$this->view->setVar("apps", $apps);
		$this->view->setVar("sponsors", $sponsors);
		//$this->view->setVar("logos", $logos);
    }


}