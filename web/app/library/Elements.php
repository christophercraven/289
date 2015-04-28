<?php
/**
 * Elements
 *
 * Library of navigation elements
 */
use Phalcon\Mvc\User\Component;
/**
 * Elements
 *
 * array of navigation elements
 */
class Elements extends Component
{
    private $_headerMenu = array(
        'u-pull-right' => array(

            'login' => array(
                'caption' => 'Log In/Sign Up',
                'action' => 'index'
            )
        )
    );
    private $_tabs = array(
        'Votes' => array(
            'controller' => 'votes',
            'action' => 'index',
            'any' => false
        ),
        'Projects' => array(
            'controller' => 'projects',
            'action' => 'index',
            'any' => false
        ),
        'Teams' => array(
            'controller' => 'teams',
            'action' => 'index',
            'any' => true
        ),
        'Sponsors' => array(
            'controller' => 'sponsors',
            'action' => 'index',
            'any' => true
        ),
        'Your Profile' => array(
            'controller' => 'member',
            'action' => 'profile',
            'any' => false
        )
    );
    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {
        $auth = $this->session->get('auth');
        if ($auth) {
			if ( '10' == $auth['level'] ) {
				$this->_headerMenu['u-pull-right']['admin'] = array(
					'caption' => 'Admin Home',
					'action' => 'index'
				);
			}
			$this->_headerMenu['u-pull-right']['member'] = array(
                'caption' => 'Account Home',
                'action' => 'index'
            );
            $this->_headerMenu['u-pull-right']['login'] = array(
                'caption' => 'Log Out '. $auth['name'],
                'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['navbar-left']['member']);
        }
        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
    /**
     * Returns menu tabs
	 *
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<div class="nav nav-tabs"><ul>';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo(array($option['controller'] . '/' . $option['action'], $caption, 'class' => 'button')), '<li>';
        }
        echo '</ul></div>';
    }
}

