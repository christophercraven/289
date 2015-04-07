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
		//$this->persistent->searchParams = null;
		//$this->view->subTypes = SubTypes::find();
	}
}