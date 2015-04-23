<?php
// index controller for About page
class AboutController extends ControllerBase
{
	// initialize and set title 
    public function initialize()
    {
        $this->tag->setTitle('About');
        parent::initialize();
    }
	
	// action function required
	public function indexAction()
	{

	} 
}