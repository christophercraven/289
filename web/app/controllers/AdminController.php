<?php       
 // Include logger settings
        require "../app/library/Logger.php";
class AdminController extends ControllerBase
{
	public function initialize()
	{
		$this->tag->setTitle('Admin');
		parent::initialize();
	}
    
	public function indexAction()
	{
		//$this->persistent->searchParams = null;
		//$this->view->subTypes = SubTypes::find();
	}
    
    // Edit user data and change passwords
    public function editAction()
	{
        $param = $this->request->get();
        $param = explode("/", $param["_url"]);
        
        // Find requested user data
        $user = Users::findFirst($param[4]);
        $this->tag->setDefault('id_usr', $user->id_usr);
        $this->tag->setDefault('username_usr', $user->username_usr);
        $this->tag->setDefault('first_usr', $user->first_usr);
        $this->tag->setDefault('last_usr', $user->last_usr);
        $this->tag->setDefault('email_usr', $user->email_usr);
        $this->tag->setDefault('address_usr', $user->address_usr);
        $this->tag->setDefault('pw_usr', '');
        $this->tag->setDefault('level_usr_lvl', $user->level_usr_lvl);
        
        if (1 == $user->active_usr) {
            $active = 1;
        } else {
            $active = 0;
        }
        $this->tag->setDefault('active_usr', $active);
        
    //$this->view->disable();
	}

    // Save changes to user data 
    public function saveAction()
	{
        $param = $this->request->get();
        $param = explode("/", $param["_url"]);
        
        if ( "user" == $param[3] ) { 
            // Get $_POST variables
            $postPost = $this->request->getPost();
            
            // Intantiate user database
            $user = Users::findFirst( $postPost["id_usr"] );
            
            // Prepare fields, preventing SQL injection is handled automatically
            foreach ( $postPost as $key => $value ) {
                if ( ! empty( trim($value) ) ) {
                    if ("pw_usr" == $key ) {
                        // Include password settings
                        require "../app/library/Generator.php";
                        
                        // Password salt and hash with 2 methods
                        $value = hashIt($postPost["pw_usr"], $option["secret"]);
                        $value = $this->security->hash($value . $option["secret"]); 
                        $postPost["pw_usr"] = $value;
                        //var_dump($value);
                    }
                    $user->$key = $postPost[$key];
                }
            }

            //Store and check for errors
            try {
                $success = $user->update();
                if ($success) {
                    echo "<p>Success! User changes saved.</p>";
                } else {
                    echo "<div class=\"container\">";
                    
                    echo "Sorry, the following problems occurred: <ul>";
                    foreach ($user->getMessages() as $message) {
                        echo "<li>", $message->getMessage(), "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
				//$this->flash->error($user->getMessages());
            }  
            catch(Exception $e) {
                //$errorMessage = $e->getMessage();
                echo "<div class=\"container\">";
                           
                    echo "<span class=\"alert\">Sorry, the following problems occurred: </span><ul>";
                    echo '<li>' . $e->getMessage() . '</li></ul>';
                
                echo "</div>";
            } 
        }
    }
    
    // Add new users to the database
	public function registerAction()
	{
		$user = new Users();
        $postPost = $this->request->getPost();
		//Store and check for errors
        try {
            $success = $user->create($postPost, array('first_usr', 'email_usr', 'pw_usr'));
            if ($success) {
                echo "<p>New user added!</p>";
            }
        }  catch(Exception $e) {
            $errorMessage = $e->getMessage();
            echo "<div class=\"container\">";
            if ( strpos( $errorMessage, '1062' )) {
                echo "<span class=\"alert\">Account already exists: </span>" . $postPost["email_usr"] . "<p>" . $errorMessage . "</p>"; 
                
            } else {            
                echo "<span class=\"alert\">Sorry, the following problems occurred: </span><ul>";
                echo '<li>' . $errorMessage . '</li></ul>';
            }
			echo "</div>";
        } 

	}
}