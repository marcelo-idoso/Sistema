<?php
/**
 * File for User Controller Class
 *
 * @category  User
 * @package   User_Controller
 * @author    Marco Neumann <webcoder_at_binware_dot_org-->
 * @copyright Copyright (c) 2011, Marco Neumann
 * @license   http://binware.org/license/index/type:new-bsd New BSD License
 */

/**
 * @namespace
 */
namespace User\Controller;

/**
 * @uses Zend\Mvc\Controller\AbstractActionController
 * @uses User\Form\Login
 */
use Zend\Mvc\Controller\AbstractActionController;
use User\Form\LoginForm;

/**
 * User Controller Class
 *
 * User Controller
 *
 * @category  User
 * @package   User_Controller
 * @copyright Copyright (c) 2011, Marco Neumann
 * @license   http://binware.org/license/index/type:new-bsd New BSD License
 */
class UserController extends AbstractActionController
{
    /**
     * Index Action
     */
    public function UserAction() {
        
    }

    /**
     * Login Action
     *
     * @return array
     */
    public function loginAction()
    {
        
        $form = new LoginForm();
        $request = $this->getRequest();

        if ($request->isPost() && $form->isValid($request->post()->toArray())) {
            $uAuth = $this->getLocator()->get('User\Controller\Plugin\UserAuthentication'); //@todo - We must use PluginLoader $this->userAuthentication()!!
            $authAdapter = $uAuth->getAuthAdapter();

            $authAdapter->setIdentity($form->getValue('username'));
            $authAdapter->setCredential($form->getValue('password'));

            \Zend\Debug::dump($uAuth->getAuthService()->authenticate($authAdapter));
        }

        return array('Form' => $form);
    }

    /**
     * Logout Action
     */
    public function logoutAction()
    {
        $this->getLocator()->get('User\Controller\Plugin\UserAuthentication')->clearIdentity(); //@todo - We must use PluginLoader $this->userAuthentication()!!
    }
}