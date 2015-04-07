<?php

class SignupController extends ControllerBase

{
    public function initialize()
    {
        $this->tag->setTitle('Sign up');
        parent::initialize();
    }
	
	public function indexAction()
	{
	}

	public function registerAction()
	{
        // Include password settings
        require "../app/library/Generator.php";
        
        // Make a temporary random password
        $generated = generateRandom();
        
        // Password salt and hash with 2 methods
        $secret = $option["secret"];
        $generated = hashIt($postPost["pw_usr"], $secret);
        $generated = $this->security->hash($generated . $secret) 
        
        // Get $_POST variables
		$postPost = $this->request->getPost();
        $postPost["password"] = $generated;

        // Intantiate user database
		$user = new Users();
        
        // Prepare fields, preventing SQL injection is handled automatically
        $user->first_usr = $postPost["name"];
        $user->email_usr = $postPost["email"];
        $user->pw_usr    = $postPost["password"];
        
		// Store and check for errors
        try {
            $success = $user->create();
            if ($success) {
                echo "<h1>Congratulations, " . ucfirst($postPost['name']) . "</h1>";
                echo "New account added!";
            }
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
		echo '<div class="container">';
		{
			echo "Sorry, the following problems occurred: <ul>";
			foreach ($user->getMessages() as $message) {
				echo "<li>", $message->getMessage(), "</li>";
			}
			echo "</ul>";
		}
		echo "</div>";
		//$this->view->disable();
	}
}