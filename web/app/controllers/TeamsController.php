<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: TeamsController.php
 * Description: 
 * Controller for teams information on member dashboard page
 * 
 */ 
 
/**
 * Teams controller for member dashboard
 * 
 * 
 */  
class TeamsController extends ControllerBase
{
/**
 * Initialize page and set title 
 * 
 * 
 */ 
    public function initialize()
    {
        $this->tag->setTitle('Your Teams');
        parent::initialize();
    }
/**
 * Pulls list of current teams from database and returns view
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
       // $user = Users::findFirst($auth['id']);
        $teams = Teams::find(array(
            array( "creator_tea_usr" => $auth['id'] )
        ));

        //$this->view->setVar("apps", $apps);
        $this->view->setVar("user", $auth['id']);
		
    }


}