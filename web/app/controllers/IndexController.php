<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: IndexController.php
 * Description: 
 * Controls the main site page
 */
 
/**
 * Controller class for site home page
 * 
 * 
 */ 
class IndexController extends ControllerBase
{
/**
 * Initialize page and set title
 * 
 * 
 */
	public function initialize()
	{
		$this->tag->setTitle('Home');
		parent::initialize();
	}
/**
 * Actions to perform on page
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
}