<?php
/**
 * Member control panel controller
 * 
 * 
 */ 
 
 /**
 * Member dashboard class
 * 
 * 
 */
class MemberController extends ControllerBase
{
/**
 * Initialize page and set title
 *
 */
    public function initialize()
    {
        $this->tag->setTitle('Your Account');
        parent::initialize();
    }
/**
 * Retrieves user's app project data and returns index view 
 */
    public function indexAction()
    {

    }
    
/**
 * Allows editing the active user's profile
 * 
 * First checks if authorized, then commits changes to database.
 */
    public function profileAction()
    {
/**
 * Get session info
 */
        $auth = $this->session->get('auth');
/**
 * Query the active user
 */
        $user = Users::findFirst($auth['id']);
        if ($user == false) {
            return $this->_forward('index/index');
        }
        if (!$this->request->isPost()) {
            $this->tag->setDefault('name', $user->first_usr);
            $this->tag->setDefault('email', $user->email_usr);
        } else {
            $name = $this->request->getPost('name', array('string', 'striptags'));
            $email = $this->request->getPost('email', 'email');
            $user->first_usr = $name;
            $user->email_usr = $email;
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->flash->success('Your profile was updated successfully');
            }
        }
    }
    
/**
 * Edit the user app project profiles
 * 
 * First verify authorized user, the update database with changes
 */ 
    public function projectsAction()
    {
/**
 * Get session info
 */
        $auth = $this->session->get('auth');
/**
 * Query the active user
 */
        $user = Users::findFirst($auth['id']);
        $apps = Apps::findFirst($auth['id']);
        if ($user == false) {
            return $this->_forward('index/index');
        }
        if (!$this->request->isPost()) {
            $this->tag->setDefault('name_app', $apps->name_app);
            $this->tag->setDefault('tagline_app', $apps->tagline_app);
        } else {
            $name = $this->request->getPost('name_app', array('string', 'striptags'));
            $tagline = $this->request->getPost('tagline_app', 'tagline_app');
            $apps->name_app = $name;
            $apps->tagline_app = $tagline;
            if ($apps->save() == false) {
                foreach ($apps->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->flash->success('Your app was updated successfully!');
            }
        }
    }
}