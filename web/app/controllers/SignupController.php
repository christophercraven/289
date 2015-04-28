<?php
/**
 * Member sign up controller
 * 
 * 
 */ 
class SignupController extends ControllerBase
{
/**
 * Initialize page and set title
 * 
 * 
 */ 
    public function initialize()
    {
        $this->tag->setTitle('Sign up');
        parent::initialize();
    }
/**
 * Method purposely blank
 * 
 */	
	public function indexAction()
	{
	}
/**
 * Registration of new users
 * 
 * Checks for captcha, automatically generates a temporary password
 */
	public function registerAction()
	{	
		if ( isset($_POST['g-recaptcha-response']) ) {
			$secret = "6LfCxgUTAAAAAM6kObz3WB_OXTl2wf-z7HTM0P20";
			$recaptcha = new \ReCaptcha\ReCaptcha($secret);
			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			if ($resp->isSuccess()):
/**
 * Include password settings
 * 
 * 
 */ 
				require "../app/library/Generator.php";

/**
 * Make a temporary random password
 * 
 * 
 */ 
				$generated = generateRandom();
				$temporary = $generated;
/**
 * Password salt and hash with 2 methods
 * 
 * 
 */ 
				$secret = $option["secret"];
				$generated = hashIt($generated, $secret);
				$generated = $this->security->hash($generated . $secret); 
				
/**
 * Get $_POST variables
 * 
 * 
 */ 
				$postPost = $this->request->getPost();
				$postPost["password"] = $generated;

/**
 * Intantiate user database
 * 
 * 
 */
				$user = new Users();
				
/**
 * Prepare fields, preventing SQL injection is handled automatically
 * 
 * 
 */ 
				$user->first_usr = $postPost["name"];
				$user->email_usr = $postPost["email"];
				$user->pw_usr    = $postPost["password"];
				
/**
 * Store new user in database or return errors
 * 
 * 
 */ 
				echo '<div class="container">';
				try {
					$success = $user->create();
					if ($success) {
						echo "<h1>Congratulations, " . ucfirst($postPost['name']) . "</h1>";
						echo "<p>New account added! </p>";
						echo "<p>Your temporary password is <code>".$temporary."</code></p>";
						echo "<p>Passwords are case sensitive.</p>";
						echo "<p>Please login and change the password for increased security.</p>";
						
					} else {
						echo "Sorry, the following problems occurred: <ul>";
						foreach ($user->getMessages() as $message) {
							echo "<li>", $message->getMessage(), "</li>";
						}
						echo "</ul>";
					}
				}
				catch(Exception $e) {
					
					$errorMessage = $e->getMessage();
					if ( strpos( $errorMessage, '1062' )) {
						echo "<span class=\"alert\">Account already exists: </span>" . $postPost["email"]; 
						
					} else {
						echo 'Message: ' .$e->getMessage();
					}
				}
				

				echo "</div>";

			else:
				$this->flash->error('Captcha not completed. Please go back and try again. ');
			endif;
		}
	}
}