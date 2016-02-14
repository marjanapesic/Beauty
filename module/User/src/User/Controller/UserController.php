<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Authentication\AuthenticationService;
use Zend\Stdlib\Hydrator\Reflection;

use User\Form\LoginForm;
use User\Form\SignUpForm;
use User\Service\UserService;
use Application\Entity\User;
use Application\Mapper\UserMapper;


class UserController extends AbstractActionController{

	const ROUTE_LOGIN  = 'login_route';
	const ROUTE_USER  = 'user_route';

	const CONTROLLER_NAME    = 'User\Controller\User';

    /** @var AuthenticationService  */
	protected $authservice;
    protected $loginForm;
    protected $signUpForm;
    protected $userMapper;
    protected $userService;
    
	public function __construct(AuthenticationService $authservice, LoginForm $loginForm, SignUpForm $signUpForm, UserMapper $um,
	    UserService $us){

		$this->authservice = $authservice;
		$this->loginForm = $loginForm;
		$this->signUpForm = $signUpForm;
		$this->userMapper = $um;
		$this->userService = $us;
	}


	public function loginAction()
	{
		if ($this->authservice->hasIdentity()){
			return $this->redirect()->toRoute(static::ROUTE_USER);
		}

		$request = $this->getRequest();

		if (!($request->isPost())) {
			return array(
					'form'      => $this->loginForm,
					'messages'  => $this->flashmessenger()->getMessages()
			);
		}

		$this -> loginForm ->setData($request->getPost());	//set fields of form to entered values

		if (!$this->loginForm->isValid()) {
			$this->layout()->setTemplate('layout/layout');
				return array(
					'form'      => $this->loginForm,
					'messages'  => $this->flashmessenger()->getMessages()
			);
		}

		$this -> authservice -> clearIdentity();

		return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));

	}

	public function authenticateAction() //depends on: form, authservice, user mapper,
	{

		$redirect = static::ROUTE_LOGIN;

		$request = $this->getRequest();
		$redirectParams = array();

		if ($request->isPost()){
			
			$data = $this->loginForm->getData();
		
			$this->authservice->getAdapter()
				->setIdentity($data['email'])
				->setCredential($data['password']);

			$result = $this->authservice->authenticate();

			if ($result->isValid()) {
					
				$resultRow = $this->authservice->getAdapter()->getResultRowObject();
				$user = new User();
				
				$this->userMapper->getHydrator()->hydrate(get_object_vars($resultRow), $user);

				$login_next_url = new Container('login_next_url');
                if(!$login_next_url->count()){
                    $login_next_url->offsetSet('url', 'user_route');
                }

                $storage = $this->authservice->getStorage();
				$this->authservice->getStorage()->write($user);
    		    return $this -> redirect() -> toRoute($login_next_url->offsetGet('url'));
				
			}
			else
				foreach($result->getMessages() as $message)
					$this->flashmessenger()->addMessage($message);
		}
		 
		return $this->redirect()->toRoute($redirect, $redirectParams);
	}


	public function indexAction(){ //depends on authservice

		if (!$this->authservice -> hasIdentity()) {
			return $this->redirect()->toRoute(static::ROUTE_LOGIN);
		}

		$request = $this -> getRequest();
		$uri = $request->getURI()->getPath();
		$prg = $this->prg($uri, true);// false if it is get, response if it is post

		if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
			return $prg;
		}

        $storage = $this->authservice->getStorage();
		$user = $this->authservice->getStorage()->read();

		$this -> flashmessenger() -> getMessages();
		return new ViewModel(array('email' => $user->getEmail(), 'username' => $user->getName()));
	}

	public function logoutAction() //session storage, auth service,
	{
		 
		if (!$this->authservice -> hasIdentity()) {
			return $this->redirect()->toRoute('index');
		}
		//$this -> authservice -> getStorage() -> forgetMe();
		$this -> authservice -> clearIdentity();
		 
		$this->flashmessenger()->addMessage("You've been logged out");

		return $this->redirect()->toRoute('index');
	}
	
	public function signUpAction()
	{
	    
	    if ($this->authservice ->hasIdentity()) {
	        $this->authservice->clearIdentity();
	    }
	    
	    if($this->getRequest()->isPost()){
	        $this->signUpForm->setData($this->getRequest()->getPost());
	        if($this->signUpForm->isValid()){
	           $user = new User();
	           $hydrator = new Reflection();
	           $hydrator->hydrate($this->signUpForm->getData(), $user);
	           
	           $user->setPassword($this->userService->createPassword($user->getPassword()));
	           if($this->userMapper->insertObject($user))
	           {
	               $this->authservice->getStorage()->write($user);
	               return $this->redirect()->toRoute(static::ROUTE_USER);
	           }
	           
	           $this->flashmessenger()->addMessage("Error");
	        }
	    }
	    return new ViewModel(array('form' => $this->signUpForm));
	}

}