<?php
class AppsController extends ControllerBase

{
	public function initialize()
	{
		$this->tag->setTitle('Apps');
		parent::initialize();
	}
	public function indexAction()
	{
        //Setting variable for the view component
        $this->view->apps = Apps::find();
	}
	public function registerAction()
	{
		$app = new Apps();
		
		//Store and check for errors
		$success = $app->save($this->request->getPost(), array('first_usr', 'email_usr', 'pw_usr'));
		if ($success) {
			echo "New app added!";
		} else {
			echo "Sorry, the following problems occurred: <ul>";
			foreach ($user->getMessages() as $message) {
				echo "<li>", $message->getMessage(), "</li>";
			}
			echo "</ul>";
		}
		//$this->view->disable();
	}
}