<?php


// Member control panel controller
class MemberController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Your Account');
        parent::initialize();
    }
    public function indexAction()
    {
    }
    
    //Edit the active user profile
    public function profileAction()
    {
        //Get session info
        $auth = $this->session->get('auth');
        //Query the active user
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
    
    // Edit the user app profiles
    public function projectsAction()
    {
        //Get session info
        $auth = $this->session->get('auth');
        //Query the active user
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