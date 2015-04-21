<?php
class IndexController extends ControllerBase
{
	public function initialize()
	{
		$this->tag->setTitle('Home');
		parent::initialize();
	}
	public function indexAction()
	{
        //Setting variable for the view component
        $this->view->apps = Apps::find();
	}
}