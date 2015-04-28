<?php
/**
 * Controller for teams information 
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
		$teams = Teams::find();
		$this->view->setVar("teams", $teams);
    }


}