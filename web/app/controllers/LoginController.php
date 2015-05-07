<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: LoginController.php
 * Description: 
 * Allows user authentication
 */
 
/**
 * LoginController class
 *
 * Allows user authentication
 */
class LoginController extends ControllerBase
{
	/**
     * Initialize page and set title
     *
     */
    public function initialize()
    {
        $this->tag->setTitle('Log in/Sign up');
        parent::initialize();
    }
	/**
     * This method populates the index login with demo account
     *
     */
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
     * This method authenticates and logs user into the application
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
/**
 * Include password settings
 * 
 * 
 */ 
            require "../app/library/Generator.php";
            
/**
 * Password salt and hash with 2 methods
 * 
 * 
 */ 
            $secret = $option["secret"];
            $password = hashIt($password, $secret);

/**
 * Compare post data to database
 * 
 * 
 */ 
            $user = Users::findFirst(array(
                "email_usr = :email: OR username_usr = :email:",
                'bind' => array('email' => $email) 
            ));
			
/**
 * If user is found, welcome
 * 
 * 
 */ 
            if ( $user ) {
				if ( $this->security->checkhash($password . $secret, $user->pw_usr)) {

					$this->_registerSession($user);
					$this->flash->success('Welcome ' . ucfirst($user->first_usr));
					
					if ( '10' == $user->level_usr_lvl ) {
						return $this->forward('admin/index');
					} else {
						return $this->forward('member/index');
					}
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