<?php
namespace User\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserControllerFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator) {

		/** @var \Zend\ServiceManager\ServiceManager $services */
		$services   = $serviceLocator->getServiceLocator();
		$authservice = $services ->  get('AuthService');
		$loginForm = $services -> get('User\Form\LoginForm');
		$signUpForm = $services->get('User\Form\SignUpForm');
		$userMapper = $services -> get('Application\Mapper\UserMapper');
		$userService = $services -> get('User\Service\UserService');
		
        return new UserController($authservice, $loginForm, $signUpForm, $userMapper, $userService);
	}
}