<?php



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
    /**
     * Edit the active user profile
     *
     */
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
}