<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * Controls what users have access to which modules 
 */
class SecurityPlugin extends Plugin
{

	/**
	 * Returns an existing or new access control list
	 *
	 * @returns AclList
	 */
	public function getAcl()
	{

		//throw new \Exception("something");

		if (!isset($this->persistent->acl)) {

			$acl = new AclList();

			$acl->setDefaultAction(Acl::DENY);

			//Register roles
			$roles = array(
				'admin'  => new Role('Admin'),
				'users'  => new Role('Users'),
				'guests' => new Role('Guests')
			);
			foreach ($roles as $role) {
				$acl->addRole($role);
			}

			//Private area resources whitelist
			$privateResources = array(
				'votes'       => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'sponsors'    => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'projects'    => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'teams'       => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
				'member'      => array('index', 'profile')
			);
			foreach ($privateResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Public area resources whitelist
			$publicResources = array(
				'index'      => array('index'),
				'apps'       => array('index'),
				'about'      => array('index'),
				'signup'     => array('index', 'register'),
				'errors'     => array('show401', 'show404', 'show500'),
				'login'      => array('index', 'signup', 'start', 'end'),
				'contact'    => array('index', 'send')
			);
			foreach ($publicResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Admin area resources whitelist
			$adminResources = array(
				'admin'       => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete', 'register')
				
			);
			foreach ($adminResources as $resource => $actions) {
				$acl->addResource(new Resource($resource), $actions);
			}

			//Grant access to public areas to both users and guests
			foreach ($roles as $role) {
				foreach ($publicResources as $resource => $actions) {
					foreach ($actions as $action){
						$acl->allow($role->getName(), $resource, $action);
					}
				}
			}

			//Grant acess to private area to role Users 
			foreach ($privateResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Users', $resource, $action);
					$acl->allow('Admin', $resource, $action);
				}
			}
			
			//Grant acess to admin area to role Admin 
			foreach ($adminResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('Admin', $resource, $action);
				}
			}

			//The acl is stored in session, APC would be useful here too
			$this->persistent->acl = $acl;
		}

		return $this->persistent->acl;
	}

	/**
	 * beforeDispatch action executed before any other action in the application
	 *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{

		$auth = $this->session->get('auth');
		
		if (!$auth){
			$role = 'Guests';
		} else {
			$role = 'Users';
			if ( '10' == $auth['level'] ) $role = 'Admin';
		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = $this->getAcl();

		$allowed = $acl->isAllowed($role, $controller, $action);
		if ($allowed != Acl::ALLOW) {
			$dispatcher->forward(array(
				'controller' => 'errors',
				'action'     => 'show401'
			));
			return false;
		}
	}
    
    public function getSalt()
	{
		return "The rain in Spain falls mainly in the plain.";
	}
}

