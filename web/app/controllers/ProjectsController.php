<?php



class ProjectsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Your Projects');
        parent::initialize();
    }
	
    public function indexAction()
    {
    }


}