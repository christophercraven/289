<?php
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
		$sponsors = Sponsors::find();
        $logo = 
		$this->view->setVar("sponsors", $sponsors);
    }


}