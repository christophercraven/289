<?php
/**
 * Member projects panel controller
 * 
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
 * Method purposely blank
 * 
 * 
 */ 	
    public function indexAction()
    {
    }


}