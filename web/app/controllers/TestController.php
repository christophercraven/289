<?php
class TestController extends ControllerBase

{
	public function initialize()
	{
		$this->tag->setTitle('Test');
		parent::initialize();
	}
	public function indexAction()
	{
	}
	public function registerAction()
	{
		$user = new Users();
		
		//Store and check for errors
		$success = $user->save($this->request->getPost(), array('first_usr', 'email_usr', 'pw_usr'));
		if ($success) {
			echo "New user added!";
		} else {
			echo "Sorry, the following problems occurred: <ul>";
			foreach ($user->getMessages() as $message) {
				echo "<li>", $message->getMessage(), "</li>";
			}
			echo "</ul>";
		}
		$this->view->disable();
	}
}