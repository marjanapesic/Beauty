<?php

namespace Application\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter as AuthAdapter;
use Zend\Crypt\Password\Bcrypt;

class AuthServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $serviceLocator) {

		/** @var \Zend\Db\Adapter\Adapter $dbAdapter */
	    $dbAdapter = $serviceLocator->get ( 'Zend\Db\Adapter\Adapter' );
	    
	    $credentialValidationCallback = function($dbCredential, $requestCredential) {
	        return (new Bcrypt())->verify($requestCredential, $dbCredential);
	    };
	    $authAdapter = new AuthAdapter($dbAdapter, 'users', 'email', 'password', $credentialValidationCallback);

		$authService = new \Zend\Authentication\AuthenticationService ();
		$authService->setAdapter ($authAdapter);
		$authService->setStorage ($serviceLocator->get ( 'Application\Model\MyAuthStorage' ));
		
		return $authService;
	}
}