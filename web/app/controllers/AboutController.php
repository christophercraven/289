<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: AboutController.php
 * Description: 
 * Sets the title and routes to the about page.
 */
 
/**
 * Controller class for the About page
 * 
 * 
 */ 
class AboutController extends ControllerBase
{
/**
 * Initialize and set title 
 * 
 * 
 */ 
    public function initialize()
    {
        $this->tag->setTitle('About');
        parent::initialize();
    }
	
/**
 * Action method calls the view automatically
 * 
 * 
 */ 
	public function indexAction()
	{

	} 
}