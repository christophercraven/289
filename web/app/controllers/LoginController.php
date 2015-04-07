<?php
/**
 * LoginController
 *
 * Allows user authentication
 */
class LoginController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Log in/Sign up');
        parent::initialize();
    }
    public function indexAction()
    {
        if (!$this->request->isPost()) {
            $this->tag->setDefault('email', 'demo@demo.com');
            $this->tag->setDefault('password', 'demo');
        }
    }
    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id_usr,
            'name' => $user->first_usr,
            'level' => $user->level_usr_lvl,
        ));
    }
    
	// Authenticate and log user into the application
    public function startAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
				$users = new Users;
				var_dump($users);
				return;

			// Compare post data to database
			try {
				$users = new Users;
				var_dump($users);
				return;
				$user = Users::findFirst(array(
					"email_usr = :email: OR username_usr = :email:",
					'bind' => array('email' => $email) 
				));
			} catch(Exception $e) {
                //$errorMessage = $e->getMessage();
                $this->flash->error(
					
                           
					"Sorry, the following problems occurred: <ul>".
					'<li><code>' . $e->getMessage() . '</code></li></ul>'
                
					
					);
            } 
			
			// If user is found, check password and welcome
            if ( $user ) {
				// Include password settings
				require "../app/library/Generator.php";
				
				// Password salt and hash with 2 methods
				$secret = $option["secret"];
				$password = hashIt($password, $secret);
				if ( $this->security->checkhash($password . $secret, $user->pw_usr)) {
				//if ($password == $user->pw_usr) {
					$this->_registerSession($user);
					$this->flash->success('Welcome, ' . ucfirst($user->first_usr) . ".");
					
					if ( '10' == $user->level_usr_lvl ) return $this->forward('admin/index');
					return $this->forward('member/index');
				}
            }
            $this->flash->error('Wrong email/password. ');
			
        }
        return $this->forward('login/index');
    }
    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $test = $this->session->remove('auth');
		
        $this->flash->success('Goodbye!' .$test);
        return $this->forward('apps/index');
    }
}