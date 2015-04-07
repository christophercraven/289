<?php



class VotesController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Your Votes');
        parent::initialize();
    }
	
    public function indexAction()
    {
    }


}