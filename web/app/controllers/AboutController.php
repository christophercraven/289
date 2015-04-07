<?php
class AboutController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('About');
        parent::initialize();
    }
	public function indexAction()
	{
	$user = Users::findFirst(6);
	echo $user->email_usr;
	return;
	}
}