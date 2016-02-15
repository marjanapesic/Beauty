<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Application\Entity\Users;


class UserController extends AbstractActionController{

	const ROUTE_LOGIN  = 'login_route';
	const ROUTE_USER  = 'user_route';
	const CONTROLLER_NAME    = 'User\Controller\User';


	public function loginAction()
    {
        $authservice = $this->getServiceLocator()->get('AuthService');
        $loginForm =  $this->getServiceLocator()->get('User\Form\LoginForm');

		if ($authservice->hasIdentity()){
			return $this->redirect()->toRoute(static::ROUTE_USER);
		}

		$request = $this->getRequest();

		if (!($request->isPost())) {
			return array(
					'form'      => $loginForm,
					'messages'  => $this->flashmessenger()->getMessages()
			);
		}

		$loginForm->setData($request->getPost());	//set fields of form to entered values

		if (!$loginForm->isValid()) {
			$this->layout()->setTemplate('layout/layout');
				return array(
					'form'      => $loginForm,
					'messages'  => $this->flashmessenger()->getMessages()
			);
		}

		$authservice->clearIdentity();

		return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));

	}

	public function authenticateAction() //depends on: form, authservice, user mapper,
	{

		$redirect = static::ROUTE_LOGIN;

		$request = $this->getRequest();
		$redirectParams = array();

		if ($request->isPost()){

            $loginForm =  $this->getServiceLocator()->get('User\Form\LoginForm');
            $authservice = $this->getServiceLocator()->get('AuthService');

			$data = $loginForm->getData();
		
			$authservice->getAdapter()
				->setIdentity($data['email'])
				->setCredential($data['password']);

			$result = $authservice->authenticate();

			if ($result->isValid()) {
					
				$resultRow = $authservice->getAdapter()->getResultRowObject();
                $user = $this->getEM()->find('Application\Entity\Users', $resultRow->id);

				$login_next_url = new Container('login_next_url');
                if(!$login_next_url->count()){
                    $login_next_url->offsetSet('url', 'user_route');
                }

				$authservice->getStorage()->write($user);
    		    return $this -> redirect() -> toRoute($login_next_url->offsetGet('url'));
				
			}
			else
				foreach($result->getMessages() as $message)
					$this->flashmessenger()->addMessage($message);
		}
		 
		return $this->redirect()->toRoute($redirect, $redirectParams);
	}


	public function indexAction(){ //depends on authservice

        $authservice = $this->getServiceLocator()->get('AuthService');

		if (!$authservice -> hasIdentity()) {
			return $this->redirect()->toRoute(static::ROUTE_LOGIN);
		}

		$request = $this -> getRequest();
		$uri = $request->getURI()->getPath();
		$prg = $this->prg($uri, true);// false if it is get, response if it is post

		if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
			return $prg;
		}

        $storage = $authservice->getStorage();
        /** @var \Application\Entity\Users $user */
		$user = $authservice->getStorage()->read();

		$this -> flashmessenger() -> getMessages();
		return new ViewModel(array('email' => $user->getEmail(), 'username' => $user->getName()));
	}

	public function logoutAction() //session storage, auth service,
	{
        $authservice = $this->getServiceLocator()->get('AuthService');

		if (!$authservice -> hasIdentity()) {
			return $this->redirect()->toRoute('index');
		}

		$authservice->clearIdentity();
		 
		$this->flashmessenger()->addMessage("You've been logged out");

		return $this->redirect()->toRoute('index');
	}

    public function signUpAction()
    {
        $authservice = $this->getServiceLocator()->get('AuthService');
        $signUpForm = $this->getServiceLocator()->get('User\Form\SignUpForm');

        if ($authservice->hasIdentity()) {
            $authservice->clearIdentity();
        }

        if ($this->getRequest()->isPost()) {
            $signUpForm->setData($this->getRequest()->getPost());
            if ($signUpForm->isValid()) {
                $user = new Users();
                $data = $signUpForm->getData();
                $user->setName($data['name']);
                $user->setEmail($data['email']);
                $user->setGender($data['female']);
                $user->setPassword($data['password']);
                $user->setPhone($data['phone']);
                $user->setRole('user');
                $user->setSurname($data['surname']);

                $userService = $this->getServiceLocator()->get('User\Service\UserService');

                $user->setPassword($userService->createPassword($user->getPassword()));
                $this->getEM()->persist($user);
                $this->getEM()->flush();
                $authservice->getStorage()->write($user);
                return $this->redirect()->toRoute(static::ROUTE_USER);
	        }
        }
        return new ViewModel(array('form' => $signUpForm));
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEM()
    {
        return $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    }
}