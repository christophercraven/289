<?php


// this controls member sponsorship 
class SponsorsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sponsors');
        parent::initialize();
    }
	
    public function indexAction()
    {
		$sponsors = Sponsors::find();
		$this->view->setVar("sponsors", $sponsors);
    }


}