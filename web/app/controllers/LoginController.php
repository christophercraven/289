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
    /**
     * This action authenticates and logs user into the application
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            // Include password settings
            require "../app/library/Generator.php";
            
            // Password salt and hash with 2 methods
            $secret = $option["secret"];
            $password = hashIt($password, $secret);

			// Compare post data to database
            $user = Users::findFirst(array(
                "(email_usr = :email: OR username_usr = :email:) AND active_usr = '1'",
                'bind' => array('email' => $email) 
            ));
			
			// If user is found, welcome
            if ( $user && $this->security->checkhash($password . $secret, $user->pw_usr)) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->first_usr);
				
				if ( '10' == $user->level_usr_lvl ) return $this->forward('admin/index');
                return $this->forward('member/index');
			
            }
            $this->flash->error('Wrong email/password');
			//var_dump($password);
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
		var_dump($test);
        $this->flash->success('Goodbye!');
        return $this->forward('apps/index');
    }
}