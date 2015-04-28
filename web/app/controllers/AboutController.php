<?php
/**
 * Controller for the About page
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
 * Action method is purposely blank
 * 
 * 
 */ 
	public function indexAction()
	{

	} 
}